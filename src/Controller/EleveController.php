<?php

namespace App\Controller;

use App\Repository\EleveRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EleveController extends AbstractController
{
    /**
     * @Route("/eleve/index", name="app_eleve")
     */
    public function index(EleveRepository $eleve): Response
    {

        $eleves = $eleve->findAll();
        return $this->render('eleve/index.html.twig', [
            'eleve' => $eleves,
        ]);
    }
}
