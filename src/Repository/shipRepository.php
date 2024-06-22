<?php

namespace App\Repository;

// use App\Model\Car;
// use App\Model\CarStatusEnum;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

// https://ll.thespacedevs.com/2.2.0/spacecraft/?limit=5


class shipRepository
{

   public function __construct(private LoggerInterface $logger)
   {
   }

   public function getShips(HttpClientInterface $client): Response
   {
      $rest_api_url = 'https://ll.thespacedevs.com/2.2.0/spacecraft/?limit=1';
      $resp = $client->request('GET', $rest_api_url);
      $response = $resp->toArray();
      dump($response);
      exit();
   }

   public function findAll(): array
   {
      $curl = curl_init();

      curl_setopt_array($curl, array(
         CURLOPT_URL => "https://ll.thespacedevs.com/2.2.0/spacecraft/?limit=1",
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "GET",
         CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
         ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);
      $response = json_decode($response, true); //because of true, it's in an array      
      print_r($response);

      $this->logger->info('Ships collection (REPOSITORY) retrieved');

      return [
         new Car(
            1,
            'BadBoy',
            'Extreme',
            'MrBad',
            CarStatusEnum::LEAD,
         ),
         new Car(
            2,
            'LittleFlower',
            'Soft',
            'Darling',
            CarStatusEnum::NEW,
            // 'images/car2.jpg',
         ),
         new Car(
            3,
            'Warrior',
            'Maximus',
            'HitMan',
            CarStatusEnum::REPAIR,
            // 'images/car3.jpg',
         ),
         new Car(
            4,
            'GreenWheel',
            'Strong',
            'OakMan',
            CarStatusEnum::INACTIVE,
            // 'images/car4.jpg',
         ),
      ];
   }
   public function find(int $id): ?Ship
   {
      foreach ($this->findAll() as $car) {
         if ($car->getId() === $id) {
            return $car;
         }
      }
      return null;
   }
}
