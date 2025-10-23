<?php

namespace App\Controller;

use App\Form\ChambreType;
use App\Repository\ChambreRaniaSelmiRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ChambreRaniaSelmiController extends AbstractController
{
    #[Route('/chambre', name: 'app_chambre_rania_selmi')]
    public function index(ChambreRaniaSelmiRepository $repository): Response
    {
        return $this->render('chambre_rania_selmi/index.html.twig', [
            'chambres' => $repository->findAll(),
        ]);
    }

     #[Route('/detailchambre/{id}', name: 'app_chambredetail')]
    public function detailchambre($id, ChambreRaniaSelmiRepository $repository, ManagerRegistry $m): Response
    {
        $em = $m->getManager();
        $chambre = $repository->find($id);
         return $this->render('chambre_rania_selmi/index.html.twig', [
            'chambre' => $chambre,
        ]);
    }

    #[Route('/updatechambre/{id}', name: 'app_updatechambre')]
    public function updateformauthors($id, Request $req, ChambreRaniaSelmiRepository $repository, ManagerRegistry $m): Response
    {
        $em = $m->getManager();
        $author = $repository->find($id);
        $form = $this->createForm(ChambreType::class, $author);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($author);
            $em->flush();
        }
        return $this->render('chambre_rania_selmi/update.html.twig', [
            'f' => $form,
        ]);
    }
}
