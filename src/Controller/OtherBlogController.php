<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\OtherBlog\Article;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class OtherBlogController extends AbstractController
{
    /**
     * @Route("/other", name="other_blog")
     */
    public function index(HttpClientInterface $client): Response
    {
        $response = $client->request(
            'GET',
            'https://didier-martin-blog.herokuapp.com/api'
        );
        $articles = json_decode($response->getContent())->data;
        return $this->render('other_blog/index.html.twig', [
            'articles' => $articles,
        ]);
    }


}
