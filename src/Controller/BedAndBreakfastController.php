<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Room;
use App\Form\RoomType;
use App\Repository\RoomRepository;

/**
 * @Route("/room")
 */
class BedAndBreakfastController extends AbstractController
{
    /**
     * @Route("/", name="bed_and_breakfast_index", methods={"GET"})
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $rooms = $em->getRepository(Room::class)->findAll();

        dump($rooms);

        return $this->render(
            'bed_and_breakfast/index.html.twig',
            [
                'rooms' => $rooms
            ]
        );
    }

    /**
     * @Route("/new", name="bed_and_breakfast_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $room = new Room();
        $form = $this->createForm(RoomType::class, $room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($room);
            $entityManager->flush();

            return $this->redirectToRoute('bed_and_breakfast_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bed_and_breakfast/new.html.twig', [
            'room' => $room,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bed_and_breakfast_show", methods={"GET"})
     */
    public function show(Room $room): Response
    {
        return $this->render('bed_and_breakfast/show.html.twig', [
            'room' => $room,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bed_and_breakfast_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Room $room): Response
    {
        $form = $this->createForm(RoomType::class, $room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bed_and_breakfast_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bed_and_breakfast/edit.html.twig', [
            'room' => $room,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bed_and_breakfast_delete", methods={"POST"})
     */
    public function delete(Request $request, Room $room): Response
    {
        if ($this->isCsrfTokenValid('delete' . $room->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($room);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bed_and_breakfast_index', [], Response::HTTP_SEE_OTHER);
    }
}
