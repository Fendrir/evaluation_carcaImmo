<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Annonce;
use AppBundle\Entity\Type;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


/**
 * @Route("/annonces")
 */
class AnnonceController extends Controller
{
    
    /**
     * @Route("/annoncesTab")
     */
    public function AnnonceTabAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $annonces = $em->getRepository('AppBundle:Annonce')->findBy(array(),array("titre" => "ASC"));
        $types = $em->getRepository('AppBundle:Type')->findBy(array(),array("nom" => "ASC"));

        $titre = $em->getRepository("AppBundle:Annonce")->findAll(); 
        
        $form=$this->createFormBuilder()
        ->add("recherche",SearchType::class, array(
            'attr' => [
                'required' => false,
            ]))

        ->add("type",ChoiceType::class, array(
            'attr' => [
                'id' => "type",
                'class' => 'selectpicker',
                'placeholder' => 'type',
                'onchange' => 'this.form.submit()'
            ],
            'choices' => $types,
            'choice_label' => 'nom',
            'choice_value' => 'id',
        ))
        ->getForm();

        $form->handleRequest($request);
        
        if($form->isValid() && $form->isSubmitted())
        {
            $data=$form->getData("type");
            $parameter=$data["recherche"];
            $filtre = $data["type"];
            
            $query=$em->createQuery("select a from AppBundle\Entity\Annonce as a
            where a.titre like :p
            and a.type = :t"
            )
            ->setParameter("p","%".$parameter."%")
            ->setParameter("t", $filtre);
            
            $annonces=$query->getResult();
            // dump($titre);
            // die();
        }

        return $this->render('AppBundle:Annonce:annonce_tab.html.twig', array(
            'annonces' => $annonces,
            'type' => $types,
            'titre'=>$titre,
            'type'=>$types,
            'form'=>$form->createView(),
        ));
    }


    /**
     * @Route("/pageAnnonce/{annoncePage}")
     */
    public function AnnoncePageAction($annoncePage)
    {
        $em = $this->getDoctrine()->getManager();
        $annoncePage = $em->getRepository("AppBundle:Annonce")->findOneByTitre($annoncePage);

        return $this->render('AppBundle:Annonce:annonce_page.html.twig', array(
            "annoncePage" => $annoncePage,
        ));
    }

}