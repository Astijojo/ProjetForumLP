<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Message;
use App\Entity\Topic;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForumController extends AbstractController
{
    /**
     * @Route("/", name="forum")
     */
    public function index(): Response
    {
        $categories = $this->getDoctrine()->getRepository(Categorie::class)->findAll();
        //$topics = $this->getDoctrine()->getRepository(Topic::class)->findBy(["idCate" => $idCategorie]);
        return $this->render('forum/index.html.twig', [
            'controller_name' => 'ForumController',
            'categories' => $categories,
            //'topics' => $topics
        ]);
    }

    /**
     * @Route("/categorie/{idCategorie}", name="categorie")
     */
    public function showPost($idCategorie){
        $repo = $this->getDoctrine()->getRepository(Topic::class);
        $topics = $repo->findBy(["idCate" => $idCategorie]);
        return $this->render('forum/categorie.html.twig', [
            'controller_name' => 'ForumController',
            'topics' => $topics
        ]);
    }

    /**
     *@Route("/topic/{idTopic}", name="topic")
     */
    public function showMessage($idTopic){
        $repo = $this->getDoctrine()->getRepository(Message::class);
        $topic = $this->getDoctrine()->getRepository(Topic::class)->findBy(["id" => $idTopic]);
        $messages = $repo->findBy(["idTopic" => $idTopic]);
        return $this->render('forum/message.html.twig', [
            'controller_name' => 'ForumController',
            'messages' => $messages,
            'topic' => $topic
        ]);
    }

    /**
     *@Route("/categorie/topic/{idTopic}", name="newTopic")
     */
    public function createTopic(){
        return $this->render('forum/createTopic.html.twig');
    }

    /**
     *@Route("/login", name="userLogin")
     */
    public function userLogin(){
        return $this->render('forum/userLogin.html.twig');
    }

    /**
     *@Route("/register", name="userRegister")
     */
    public function userRegister(){
        return $this->render('forum/userRegister.html.twig');
    }

}
