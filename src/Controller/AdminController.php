<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\User;
use App\Entity\ReportArticle;
use App\Entity\ReportComment;
use App\Entity\ReportUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->redirectToRoute('admin_articles');
    }

    /**
     * @Route("/admin/articles", name="admin_articles")
     */
    public function articles():Response
    {
        $articleRepository = $this->getDoctrine()->getRepository(Article::class);
        $articles = $articleRepository->findBy([],["published" => 'DESC']);

        return $this->render('admin/articles.html.twig', [
            'controller_name' => 'AdminController',
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/admin/users", name="admin_users")
     */
    public function users():Response
    {
        $userRepository = $this->getDoctrine()->getRepository(User::class);
        $users = $userRepository->findBy([],["username" => 'ASC']);

        return $this->render('admin/users.html.twig', [
            'controller_name' => 'AdminController',
            'users' => $users
        ]);
    }

    /**
     * @Route("/admin/reports", name="admin_reports")
     */
    public function reports():Response
    {
        $articleRepository = $this->getDoctrine()->getRepository(ReportArticle::class);
        $articles = $articleRepository->findBy([],["created" => 'ASC']);
        $userRepository = $this->getDoctrine()->getRepository(ReportUser::class);
        $users = $userRepository->findBy([],["created" => 'ASC']);
        $commentRepository = $this->getDoctrine()->getRepository(ReportComment::class);
        $comments = $commentRepository->findBy([],["created" => 'ASC']);

        return $this->render('admin/reports.html.twig', [
            'controller_name' => 'AdminController',
            'reportedArticles' => $articles,
            'reportedUsers' => $users,
            'reportedComments' => $comments
        ]);
    }
}
