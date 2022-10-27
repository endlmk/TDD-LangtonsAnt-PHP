<?php declare(strict_types=1);
final class Board
{
    private int $x;
    private int $y;
    private int $ant_x = 0;
    private int $ant_y = 0;
    private int $ant_direction_x;
    private int $ant_direction_y;
    private array $board = [];

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;

        $row = str_repeat('-', $this->x);
        for($i = 0; $i < $this->y; ++$i)
        {
            array_push($this->board, $row);
        }
    }

    public function set_ant(int $x, int $y)
    {
        $this->ant_x = $x;
        $this->ant_y = $y;
        $this->ant_direction_x = -1;
        $this->ant_direction_y = 0;
    }

    private function is_ant_set()
    {
        return $this->ant_x > 0 && $this->ant_y > 0;
    }

    public function move_ant()
    {
        if(!$this->is_ant_set())
        {
            return;
        }

        if($this->board[$this->ant_y - 1][$this->ant_x - 1] == '-')
        {
            $this->board[$this->ant_y - 1][$this->ant_x - 1] = '*';

            $prev_dir_x = $this->ant_direction_x;
            $prev_dir_y = $this->ant_direction_y;
            $this->ant_direction_x = -$prev_dir_y;
            $this->ant_direction_y = $prev_dir_x;
            $this->ant_x += $this->ant_direction_x;
            $this->ant_y += $this->ant_direction_y;
        }
    }

    public function print()
    {
        $board_for_print = $this->board;

        if($this->is_ant_set())
        {
            $board_for_print[$this->ant_y - 1][$this->ant_x - 1] = 'a';
        }

        return implode(PHP_EOL, $board_for_print);
    }
}