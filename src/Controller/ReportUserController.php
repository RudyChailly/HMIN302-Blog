<?php

namespace App\Controller;

use App\Entity\ReportUser;
use App\Form\ReportUserType;
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
     * @Route("/", name="report_user_index", methods={"GET"})
     */
    public function index(ReportUserRepository $reportUserRepository): Response
    {
        return $this->render('report/user/index.html.twig', [
            'report_users' => $reportUserRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="report_user_show", methods={"GET"})
     */
    public function show(ReportUser $reportUser): Response
    {
        return $this->render('report/user/show.html.twig', [
            'report' => $reportUser,
        ]);
    }

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

        return $this->redirectToRoute('report_user_index');
    }
}
