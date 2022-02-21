<?php

namespace App\Controller;

use App\Form\VertragFormType;
use App\Entity\Vertrag;
use App\Repository\VertragRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class VertragsController extends AbstractController
{
    /**
     * @Route("/vertragnew", name="vertrags")
     */
    public function index(Request $request): Response
    {
        $vertrag = new Vertrag(); 
	$doct = $this->getDoctrine()->getManager();
        $form = $this->createForm(VertragFormType::class, $vertrag); # erz form aus entity
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
               $doct->persist($vertrag);
               $doct->flush();
        } 
        return $this->render('vertrags/index.html.twig', [
            'controller_name' => 'VertragsController',
	    'myform' => $form->createView()
        ]);
    }

    /**
     * @Route("/vertragshow", name="show")
     */
    public function show(VertragRepository $repo): Response
    {
	$vertraege = $repo->findAll(); 
 
        return $this->render('vertrags/show.html.twig', [
            'controller_name' => 'VertragsController',
	    'vertraege' => $vertraege 
        ]);
    }

}
