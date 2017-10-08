<?php

namespace DavidBundle\Controller;

use DavidBundle\Entity\Country;
use DavidBundle\Form\CountryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CountryController extends Controller
{
    /**
     * @Route("/country", name = "country_list_add")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $country = new Country();
        $form = $this->createForm(CountryType::class, $country);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $flag = $country->getFlag();
            $fileName = md5(uniqid()).'.'.$flag->guessExtension();
            $flag->move(
                $this->getParameter('flags_directory'), $fileName
            );

            $country->setFlag($fileName);

            $em->persist($country);
            $em->flush();
            $this->addFlash('success', 'Pays enregistré');
        }

        $countries = $em->getRepository('DavidBundle:Country')->findAll();

        return $this->render(
            'DavidBundle:Country:index.html.twig',
            array(
                'countries' => $countries,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * @Route("/editCountry/{id}", name = "country_edit")
     */
    public function editCountryAction(Request $request, Country $country)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(CountryType::class, $country);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $flag = $country->getFlag();
            $fileName = md5(uniqid()).'.'.$flag->guessExtension();
            $flag->move(
                $this->getParameter('flags_directory'), $fileName
            );

            $country->setFlag($fileName);

            $em->flush();

            $this->addFlash('success', $this->get('translator')->trans('flash.success.editCountry'));
        }

        return $this->render(
            'DavidBundle:Country:editCountry.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/deleteCountry/{id}", name = "country_delete")
     */
    public function delete(Country $country)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($country);
        $em->flush();
        $this->addFlash('success', $this->get('translator')->trans('flash.success.deleteCountry'));

        return $this->redirectToRoute('country_list_add');
    }
}
