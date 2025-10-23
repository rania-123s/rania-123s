<?php

namespace App\Controller;

use App\Repository\HospitalRaniaSelmiRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HospitalRaniaSelmiController extends AbstractController
{
    #[Route('/hospital', name: 'app_hospital_rania_selmi')]
    public function index(HospitalRaniaSelmiRepository $repository): Response
    {
        return $this->render('hospital_rania_selmi/index.html.twig', [
            'hospitals' => $repository->findAll() ,
        ]);
    }

     #[Route('/deletehospital/{id}', name: 'app_deleteauthors')]
    public function deleteauthors($id, HospitalRaniaSelmiRepository $repository, ManagerRegistry $m): Response
    {
        $em = $m->getManager();
        //$del = $authorrep->find($id);
        $del = $repository->find($id);
        $em->remove($del);
        $em->flush();
        return $this->redirectToRoute('app_hospital_rania_selmi');
    }
}
