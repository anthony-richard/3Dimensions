<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowcaseController extends AbstractController
{
    /**
     * @Route("/", name="showcase_home")
     */
    public function index(): Response
    {
        return $this->render('showcase/index.html.twig', [
            'controller_name' => 'ShowcaseController',
        ]);
    }

    /**
     * @Route("/model3D/{id}", name="showcase_model3D")
     */

    //  id à mettre en param
    public function model3D(): Response
    {
        return $this->render('showcase/model3D.html.twig', [
            'controller_name' => 'ShowcaseController',
        ]);
    }

    /**
     * @Route("/profil", name="showcase_profil")
     */
    public function profil(): Response
    {
        return $this->render('showcase/profil.html.twig', [
            'controller_name' => 'ShowcaseController',
        ]);
    }

    /**
     * @Route("/updateModel3D", name="showcase_updateModel3D")
     */
    public function updateModel3D(): Response
    {
        return $this->render('showcase/updateModel3D.html.twig', [
            'controller_name' => 'ShowcaseController',
        ]);
    }

    
}
