<?php

namespace DavidBundle\Controller;

use DavidBundle\Entity\City;
use DavidBundle\Form\CityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CityController extends Controller
{
    /**
     * @Route("/city", name = "city")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $city = new City();
        $form = $this->createForm(CityType::class, $city);

        $cities = $em->getRepository('DavidBundle:City')->findAll();

        return $this->render(
            'DavidBundle:City:index.html.twig',
            array(
                'cities' => $cities,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * @Route("/city/add", name="city_add")
     */
    public function addAction(Request $request)
    {
        $city = new City();
        $form = $this->createForm(CityType::class, $city);
        $form->handleRequest($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($city);
            $em->flush();

            return  new JsonResponse(['name' => $city->getName(), 'id' => $city->getId() ]);
        }

        return new JsonResponse($form->getErrors(true)[0]->getMessage(), 400);
    }

    /**
     * @Route("/city/form/{id}", name="city_form")
     */
    public function getFormAction(Request $request, $id = null)
    {
        $em = $this->getDoctrine()->getManager();
        if ($id) {
            $city = $em->getRepository('DavidBundle:City')->find($id);
        } else {
            $city = new City();
        }
        $form = $this->createForm(CityType::class, $city);

        return $this->render('DavidBundle:City:form.html.twig',[ 'form' => $form->createView()]);;
    }

    /**
     * @Route("/city/remove/{id}", name="city_delete")
     */
    public function removeAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $ville = $em->getRepository('DavidBundle:City')->find($id);
        $em->remove($ville);
        $em->flush();

        return new JsonResponse([], 200);
    }

}
