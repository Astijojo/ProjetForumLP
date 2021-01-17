<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Message;
use App\Entity\Topic;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Node\TextNode;

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
    public function showPost($idCategorie, Request $request, EntityManagerInterface $manager){
        $repo = $this->getDoctrine()->getRepository(Topic::class);
        $topics = $repo->findBy(["idCate" => $idCategorie]);

        $newTopic = new Topic();
        $form = $this->createFormBuilder($newTopic)
                        ->add('titreTopic')
                        ->add('contenuTopic')
                        ->getform();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user = $this->getUser();
            $newTopic->setIdUser($user->getId());
            $newTopic->setPseudoUser($user->getUsername());
            $newTopic->setIdCate($idCategorie);
            $newTopic->setDateHeureTopic(new \DateTime());

            $manager->persist($newTopic);
            $manager->flush();

            return $this->redirectToRoute('topic', ['idTopic' => $newTopic->getId()]);
        }

        return $this->render('forum/categorie.html.twig', [
            'controller_name' => 'ForumController',
            'topics' => $topics,
            'formTopic' => $form->createView()
        ]);
    }

    /**
     *@Route("/topic/{idTopic}", name="topic")
     */
    public function showMessage($idTopic, Request $request, EntityManagerInterface $manager){
        $repo = $this->getDoctrine()->getRepository(Message::class);
        $topic = $this->getDoctrine()->getRepository(Topic::class)->findBy(["id" => $idTopic]);
        $messages = $repo->findBy(["idTopic" => $idTopic]);

        $newMessage = new Message();
        $form = $this->createFormBuilder($newMessage)
                        ->add('contenuMess')
                        ->getform();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user = $this->getUser();
            $newMessage->setIdUser($user->getId());
            $newMessage->setPseudoUser($user->getUsername());
            $newMessage->setIdTopic($idTopic);
            $newMessage->setDateHeureMess(new \DateTime());

            $manager->persist($newMessage);
            $manager->flush();

            return $this->redirectToRoute('topic', ['idTopic' => $idTopic]);
        }


        return $this->render('forum/message.html.twig', [
            'controller_name' => 'ForumController',
            'messages' => $messages,
            'topics' => $topic,
            'formMessage' => $form->createView()
        ]);
    }

    /**
     *@Route("/profile", name="profileInterface")
     */
    public function profileInterface(){
        return $this->render('base.html.twig');
    }


}
