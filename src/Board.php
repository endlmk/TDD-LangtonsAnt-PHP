<?php declare(strict_types=1);
final class Board
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function print()
    {
        $row = str_repeat('-', $this->x);
        $array = [];
        for($i = 0; $i < $this->y; ++$i)
        {
            array_push($array, $row);
        }

        return implode(PHP_EOL, $array);
    }
}