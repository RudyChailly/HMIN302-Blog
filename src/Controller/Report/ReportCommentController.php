<?php

namespace App\Controller\Report;

use App\Entity\ReportComment;
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
     * @Route("/{id}", name="report_comment_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ReportComment $reportComment): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reportComment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reportComment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_reports');
    }
}
