<?php
declare(strict_types=1);

namespace App;

use App\Algorithm\AlgorithmInterface;

interface PasswordInterface
{

    public function hash(AlgorithmInterface $algorithm): string;

    public function verify(string $hash): bool;

    public static function needsRehash($hash, AlgorithmInterface $algorithm): bool;

}