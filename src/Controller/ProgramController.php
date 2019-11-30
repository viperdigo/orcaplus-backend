<?php

namespace App\Controller;

use App\Entity\Program;
use App\Form\ProgramType;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Program controller.
 * @package App\Controller
 * @author Rodrigo Alfieri <viperdigo@gmail.com>
 *
 * @Route("/api", name="api_program")
 */
class ProgramController extends AbstractFOSRestController
{
    /**
     * Get one Program.
     * @Rest\Get("/program/{id}")
     *
     * @return Response
     */
    public function getProgramAction($id)
    {
        $program = $this->findProgramById($id);
        return $this->handleView($this->view($program));
    }

    /**
     * Lists all Programs.
     * @Rest\Get("/programs")
     *
     * @return Response
     */
    public function getProgramsAction()
    {
        $programs = $this->getDoctrine()->getRepository(Program::class)->findall();
        return $this->handleView($this->view($programs));
    }

    /**
     * Create Program.
     * @Rest\Post("/program")
     *
     * @return Response
     */
    public function postProgramAction(Request $request)
    {
        $program = new Program();
        $form = $this->createForm(ProgramType::class, $program);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($program);
            $em->flush();
            return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));

        }

        return $this->handleView($this->view($form->getErrors()));
    }

    /**
     * Update Program.
     * @Rest\Put("/program/{id}")
     *
     * @return Response
     */
    public function putProgramAction(Request $request, $id)
    {
        $program = $this->findProgramById($id);

        if (is_null($program)) {
            return $this->handleView($this->view('Program not found', Response::HTTP_NOT_FOUND));
        }

        $form = $this->createForm(ProgramType::class, $program);
        $form->submit(json_decode($request->getContent(), true));

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($program);
            $em->flush();
            return $this->handleView($this->view(null, Response::HTTP_NO_CONTENT));

        }

        return $this->handleView($this->view($form->getErrors()));
    }

    /**
     * Delete Program.
     * @Rest\Delete("/program/{id}")
     *
     * @return Response
     */
    public function deleteProgramAction($id)
    {
        $program = $this->findProgramById($id);

        if (is_null($program)) {
            return $this->handleView($this->view('Program not found', Response::HTTP_NOT_FOUND));
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($program);
        $entityManager->flush();

        return $this->handleView($this->view(null, Response::HTTP_NO_CONTENT));
    }

    /**
     * @param int $id
     * @return Program|object|null
     */
    private function findProgramById(int $id)
    {
        return $this->getDoctrine()->getRepository(Program::class)->find($id);
    }
}