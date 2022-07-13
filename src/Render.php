<?php
namespace Test\Kyzlaitis;


class Render extends AbstractRender
{
    public function render(AbstractMesh $abstractMesh): string
    {
        $output = '';
        foreach ($abstractMesh->getMesh() as $cellRow) {
            foreach ($cellRow as $cell) {
                if ($cell->isAlive()) {
                    $output .= 'A';
                } else {
                    $output .= 'D';
                }
            }
            $output .= PHP_EOL;
        }
        return $output;
    }
}