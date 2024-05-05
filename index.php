<?php

define('ROOT_DIR', __DIR__);

session_start();
include_once __DIR__ . '/vendor/autoload.php';

$config = include __DIR__ . '/Config/Block.php';
echo (new Liloi\Rune\Application($config))->compile();