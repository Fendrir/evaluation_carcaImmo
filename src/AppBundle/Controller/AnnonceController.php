<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Annonce;
use AppBundle\Entity\Type;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * @Route("/annonces")
 */
class AnnonceController extends Controller
{
    
    /**
     * @Route("/annoncesTab")
     */
    public function AnnonceTabAction()
    {

        $em = $this->getDoctrine()->getManager();
        $annonces = $em->getRepository('AppBundle:Annonce')->findBy(array(),array("titre" => "ASC"));
        $types = $em->getRepository('AppBundle:Type')->findBy(array(),array("nom" => "ASC"));

        return $this->render('AppBundle:Annonce:annonce_tab.html.twig', array(
            'annonces' => $annonces,
            'type' => $types,
        ));
    }
    

    public function RechercheAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $titre = $em->getRepository("AppBundle:Annonce")->findAll(); 
        
        $form=$this->createFormBuilder()
        ->add("recherche",SearchType::class)
        ->getForm();

        $form->handleRequest($request);
        
        if($form->isValid() && $form->isSubmitted())
        {
            $data=$form->getData();
            $parameter=$data["recherche"];

            $query=$em->createQuery("select c from AppBundle\Entity\Annonce
                                    where titre like :p "
                                )->setParameter("p","%".$parameter."%");
            $courses=$query->getResult();
        }

        return $this->render('AppBundle:Annonce:annonce_tab.html.twig', array(
            "titre"=>$titre,
            "form"=>$form->createView(),
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