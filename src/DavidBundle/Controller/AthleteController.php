<?php

namespace DavidBundle\Controller;

use DavidBundle\Entity\Athlete;
use DavidBundle\Form\AthleteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;

class AthleteController extends Controller
{
    /**
     * @Route("/athlete", name = "athlete_list_add")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $athlete = new Athlete();
        $form = $this->createForm(AthleteType::class, $athlete);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $picture = $athlete->getPicture();
            $fileName = md5(uniqid()).'.'.$picture->guessExtension();
            $picture->move(
                $this->getParameter('profil_pictures_directory'), $fileName
            );
            $athlete->setPicture($fileName);

            $em->persist($athlete);
            $em->flush();
            $this->addFlash('success', 'Athlete enregistré');
        }

        $athletes = $em->getRepository('DavidBundle:Athlete')->findAll();

        return $this->render(
            'DavidBundle:Athlete:index.html.twig',
            array(
                'athletes' => $athletes,
                'form' => $form->createView(),
            )
        );
    }


    /**
     * @Route("/editAthlete/{id}", name = "athlete_edit")
     */
    public function editCountryAction(Request $request, Athlete $athlete)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(AthleteType::class, $athlete);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $picture = $athlete->getPicture();
            $fileName = md5(uniqid()).'.'.$picture->guessExtension();
            $picture->move(
                $this->getParameter('profil_pictures_directory'), $fileName
            );

            $athlete->setPicture($fileName);

            $em->flush();

            $this->addFlash('success', $this->get('translator')->trans('flash.success.editAthlete'));

            return $this->redirectToRoute('athlete_list_add');
        }

        return $this->render(
            'DavidBundle:Athlete:editAthlete.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }


    /**
     * @Route("/deleteAthlete/{id}", name = "athlete_delete")
     */
    public function delete(Athlete $athlete)
    {
        $em = $this->getDoctrine()->getManager();
        $fs = new Filesystem();
        $fs->remove($this->getParameter('profil_pictures_directory').'/'.$athlete->getPicture());
        $em->remove($athlete);
        $em->flush();
        $this->addFlash('success', $this->get('translator')->trans('flash.success.deleteAthlete'));

        return $this->redirectToRoute('athlete_list_add');
    }
}
