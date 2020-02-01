<?php


namespace App\Algorithm;


class Argon2i extends Argon2 implements AlgorithmInterface
{
     protected $identifier = PASSWORD_ARGON2I;

}