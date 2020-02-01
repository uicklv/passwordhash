<?php


namespace App\Algorithm;


interface AlgorithmInterface
{

    public function getIdentifier(): string;

    public function getOptions(): array;

}