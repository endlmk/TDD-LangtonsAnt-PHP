<?php declare(strict_types=1);
final class Board
{
    private int $x;
    private int $y;
    private int $ant_x = 0;
    private int $ant_y = 0;
    private int $ant_direction_x = 0;
    private int $ant_direction_y = 0;
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

    private function get_ant_position_cell()
    {
        if(!$this->is_ant_set())
        {
            return;
        }
        return $this->board[$this->ant_y - 1][$this->ant_x - 1];
    }

    private function set_ant_position(&$board, $char)
    {        
        if(!$this->is_ant_set())
        {
            return;
        }
        $board[$this->ant_y - 1][$this->ant_x - 1] = $char;
    }
    public function move_ant()
    {
        if($this->get_ant_position_cell() == '-')
        {
            $this->set_ant_position($this->board, '*');

            $prev_dir_x = $this->ant_direction_x;
            $prev_dir_y = $this->ant_direction_y;
            $this->ant_direction_x = -$prev_dir_y;
            $this->ant_direction_y = $prev_dir_x;
        }
        else if($this->get_ant_position_cell() == '*')
        {
            $this->set_ant_position($this->board, '-');

            $prev_dir_x = $this->ant_direction_x;
            $prev_dir_y = $this->ant_direction_y;
            $this->ant_direction_x = $prev_dir_y;
            $this->ant_direction_y = -$prev_dir_x;
        }
        $this->ant_x += $this->ant_direction_x;
        $this->ant_y += $this->ant_direction_y;
    }

    public function print()
    {
        $board_for_print = $this->board;
        $this->set_ant_position($board_for_print, 'a');
        return implode(PHP_EOL, $board_for_print);
    }
}