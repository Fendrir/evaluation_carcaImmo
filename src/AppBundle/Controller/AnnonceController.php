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

        $ems = $this->getDoctrine()->getManager();
        $type = $ems->getRepository('AppBundle:Type')->findAll();
        $choice = ['Sélectionnez un type' => null];
        foreach ($type as $key => $value) {
            $nom = $value->getNom();
            $idType = $value->getId();
            $choice += [$nom => $idType];
        }
        $em = $this->getDoctrine()->getManager();
        $annonces = $em->getRepository('AppBundle:Annonce')->findAll();
        $form = $this->createFormBuilder()
        ->add('recherche', Searchtype::class, array('required' => false,
        'label' => ' ',
        'attr' => array('placeholder' => 'Recherche')))
        ->add('type', ChoiceType::class, array('choices' => $choice,
        'attr' => array('class' => 'selectpicker'),
        'label' => ' '))
        ->getForm();
        $form->handlerequest($request);
        if($form->isValid() && $form->isSubmitted()){
            $data = $form->getData();
            $parameter = $data['recherche'];
            $selecteur = $data['type'];
            if(!$selecteur){
                $query = $em->createQuery('select a from 
                AppBundle\Entity\Annonce as a  where a.titre like :p')
                    ->setParameter('p', '%' . $parameter . '%');
                $annonces = $query->getResult();
            }else{
                $query = $em->createQuery("select a from 
                AppBundle\Entity\Annonce as a JOIN a.type t where a.titre like :p
                AND t.id = :id")
                ->setParameters(['p' => '%' . $parameter . '%',
                'id' => $selecteur
                ]);
                
                $annonces = $query->getResult();
            }
        }
        // dump($selecteur);
        // die();
        
        return $this->render('AppBundle:Annonce:annonce_tab.html.twig', array(
            'annonces' => $annonces,
            'form' => $form->createView(),
            
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