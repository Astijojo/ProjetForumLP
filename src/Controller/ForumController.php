<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForumController extends AbstractController
{
    /**
     * @Route("/forum", name="forum")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Categorie::class);
        $categories = $repo->findAll();
        return $this->render('forum/index.html.twig', [
            'controller_name' => 'ForumController',
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home() {
        return $this->render('forum/home.html.twig');
    }
}
