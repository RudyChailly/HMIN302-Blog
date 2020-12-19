<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\ReportArticle;
use App\Entity\ReportComment;
use App\Entity\User;
use App\Form\ArticleType;
use App\Form\CommentType;
use App\Form\Report\ReportArticleType;
use App\Form\Report\ReportCommentType;
use App\Form\User\RegistrationType;
use App\Form\User\UserFollowType;
use App\Repository\CommentRepository;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_index", methods={"GET"})
     */
    public function index(Request $request): Response
    {
        if ($this->getUser() && count($this->getUser()->getFollows()) > 0) {
            return $this->redirectToRoute('article_follows');
        }
        return $this->redirectToRoute('article_all');
    }

    /**
     * @Route("/all/{page}", name="article_all", methods={"GET"})
     */
    public function all(Request $request, int $page = 1): Response
    {
        $articleRepository = $this->getDoctrine()->getRepository(Article::class);
        $nbArticles = $articleRepository->findAllCount();
        $articles = $articleRepository->findAll($page);

        $viewParameters = [
            'controller_name' => 'ArticleController',
            'active' => 'all',
            'backgroundColor' => 'white',
            'articles' => $articles,
            'nbArticles' => $nbArticles,
            'page' => $page
        ];
        return $this->render('article/index.html.twig', $viewParameters);
    }

    /**
     * @Route("/follows/{page}", name="article_follows", methods={"GET"})
     */
    public function follows(Request $request, int $page = 1): Response
    {
        $articleRepository = $this->getDoctrine()->getRepository(Article::class);
        $nbArticles = $articleRepository->findByFollowsCount($this->getUser());
        $articles = $articleRepository->findByFollows($this->getUser(), $page);

        $viewParameters = [
            'controller_name' => 'ArticleController',
            'active' => 'follows',
            'backgroundColor' => 'white',
            'articles' => $articles,
            'nbArticles' => $nbArticles,
            'page' => $page
        ];
        return $this->render('article/index.html.twig', $viewParameters);
    }

    /**
     * @Route("/partners/{page}", name="article_partners", methods={"GET"})
     */
    public function partners(Request $request, HttpClientInterface $client, int $page = 1): Response
    {
        $response = $client->request(
            'GET',
            'https://didier-martin-blog.herokuapp.com/api'
        );
        $articlesRecuperes = json_decode($response->getContent())->data;
        $articles = [];
        foreach ($articlesRecuperes as $articleRecupere) {
            $article = new Article();
            $article->setId($articleRecupere->id);
            $article->setTitle($articleRecupere->title);
            $article->setContent($articleRecupere->content);
            $date = date_create_from_format('Y-m-d H:i:s.u', $articleRecupere->datePost->date);
            $article->setPublished($date);
            $article->setComments(null);
            $article->setReportedBy(null);
            array_push($articles, $article);
        }

        $viewParameters = [
            'controller_name' => 'ArticleController',
            'active' => 'partners',
            'backgroundColor' => 'white',
            'articles' => $articles,
            'nbArticles' => count($articlesRecuperes),
            'page' => $page
        ];
        return $this->render('article/index.html.twig', $viewParameters);
    }

    /**
     * @Route("/partners/{id}", name="article_partners_show", methods={"GET"})
     */
    public function partners_show(Request $request, HttpClientInterface $client, int $id): Response
    {
        $viewParameters = [
            'controller_name' => 'ArticleController'
        ];
        $response = $client->request(
            'GET',
            'https://didier-martin-blog.herokuapp.com/api'
        );
        $articlesRecuperes = json_decode($response->getContent())->data;
        foreach ($articlesRecuperes as $articleRecupere) {
            if ($articleRecupere->id == $id) {
                $article = new Article();
                $article->setId($articleRecupere->id);
                $article->setTitle($articleRecupere->title);
                $article->setContent($articleRecupere->content);
                $date = date_create_from_format('Y-m-d H:i:s.u', $articleRecupere->datePost->date);
                $article->setPublished($date);
                $article->setComments(null);
                $article->setReportedBy(null);
                $viewParameters['article'] = $article;
                return $this->render('article/show.html.twig', $viewParameters);
            }
        }
        return $this->redirectToRoute('article_partners_index');
    }

    /**
     * @Route("/new", name="article_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger, ValidatorInterface $validator): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        $errors = $validator->validate($article);
        $viewParameters = [
            'article' => $article,
            'formArticle' => $form->createView(),
            'errors' => $errors
        ];

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $article->setPublished(new \DateTime('NOW'));
                $article->setAuthor($this->getUser());
                $thumbnail = $form->get('thumbnail')->getData();
                if ($thumbnail) {
                    $originalFilename = pathinfo($thumbnail->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename . '-' . uniqid() . '.' . $thumbnail->guessExtension();
                    try {
                        $thumbnail->move(
                            $this->getParameter('article_images_directory'),
                            $newFilename
                        );
                        $article->setThumbnail($newFilename);
                    } catch (FileException $e) {
                    }
                }

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($article);
                $entityManager->flush();

                return $this->redirectToRoute('article_index');
            }
            else {
                $errorsProperties = [];
                foreach ($errors as $error) {
                    if (!in_array($error->getPropertyPath(), $errorsProperties)) {
                        array_push($errorsProperties, $error->getPropertyPath());
                    }
                }
                $viewParameters['errorsProperties'] = $errorsProperties;
            }
        }
        return $this->render('article/new.html.twig', $viewParameters);
    }

    /**
     * @Route("/{urlAlias}", name="article_show", methods={"GET", "POST"})
     */
    public function show(Article $article, Request $request, CommentRepository $commentRepository): Response
    {
        $viewParameters = [
            'controller_name' => 'ArticleController',
            'article' => $article,
            'backgroundColor' => 'white'
        ];
        if ($this->getUser()) {
            // Follow button
            if ($this->getUser()->getId() != $article->getAuthor()->getId()) {
                $user = $article->getAuthor();
                $formFollowButton = $this->createForm(UserFollowType::class, $this->getUser());
                $formFollowButton->handleRequest($request);
                if ($formFollowButton->isSubmitted() && $formFollowButton->isValid()) {
                    if (!$this->getUser()->isFollowing($user)) {
                        $this->getUser()->addFollow($user);
                    } else {
                        $this->getUser()->removeFollow($user);
                    }
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($this->getUser());
                    $entityManager->persist($user);
                    $entityManager->flush();
                    return $this->redirectToRoute('article_show', ['urlAlias' => $article->getUrlAlias()]);
                }
                $viewParameters['formFollowButton'] = $formFollowButton->createView();

                $reportArticle = new ReportArticle();
                $formReport = $this->createForm(ReportArticleType::class, $reportArticle);
                $formReport->handleRequest($request);
                if ($formReport->isSubmitted() && $formReport->isValid()) {
                    $reportArticle->setAuthor($this->getUser());
                    $reportArticle->setTarget($article);
                    $reportArticle->setCreated(new \DateTime('NOW'));
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($reportArticle);
                    $entityManager->flush();
                    return $this->redirectToRoute('article_show', ['urlAlias' => $article->getUrlAlias()]);
                }
                $viewParameters['formReport'] = $formReport->createView();
            }

            // Comment form
            $comment = new Comment();
            $formComment = $this->createForm(CommentType::class, $comment);
            $formComment->handleRequest($request);
            if ($formComment->isSubmitted() && $formComment->isValid()) {
                $comment->setPublished(new \DateTime('NOW'));
                $comment->setAuthor($this->getUser());
                $comment->setArticle($article);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($comment);
                $entityManager->flush();
                return $this->redirectToRoute('article_show', ['urlAlias' => $article->getUrlAlias()]);
            }
            $viewParameters['formComment'] = $formComment->createView();

            // Report comment form
            $reportComment = new ReportComment();
            $formReportComment = $this->createForm(ReportCommentType::class, $reportComment);
            $formReportComment->handleRequest($request);
            if ($formReportComment->isSubmitted() && $formReportComment->isValid()) {
                $reportComment->setAuthor($this->getUser());
                $reportComment->setTarget($commentRepository->find($reportComment->getTarget()));
                $reportComment->setCreated(new \DateTime('NOW'));
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($reportComment);
                $entityManager->flush();
                return $this->redirectToRoute('article_show', ['urlAlias' => $article->getUrlAlias()]);
            }
            $viewParameters['formReportComment'] = $formReportComment->createView();
        }
        return $this->render('article/show.html.twig', $viewParameters);
    }

    /**
     * @Route("/{id}/edit", name="article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Article $article, SluggerInterface $slugger, ValidatorInterface $validator): Response
    {
        if ($this->getUser() && ($this->getUser()->hasAccess($article->getAuthor()))) {
            $form = $this->createForm(ArticleType::class, $article);
            $form->handleRequest($request);
            $errors = $validator->validate($article);
            $viewParameters = [
                'article' => $article,
                'formArticle' => $form->createView(),
                'errors' => $errors
            ];
            if (file_exists($article->getThumbnail())) {
                $article->setThumbnail(new File($article->getThumbnail()));
            }
            if ($form->isSubmitted()) {
                if ($form->isValid()) {
                    $this->getDoctrine()->getManager()->flush();
                    $thumbnail = $form->get('thumbnail')->getData();
                    if ($thumbnail) {
                        $originalFilename = pathinfo($thumbnail->getClientOriginalName(), PATHINFO_FILENAME);
                        $safeFilename = $slugger->slug($originalFilename);
                        $newFilename = $safeFilename . '-' . uniqid() . '.' . $thumbnail->guessExtension();
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
            }
            return $this->render('article/edit.html.twig', $viewParameters);
        }
        return $this->redirectToRoute('article_index');
    }

    /**
     * @Route("/{id}", name="article_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Article $article): Response
    {
        if ($this->getUser() && $this->hasAccess($article->getAuthor())) {
            if ($this->isCsrfTokenValid('delete' . $article->getId(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($article);
                $entityManager->flush();
            }
        }
        return $this->redirectToRoute('article_index');
    }

}
