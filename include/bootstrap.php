<?php
// include/bootstrap.php
require __DIR__ . '/../vendor/autoload.php';

// IMPORTANT: point to the project root, not include/
$root = dirname(__DIR__); // e.g., D:\laragon\www\testcreation
$dotenv = Dotenv\Dotenv::createImmutable($root);
$dotenv->safeLoad();

// tiny helper to read env safely
if (!function_exists('envx')) {
  function envx(string $key, $default = null) {
    $v = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);
    return ($v === false || $v === null || $v === '') ? $default : $v;
  }
}
