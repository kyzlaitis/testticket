<?php


namespace Test\Kyzlaitis;


abstract class AbstractRender
{
    public const ALIVE = '*';
    public const DEAD = '.';

    abstract public function render(AbstractMesh $abstractMesh): string;
}