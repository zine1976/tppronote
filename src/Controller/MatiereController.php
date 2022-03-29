<?php

namespace App\Controller;

use App\Repository\MatiereRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MatiereController extends AbstractController
{
    /**
     * @Route("/matiere/index", name="app_matiere")
     */
    public function index(MatiereRepository $matiere): Response
    {

        $matieres = $matiere->findAll();

        return $this->render('matiere/index.html.twig', [
            'matiere' => $matieres,
        ]);
    }
}
