<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
   #[Route('/')]
   public function homepage(CarRepository $carRepository): Response
   {
      $cars = $carRepository->findAll();
      // $carCount = count($cars);
      $myCar = $cars[array_rand($cars)];
      return $this->render('main/homepage.html.twig', [
         // 'numberOfCars' => $carCount,
         'myCar' => $myCar,
         'cars' => $cars,
      ]);
   }
}
