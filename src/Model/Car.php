<?php

namespace App\Model;

class Car
{
   public function __construct(
      private int $id,
      private string $name,
      private string $class,
      private string $driver,
      private string $status,
   ) {
   }
   public function getId(): int
   {
      return $this->id;
   }
   public function getName(): string
   {
      return $this->name;
   }
   public function getClass(): string
   {
      return $this->class;
   }
   public function getDriver(): string
   {
      return $this->driver;
   }
   public function getStatus(): string
   {
      return $this->status;
   }
}
