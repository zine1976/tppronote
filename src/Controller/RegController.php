<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegController extends AbstractController
{
    /**
     * @Route("/reg/reg", name="app_reg")
     */
    public function index(): Response
    {
        return $this->render('reg/reg.html.twig', [
            'controller_name' => 'RegController',
        ]);
    }
}
