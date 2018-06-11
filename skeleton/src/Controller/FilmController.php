<?php

namespace App\Controller;

use App\Entity\Film;
use App\Form\FilmFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FilmController extends AbstractController
{
    /**
     * @Route("/", name="film")
     */
    public function index()
    {

        $films = $this->getDoctrine()->getRepository(Film::class)->findAll();

        return $this->render('film/index.html.twig', [
            'films' => $films,
        ]);
    }

    /**
     * @Route("/film/create", name="film_create")
     */

    public function create(Request $request){
        $film = new Film();
        $form = $this->createForm(FilmFormType::class,$film);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();

            return $this->redirectToRoute('film');
        }

        return $this->render('film/create.html.twig',array(
            "form"=>$form->createView()
        ));

    }

    /**
     * @Route("/film/delete/{id}", name="film_delete")
     */

    public function delete($id){
        $film = $this->getDoctrine()->getRepository(Film::class)->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($film);
        $em->flush();

        return $this->redirectToRoute('film');

    }

    /**
     * @Route("/film/update/{id}", name="film_update")
     */

    public function update(Request $request, Film $filmOne){
        $film = new Film();
        $film = $filmOne;

        $form = $this->createForm(FilmFormType::class,$film);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();

            return $this->redirectToRoute('film');
        }

        return $this->render('film/edit.html.twig',array(
            "form"=>$form->createView()
        ));

    }

    /**
     * @Route("/film/{id}" , name="film_show")
     */

    public function read($id){
        $film = $this->getDoctrine()->getRepository(Film::class)->find($id);

        return $this->render('film/detail.html.twig',array(
            'film' =>$film,
        ));

    }



}
