<?php

namespace App\Controller;

use App\Entity\Unit;
use App\Form\UnitType;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Unit controller.
 * @package App\Controller
 * @author Rodrigo Alfieri <viperdigo@gmail.com>
 *
 * @Route("/api", name="api_unit")
 */
class UnitController extends AbstractFOSRestController
{
    /**
     * Get one Unit.
     * @Rest\Get("/unit/{id}")
     *
     * @return Response
     */
    public function getUnitAction($id)
    {
        $unit = $this->findUnitById($id);
        return $this->handleView($this->view($unit));
    }

    /**
     * Lists all Units.
     * @Rest\Get("/units")
     *
     * @return Response
     */
    public function getUnitsAction()
    {
        $units = $this->getDoctrine()->getRepository(Unit::class)->findall();
        return $this->handleView($this->view($units));
    }

    /**
     * Create Unit.
     * @Rest\Post("/unit")
     *
     * @return Response
     */
    public function postUnitAction(Request $request)
    {
        $unit = new Unit();
        $form = $this->createForm(UnitType::class, $unit);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($unit);
            $em->flush();
            return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));

        }

        return $this->handleView($this->view($form->getErrors()));
    }

    /**
     * Update Unit.
     * @Rest\Put("/unit/{id}")
     *
     * @return Response
     */
    public function putUnitAction(Request $request, $id)
    {
        $unit = $this->findUnitById($id);

        if (is_null($unit)) {
            return $this->handleView($this->view('Unit not found', Response::HTTP_NOT_FOUND));
        }

        $form = $this->createForm(UnitType::class, $unit);
        $form->submit(json_decode($request->getContent(), true));

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($unit);
            $em->flush();
            return $this->handleView($this->view(null, Response::HTTP_NO_CONTENT));

        }

        return $this->handleView($this->view($form->getErrors()));
    }

    /**
     * Delete Unit.
     * @Rest\Delete("/unit/{id}")
     *
     * @return Response
     */
    public function deleteUnitAction($id)
    {
        $unit = $this->findUnitById($id);

        if (is_null($unit)) {
            return $this->handleView($this->view('Unit not found', Response::HTTP_NOT_FOUND));
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($unit);
        $entityManager->flush();

        return $this->handleView($this->view(null, Response::HTTP_NO_CONTENT));
    }

    /**
     * @param int $id
     * @return Unit|object|null
     */
    private function findUnitById(int $id)
    {
        return $this->getDoctrine()->getRepository(Unit::class)->find($id);
    }
}