<?php

namespace App\Controller;

use App\Entity\ReportComment;
use App\Form\ReportCommentType;
use App\Repository\ReportCommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/report/comment")
 */
class ReportCommentController extends AbstractController
{
    /**
     * @Route("/", name="report_comment_index", methods={"GET"})
     */
    public function index(ReportCommentRepository $reportCommentRepository): Response
    {
        return $this->render('report_comment/index.html.twig', [
            'report_comments' => $reportCommentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="report_comment_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $reportComment = new ReportComment();
        $form = $this->createForm(ReportCommentType::class, $reportComment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reportComment);
            $entityManager->flush();

            return $this->redirectToRoute('report_comment_index');
        }

        return $this->render('report_comment/new.html.twig', [
            'report_comment' => $reportComment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="report_comment_show", methods={"GET"})
     */
    public function show(ReportComment $reportComment): Response
    {
        return $this->render('report_comment/show.html.twig', [
            'report_comment' => $reportComment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="report_comment_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ReportComment $reportComment): Response
    {
        $form = $this->createForm(ReportCommentType::class, $reportComment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('report_comment_index');
        }

        return $this->render('report_comment/edit.html.twig', [
            'report_comment' => $reportComment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="report_comment_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ReportComment $reportComment): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reportComment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reportComment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('report_comment_index');
    }
}
