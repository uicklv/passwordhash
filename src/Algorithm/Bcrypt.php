<?php


namespace App\Algorithm;


use App\Algorithm\AlgorithmInterface;

class Bcrypt implements AlgorithmInterface
{
    private $identifier = PASSWORD_BCRYPT;

    private $options = [];

    public function __construct($salt = null, $cost = null)
    {

        if ($salt !== null || $cost !== null) {
            $this->options = ['salt' => $salt, 'cost' => $cost];
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