<?php


namespace Test\Kyzlaitis;


class Cell
{
    private int $row;
    private int $column;
    private bool $isAlive = false;
    public const ALIVE = 1;
    public const DEAD = 0;

    public function __construct(int $row, int $column)
    {
        $this->row = $row;
        $this->column = $column;
    }

    public function setStatus(int $status): void
    {
        $this->isAlive = match ($status) {
            self::ALIVE => $this->isAlive = true,
            default => $this->isAlive = false
        };
    }

    public function isAlive(): bool
    {
        return $this->isAlive;
    }

    public function setStateRandom(): void
    {
        $this->isAlive = (bool) rand(self::DEAD, self::ALIVE);
    }

    public function getRowIndex(): int
    {
        return $this->row;
    }

    public function getColumnIndex(): int
    {
        return $this->column;
    }
}