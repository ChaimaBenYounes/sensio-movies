<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Person;
use App\Form\PersonCreationType;

class PersonController extends AbstractController
{
    /**
     * @Route("/person", name="person")
     */
    public function index()
    {
        return $this->render('person/index.html.twig', [
            'controller_name' => 'PersonController',
        ]);
    }

    /**
     * @Route("/person/new", name="person_new")
     */
    public function newPerson(ObjectManager $em, Person $person = null, Request $request ){

        if(!$person){
            $person = new Person();
        }
        $form = $this->createForm(PersonCreationType::class, $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $person = $form->getData();

            $em->persist($person);
            $em->flush($person);

            //return $this->redirectToRoute('task_success');
            return new Response('ok');
        }
        
        return $this->render('person/new.html.twig', [
            'form' => $form->createView(),
        ]);
        

    }
}
