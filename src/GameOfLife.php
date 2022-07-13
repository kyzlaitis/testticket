<?php

namespace Test\Kyzlaitis;

class GameOfLife
{
    public AbstractMesh $mesh;
    public AbstractRender $render;

    public function __construct(AbstractMesh $mesh, AbstractRender $render)
    {
        $this->mesh = $mesh;
        $this->render = $render;
    }


    public function tick(): array
    {
        $gameField    = $this->mesh->getMesh();
        foreach ($gameField as $rowNumber => $cellsInARow) {
            foreach ($cellsInARow as $columnNumber => $cell) {

                if (isset($gameField[$cell->getRowIndex()][$cell->getColumnIndex()])) {
                    $newCell = $this->mesh->getCellBasedOnNeighbors($cell);
                    $gameField[$cell->getRowIndex()][$cell->getColumnIndex()] = $newCell;
                }

            }
        }

        return $this->mesh->getMesh();
    }

    public function run(int $tickPauseSeconds = 1000)
    {
        while (true) {
            system('clear');
            $this->tick();
            echo $this->render->render($this->mesh);
            usleep($tickPauseSeconds);
        }
    }
}

