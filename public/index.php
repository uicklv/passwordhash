<?php
require_once '../vendor/autoload.php';

use App\Password;
use App\Algorithm\Bcrypt;
use App\Algorithm\Argon2i;
use App\Algorithm\Argon2id;

$password = new Password('12345678');

/* Bcrypt */

// 1. Хеширование
$bcrypt = new Bcrypt();
//var_dump($bcrypt);
$password->hash($bcrypt);
// 2. Проверка хеша
$password->verify('$2y$10$UstiA9LfUQs8s7mpCzMWJOPbJ9WdZLyqAT8zfWSQFrg0RxMroy03W'); //true
$password->verify('$2y$10$UstiA9LfUQs8s7mpCzMWJOPbJ9WdZLyqAT8zfWSQFrg0RxMroy03WW'); //false
// 3. Проверка на соответствие алгоритму
Password::needsRehash('$2y$10$UstiA9LfUQs8s7mpCzMWJOPbJ9WdZLyqAT8zfWSQFrg0RxMroy03W', $bcrypt); //false
Password::needsRehash('$2y$10$UstiA9LfUQs8s7mpCzMWJOPbJ9WdZLyqAT8zfWSQFrg0RxMroy03W', new Bcrypt(null, 12)); //true


/* Argon2i */

// 1. Хеширование
$argon2i = new Argon2i();
$password->hash($argon2i); //$argon2i$v=19$m=65536,t=4,p=1$Z3IudXlqR3dmb3ZxUDRZeA$hVeoWp8a6bdg1RfuJZUIAqyIqD9b0HrcfM5Z0q9kF9o

// 2. Проверка хеша
$password->verify('$argon2i$v=19$m=65536,t=4,p=1$Z3IudXlqR3dmb3ZxUDRZeA$hVeoWp8a6bdg1RfuJZUIAqyIqD9b0HrcfM5Z0q9kF9o'); //true
$password->verify('$argon2i$v=19$m=65536,t=4,p=1$Z3IudXlqR3dmb3ZxUDRZeA$hVeoWp8a6bdg1RfuJZUIAqyIqD9b0HrcfM5Z0q9kF9o1'); //false

// 3. Проверка на соответствие алгоритму
Password::needsRehash('$argon2i$v=19$m=65536,t=4,p=1$Z3IudXlqR3dmb3ZxUDRZeA$hVeoWp8a6bdg1RfuJZUIAqyIqD9b0HrcfM5Z0q9kF9o', $argon2i); //false
Password::needsRehash('$argon2i$v=19$m=65536,t=4,p=1$Z3IudXlqR3dmb3ZxUDRZeA$hVeoWp8a6bdg1RfuJZUIAqyIqD9b0HrcfM5Z0q9kF9o', new Argon2i(100)); //true


/* Argon2id */

// 1. Хеширование
$argon2id = new Argon2id();
$password->hash($argon2id); //$argon2id$v=19$m=65536,t=4,p=1$emljWWNhbVFTdXJjQXhkUg$r4N01/8aGsROoJy6z0BRp6Q0TH/F4IrJBprlBq0GUoc

// 2. Проверка хеша
$password = new Password('12345678');
$password->verify('$argon2id$v=19$m=65536,t=4,p=1$emljWWNhbVFTdXJjQXhkUg$r4N01/8aGsROoJy6z0BRp6Q0TH/F4IrJBprlBq0GUoc'); //true
$password->verify('$argon2id$v=19$m=65536,t=4,p=1$emljWWNhbVFTdXJjQXhkUg$r4N01/8aGsROoJy6z0BRp6Q0TH/F4IrJBprlBq0GUoc'); //false

// 3. Проверка на соответствие алгоритму
Password::needsRehash('$argon2id$v=19$m=65536,t=4,p=1$emljWWNhbVFTdXJjQXhkUg$r4N01/8aGsROoJy6z0BRp6Q0TH/F4IrJBprlBq0GUoc', $argon2id); //false
Password::needsRehash('$argon2id$v=19$m=65536,t=4,p=1$emljWWNhbVFTdXJjQXhkUg$r4N01/8aGsROoJy6z0BRp6Q0TH/F4IrJBprlBq0GUoc', new Argon2id(['memory_cost' => 100])); //true