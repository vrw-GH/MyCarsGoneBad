<?php

namespace App\Repository;

use App\Model\Car;
use Psr\Log\LoggerInterface;

class CarRepository
{
   public function __construct(private LoggerInterface $logger)
   {
   }
   public function findAll(): array
   {
      $this->logger->info('Car collection (REPOSITORY) retrieved');
      return [
         new Car(
            1,
            'BadBoy',
            'Extreme',
            'MrBad',
            'leading',
         ),
         new Car(
            2,
            'LittleFlower',
            'Soft',
            'Darling',
            'attached to BadBoy',
         ),
         new Car(
            3,
            'Fighter',
            'Warrior',
            'Maximus',
            'repaired',
         ),
         new Car(
            4,
            'GreenWheel',
            'Strong',
            'OakMan',
            'Full Power',
         ),
      ];
   }
   public function find(int $id): ?Car
   {
      foreach ($this->findAll() as $car) {
         if ($car->getId() === $id) {
            return $car;
         }
      }
      return null;
   }
}
