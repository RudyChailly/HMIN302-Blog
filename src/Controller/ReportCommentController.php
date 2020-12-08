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
        return $this->render('comment/index.html.twig', [
            'report_comments' => $reportCommentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="report_comment_show", methods={"GET"})
     */
    public function show(ReportComment $reportComment): Response
    {
        return $this->render('comment/show.html.twig', [
            'comment' => $reportComment,
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
