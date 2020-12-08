<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\ReportArticle;
use App\Entity\ReportComment;
use App\Form\ArticleType;
use App\Form\CommentType;
use App\Form\Report\ReportArticleType;
use App\Form\Report\ReportCommentType;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_index", methods={"GET"})
     */
    public function index(): Response
    {
        $articleRepository = $this->getDoctrine()->getRepository(Article::class);
        $articles = $articleRepository->findAll();

        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/new", name="article_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        //TODO WYSIWYG
        // TODO Nom images
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article->setPublished(new \DateTime('NOW'));
            $article->setAuthor($this->getUser());
            $thumbnail = $form->get('thumbnail')->getData();
            if ($thumbnail) {
                $originalFilename = pathinfo($thumbnail->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$thumbnail->guessExtension();
                try {
                    $thumbnail->move(
                        $this->getParameter('article_images_directory'),
                        $newFilename
                    );
                    $article->setThumbnail($newFilename);
                } catch (FileException $e) {}

            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('article_index');
        }

        return $this->render('article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{urlAlias}", name="article_show", methods={"GET", "POST"})
     */
    public function show(Article $article, Request $request, CommentRepository $commentRepository): Response
    {
        if ($this->getUser()) {
            $reportArticle = new ReportArticle();
            $reportForm = $this->createForm(ReportArticleType::class, $reportArticle);
            $reportForm->handleRequest($request);
            if ($reportForm->isSubmitted() && $reportForm->isValid()) {
                $reportArticle->setAuthor($this->getUser());
                $reportArticle->setTarget($article);
                $reportArticle->setCreated(new \DateTime('NOW'));
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($reportArticle);
                $entityManager->flush();
                return $this->redirectToRoute('article_show', ['urlAlias' => $article->getUrlAlias()]);
            }

            $comment = new Comment();
            $formNewComment = $this->createForm(CommentType::class, $comment);
            $formNewComment->handleRequest($request);
            if ($formNewComment->isSubmitted() && $formNewComment->isValid()) {
                $comment->setPublished(new \DateTime('NOW'));
                $comment->setAuthor($this->getUser());
                $comment->setArticle($article);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($comment);
                $entityManager->flush();
                return $this->redirectToRoute('article_show', ['urlAlias' => $article->getUrlAlias()]);
            }
            //TODO mettre le formulaire dans un modal
            $reportComment = new ReportComment();
            $reportCommentForm = $this->createForm(ReportCommentType::class, $reportComment);
            $reportCommentForm->handleRequest($request);
            if ($reportCommentForm->isSubmitted() && $reportCommentForm->isValid()) {
                $reportComment->setAuthor($this->getUser());
                $reportComment->setTarget($commentRepository->find($reportComment->getTarget()));
                $reportComment->setCreated(new \DateTime('NOW'));
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($reportComment);
                $entityManager->flush();
                return $this->redirectToRoute('article_show', ['urlAlias' => $article->getUrlAlias()]);
            }
            return $this->render('article/show.html.twig', [
                'article' => $article,
                'formNewComment' => $formNewComment->createView(),
                'reportForm' => $reportForm->createView(),
                'reportCommentForm' => $reportCommentForm->createView()
            ]);
        }
        return $this->render('article/show.html.twig', [
            'article' => $article
        ]);
    }

    /**
     * @Route("/{id}/edit", name="article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Article $article, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if (file_exists($article->getThumbnail())) {
            $article->setThumbnail(new File($article->getThumbnail()));
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $thumbnail = $form->get('thumbnail')->getData();
            if ($thumbnail) {
                $originalFilename = pathinfo($thumbnail->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$thumbnail->guessExtension();
                try {
                    $thumbnail->move(
                        $this->getParameter('article_images_directory'),
                        $newFilename
                    );
                    $article->setThumbnail($newFilename);
                } catch (FileException $e) {}

            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();
            return $this->redirectToRoute('article_show', ['urlAlias' => $article->getUrlAlias()]);
        }

        return $this->render('article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Article $article): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_index');
    }

}
