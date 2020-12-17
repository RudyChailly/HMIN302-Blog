<?php

namespace App\Controller\Report;

use App\Entity\ReportArticle;
use App\Repository\ReportArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/report/article")
 */
class ReportArticleController extends AbstractController
{
    /**
     * @Route("/", name="report_article_index", methods={"GET"})
     */
    public function index(ReportArticleRepository $reportArticleRepository): Response
    {
        return $this->render('report/article/articles.html.twig', [
            'report_articles' => $reportArticleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="report_article_show", methods={"GET"})
     */
    public function show(ReportArticle $reportArticle): Response
    {
        return $this->render('article/show.html.twig', [
            'article' => $reportArticle,
        ]);
    }

    /**
     * @Route("/{id}", name="report_article_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ReportArticle $reportArticle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reportArticle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reportArticle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_reports');
    }
}
