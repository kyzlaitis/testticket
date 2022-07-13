<?php


namespace Test\Kyzlaitis;


abstract class AbstractMesh
{
    public const X_AXIS = 4;
    public const Y_AXIS = 4;
    protected array $mesh = [];

    abstract protected function populateMesh(): void;

    public function getMesh(): array
    {
        return $this->mesh;
    }

    public function setMesh(array $mesh): void
    {
        $this->mesh = $mesh;
    }
}
// d a a
// a d a
// a a d