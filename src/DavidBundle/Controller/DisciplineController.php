<?php

namespace DavidBundle\Controller;

use DavidBundle\Entity\Discipline;
use DavidBundle\Form\DisciplineType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DisciplineController extends Controller
{
    /**
     * @Route("/discipline", name = "discipline_list_add")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $discipline = new Discipline();
        $form = $this->createForm(DisciplineType::class, $discipline);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($discipline);
            $em->flush();
            $this->addFlash('success', 'Discipline enregistrée');
        }

        $disciplines = $em->getRepository('DavidBundle:Discipline')->findAll();

        return $this->render(
            'DavidBundle:Discipline:index.html.twig',
            array(
                'disciplines' => $disciplines,
                'form' => $form->createView(),
            )
        );
    }


    /**
     * @Route("/editDiscipline/{id}", name = "discipline_edit")
     */
    public function editDisciplineAction(Request $request, Discipline $discipline)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(DisciplineType::class, $discipline);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->flush();
            $this->addFlash('success', $this->get('translator')->trans('flash.success.editDiscipline'));
            $this->redirectToRoute('discipline_list_add');
        }

        return $this->render(
            'DavidBundle:Discipline:editDiscipline.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }


    /**
     * @Route("/deleteDiscipline/{id}", name = "discipline_delete")
     */
    public function delete(Discipline $discipline)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($discipline);
        $em->flush();
        $this->addFlash('success', $this->get('translator')->trans('flash.success.deleteDiscipline'));

        return $this->redirectToRoute('discipline_list_add');
    }
}
