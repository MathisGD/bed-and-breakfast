<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BedAndBreakfastController extends AbstractController
{
    /**
     * @Route("/bed/and/breakfast", name="bed_and_breakfast")
     */
    public function index(): Response
    {
        return $this->render('bed_and_breakfast/index.html.twig', [
            'controller_name' => 'BedAndBreakfastController',
        ]);
    }
}
