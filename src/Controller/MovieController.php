<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Movie;
use App\Form\MovieCreationType;

class MovieController extends AbstractController
{
    /**
     * @Route("/movie", name="movie")
     */
    public function index()
    {
        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
        ]);
    }

    /**
     * @Route("/movie/new", name="movie_new")
     */
    public function newMovie(ObjectManager $em, Movie $movie = null, Request $request){

        if(!$movie){
            $movie = new Movie();
        }
        
        $form = $this->createForm(MovieCreationType::class, $movie);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
        
            $movie = $form->getData();

            $em->persist($movie);
            $em->flush($movie);

            //return $this->redirectToRoute('task_success');
            return new Response('ok');
        }
        
        return $this->render('movie/new.html.twig', [
            'form' => $form->createView()
        ]);
        

    }
}
