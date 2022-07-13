<?php

namespace Test\Kyzlaitis;

class Mesh2D extends AbstractMesh
{

    public function __construct()
    {
        $this->populateMesh();
    }

    protected function populateMesh(): void
    {
        for ($xAxis = 1; $xAxis <= self::X_AXIS; ++$xAxis) {
            $row = [];
            for ($yAxis = 1; $yAxis <= self::Y_AXIS; ++$yAxis) {
                $cell = new Cell($xAxis, $yAxis);
                $cell->setStateRandom();
                $row[$yAxis] = $cell;
            }
            $this->mesh[$xAxis] = $row;
        }
    }

    public function getCellBasedOnNeighbors(Cell $cell)
    {
        $neighborsCount = 0;
        // rules start at 12 by clock
        $neighbors = [
            // x, y - clockwise direction
            // 0.0 - - - - - > x plus direction
            // |
            // |
            // |
            // |
            // v - y plus direction
            [0, -1], [1, -1], [1, 0], [1, 1], [0, 1], [-1, 1], [-1, 0], [-1, -1]
        ];
        $x = 0;
        $y = 1;
        foreach ($neighbors as $neighbor) {
            $xNeighbor = $neighbor[$x] + $cell->getColumnIndex();
            $yNeighbor = $neighbor[$y] + $cell->getRowIndex();
            if (isset($this->getMesh()[$xNeighbor][$yNeighbor])) {
                $neighborCell = $this->getMesh()[$yNeighbor][$xNeighbor];
                if ($neighborCell->isAlive()) {
                    $neighborsCount++;
                }
            }
        }


        if ($cell->isAlive()) {
            // underpopulation
            if ($neighborsCount <= 2) {
                $cell->setStatus(Cell::DEAD);
            }
            // overpopulation
            if($neighborsCount > 3) {
                $cell->setStatus(Cell::DEAD);
            }
            // perfect balance
            if ($neighborsCount == 2 || $neighborsCount == 3) {
                $cell->setStatus(Cell::ALIVE);
            }
        } else { // dead cell with exact 3 neighbors becomes alive
            if ($neighborsCount == 3) {
                $cell->setStatus(Cell::ALIVE);
            }
        }

        return clone $cell;
    }
}