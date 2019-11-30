<?php

namespace App\Controller;

use App\Entity\TypeContract;
use App\Form\TypeContractType;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * TypeContract controller.
 * @package App\Controller
 * @author Rodrigo Alfieri <viperdigo@gmail.com>
 *
 * @Route("/api", name="api_typeContract")
 */
class TypeContractController extends AbstractFOSRestController
{
    /**
     * Get one TypeContract.
     * @Rest\Get("/typeContract/{id}")
     *
     * @return Response
     */
    public function getTypeContractAction($id)
    {
        $typeContract = $this->findTypeContractById($id);
        return $this->handleView($this->view($typeContract));
    }

    /**
     * Lists all TypeContracts.
     * @Rest\Get("/typeContracts")
     *
     * @return Response
     */
    public function getTypeContractsAction()
    {
        $typeContracts = $this->getDoctrine()->getRepository(TypeContract::class)->findall();
        return $this->handleView($this->view($typeContracts));
    }

    /**
     * Create TypeContract.
     * @Rest\Post("/typeContract")
     *
     * @return Response
     */
    public function postTypeContractAction(Request $request)
    {
        $typeContract = new TypeContract();
        $form = $this->createForm(TypeContractType::class, $typeContract);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($typeContract);
            $em->flush();
            return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));

        }

        return $this->handleView($this->view($form->getErrors()));
    }

    /**
     * Update TypeContract.
     * @Rest\Put("/typeContract/{id}")
     *
     * @return Response
     */
    public function putTypeContractAction(Request $request, $id)
    {
        $typeContract = $this->findTypeContractById($id);

        if (is_null($typeContract)) {
            return $this->handleView($this->view('TypeContract not found', Response::HTTP_NOT_FOUND));
        }

        $form = $this->createForm(TypeContractType::class, $typeContract);
        $form->submit(json_decode($request->getContent(), true));

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($typeContract);
            $em->flush();
            return $this->handleView($this->view(null, Response::HTTP_NO_CONTENT));

        }

        return $this->handleView($this->view($form->getErrors()));
    }

    /**
     * Delete TypeContract.
     * @Rest\Delete("/typeContract/{id}")
     *
     * @return Response
     */
    public function deleteTypeContractAction($id)
    {
        $typeContract = $this->findTypeContractById($id);

        if (is_null($typeContract)) {
            return $this->handleView($this->view('TypeContract not found', Response::HTTP_NOT_FOUND));
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($typeContract);
        $entityManager->flush();

        return $this->handleView($this->view(null, Response::HTTP_NO_CONTENT));
    }

    /**
     * @param int $id
     * @return TypeContract|object|null
     */
    private function findTypeContractById(int $id)
    {
        return $this->getDoctrine()->getRepository(TypeContract::class)->find($id);
    }
}