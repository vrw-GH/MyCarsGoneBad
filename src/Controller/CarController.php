<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
   #[Route('/cars/{id<\d+>}', name: 'app_car_show')]
   public function show(int $id, CarRepository $repository): Response
   {
      $car = $repository->find($id);
      if (!$car) {
         throw $this->createNotFoundException('Car with this ID Not Found');
      }

      return $this->render('car/show.html.twig', ['car' => $car]);
   }
}
