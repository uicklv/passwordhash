<?php


namespace App\Algorithm;


 abstract class Argon2
{
     protected $identifier;
     protected $options = [];

     public function __construct($m = null, $t = null, $th = null)
     {

         if ($m !== null || $t !== null || $th = null) {
             $this->options = ['memory_cost' => $m, 'time_cost' => $t, 'threads' => $th];
         }

     }

     public function getIdentifier(): string
     {
         return $this->identifier;
     }

     public function getOptions(): array
     {
         return $this->options;
     }
}