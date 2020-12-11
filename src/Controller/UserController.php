<?php

namespace App\Controller;

use App\Entity\ReportUser;
use App\Entity\User;
use App\Form\Report\ReportUserType;
use App\Form\User\RegistrationType;
use App\Form\User\UserEditType;
use App\Form\User\UserFollowType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $user = new User();
        $formSignUp = $this->createForm(RegistrationType::class, $user);
        $formSignUp->handleRequest($request);

        if ($formSignUp->isSubmitted() && $formSignUp->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $hash = $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($hash);
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('app_login');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'formSignUp' => $formSignUp->createView(),
        ]);
    }

    /**
     * @Route("/{username}", name="user_show", methods={"GET", "POST"})
     */
    public function show(User $user, Request $request): Response
    {
        if ($this->getUser()) {
            $reportUser = new ReportUser();
            $reportForm = $this->createForm(ReportUserType::class, $reportUser);
            $reportForm->handleRequest($request);
            if ($reportForm->isSubmitted() && $reportForm->isValid()) {
                $reportUser->setAuthor($this->getUser());
                $reportUser->setTarget($user);
                $reportUser->setCreated(new \DateTime('NOW'));
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($reportUser);
                $entityManager->flush();
                return $this->redirectToRoute('user_show', ['username' => $user->getUsername()]);
            }

            $followForm = $this->createForm(UserFollowType::class, $this->getUser());
            $followForm->handleRequest($request);
            if ($followForm->isSubmitted() && $followForm->isValid()) {
                if (!$this->getUser()->isFollowing($user)) {
                    $this->getUser()->addFollow($user);
                }
                else {
                    $this->getUser()->removeFollow($user);
                }
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($this->getUser());
                $entityManager->persist($user);
                $entityManager->flush();
                return $this->redirectToRoute('user_show', ['username' => $user->getUsername()]);
            }

            return $this->render('user/show.html.twig', [
                'user' => $user,
                'reportForm' => $reportForm->createView(),
                'followForm' => $followForm->createView()
            ]);
        }
        return $this->render('user/show.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(UserEditType::class, $user);
        $form->handleRequest($request);
        if (file_exists($user->getProfilePicture())) {
            $user->setProfilePicture(new File($user->getProfilePicture()));
        }
        if (file_exists($user->getCoverPicture())) {
            $user->setCoverPicture(new File($user->getCoverPicture()));
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $profilePicture = $form->get('profile_picture')->getData();
            if ($profilePicture) {
                $profilePictureName = $slugger->slug($user->getUsername())."-profile.".$profilePicture->guessExtension();
                try {
                    $profilePicture->move($this->getParameter('user_images_directory'), $profilePictureName);
                    $user->setProfilePicture($profilePictureName);
                } catch (FileException $e) {}
            }

            $coverPicture = $form->get('cover_picture')->getData();
            if ($coverPicture) {
                $coverPictureName = $slugger->slug($user->getUsername())."-cover.".$coverPicture->guessExtension();
                try {
                    $coverPicture->move($this->getParameter('user_images_directory'), $coverPictureName);
                    $user->setCoverPicture($coverPictureName);
                } catch (FileException $e) {}
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_show', ['username' => $user->getUsername()]);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }
}
