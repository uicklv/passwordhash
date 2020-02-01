<?php


namespace App\Algorithm;


class Argon2id extends Argon2 implements AlgorithmInterface
{
    protected $identifier = PASSWORD_ARGON2ID;
}