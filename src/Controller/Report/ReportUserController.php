<?php

namespace App\Controller\Report;

use App\Entity\ReportUser;
use App\Repository\ReportUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/report/user")
 */
class ReportUserController extends AbstractController
{
    /**
     * @Route("/{id}", name="report_user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ReportUser $reportUser): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reportUser->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reportUser);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_reports');
    }
}
