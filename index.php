<?php
require 'vendor/autoload.php';

$mesh = new \Test\Kyzlaitis\Mesh2D();
$render = new \Test\Kyzlaitis\Render();

(new \Test\Kyzlaitis\GameOfLife($mesh, $render))->run();


$breakPoint = 2;


