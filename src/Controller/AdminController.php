<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\Topic;
use App\Entity\User;
use App\Form\EditUserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

{
    /**
     * @Route("/admin", name="admin_")
     */
class AdminController extends AbstractController
{
    /**
     * @Route("", name="index")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * Liste les utilisateurs du site
     * @Route("/utilisateurs", name="utilisateurs")
     * @param UserRepository $users
     * @return Response
     */
    public function usersList(UserRepository $users) { // Injection des dépendances de UserRepository (pour utiliser findALl)
        return $this->render("admin/user.html.twig", ['users' => $users->findAll()]);
    }

    /**
     * Modifier un utilisateur
     * @Route("/utilisateur/modifier/{id}", name="modifier_utilisateur")
     * @param User $user
     * @param Request $request
     * @return Response
     */
    public function editUser(User $user, Request $request) {
        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('message', 'Utilisateur modifié avec succès');
            return $this->redirectToRoute('admin_utilisateurs');
        }
        return $this->render('admin/edituser.html.twig', [
            'userForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/supprimer/{id}", name="supprimer_message")
     * @param int $id
     * @return Response
     */
    public function supprimerMessage(int $id){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository(Message::class)->findOneBy(['id' => $id]);
        $em->remove($entity);
        $em->flush();
        return $this->redirectToRoute('topic', ['idTopic' => $entity->getIdTopic()]);
    }

    /**
     * @Route("/supprimerTopic/{id}", name="supprimer_topic")
     * @param int $id
     * @return Response
     */
    public function supprimerTopic(int $id){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository(Topic::class)->findOneBy(['id' => $id]);
        $message = $em->getRepository(Message::class)->findBy(['idTopic' => $id]);
        for($i=0; $i < count($message); $i++){
            $em->remove($message[$i]);
        }
        $em->remove($entity);
        $em->flush();
        return $this->redirectToRoute('categorie', ['idCategorie' => $entity->getIdCate()]);
    }
}
}
