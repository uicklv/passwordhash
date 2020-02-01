<?php


namespace App;


use App\Algorithm\AlgorithmInterface;

class Password implements PasswordInterface
{
    private $password;

    public function __construct($password)
    {
        $this->setPassword($password);

    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function hash(AlgorithmInterface $algorithm): string
    {
       return  password_hash($this->getPassword(), $algorithm->getIdentifier(), $algorithm->getOptions());
    }

    public function verify(string $hash): bool
    {
        return password_verify($this->password, $hash);


    }

    public static function needsRehash($hash, AlgorithmInterface $algorithm): bool
    {

        return password_needs_rehash($hash, $algorithm->getIdentifier(), $algorithm->getOptions());

    }

}