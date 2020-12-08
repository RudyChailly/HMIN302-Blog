<?php

namespace App\Controller;

use App\Entity\ReportArticle;
use App\Form\ReportArticleType;
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
        return $this->render('report_article/index.html.twig', [
            'report_articles' => $reportArticleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="report_article_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $reportArticle = new ReportArticle();
        $form = $this->createForm(ReportArticleType::class, $reportArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reportArticle);
            $entityManager->flush();

            return $this->redirectToRoute('report_article_index');
        }

        return $this->render('report_article/new.html.twig', [
            'report_article' => $reportArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="report_article_show", methods={"GET"})
     */
    public function show(ReportArticle $reportArticle): Response
    {
        return $this->render('report_article/show.html.twig', [
            'report_article' => $reportArticle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="report_article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ReportArticle $reportArticle): Response
    {
        $form = $this->createForm(ReportArticleType::class, $reportArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('report_article_index');
        }

        return $this->render('report_article/edit.html.twig', [
            'report_article' => $reportArticle,
            'form' => $form->createView(),
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

        return $this->redirectToRoute('report_article_index');
    }
}
