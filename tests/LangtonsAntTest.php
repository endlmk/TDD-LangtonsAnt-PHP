<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use SebastianBergmann\Environment\Console;

use function PHPUnit\Framework\assertEquals;

final class LangtonsAntTest extends TestCase
{
    public function testCanPrintGrid(): void
    {
        $board = new Board(5, 6);
        $result = <<<EOS
        -----
        -----
        -----
        -----
        -----
        -----
        EOS;

        assertEquals($result, $board->print());
    }

    public function testCanPrintInitialAnt(): void
    {
        $board = new Board(5, 6);
        $board->set_ant(3, 3);
        $result = <<<EOS
        -----
        -----
        --a--
        -----
        -----
        -----
        EOS;

        assertEquals($result, $board->print());
    }

    public function testCanPrintAntFirstMove(): void
    {
        $board = new Board(5, 6);
        $board->set_ant(3, 3);
        $board->move_ant();
        $result = <<<EOS
        -----
        --a--
        --*--
        -----
        -----
        -----
        EOS;

        assertEquals($result, $board->print());
    }
    
    public function testCanPrintAntSecondMove(): void
    {
        $board = new Board(5, 6);
        $board->set_ant(3, 3);
        $board->move_ant();
        $board->move_ant();

        $result = <<<EOS
        -----
        --*a-
        --*--
        -----
        -----
        -----
        EOS;

        assertEquals($result, $board->print());
    }

    public function testCanPrintAntThirdMove(): void
    {
        $board = new Board(5, 6);
        $board->set_ant(3, 3);
        $board->move_ant();
        $board->move_ant();
        $board->move_ant();

        $result = <<<EOS
        -----
        --**-
        --*a-
        -----
        -----
        -----
        EOS;

        assertEquals($result, $board->print());
    }

    public function testCanPrintAntFourthMove(): void
    {
        $board = new Board(5, 6);
        $board->set_ant(3, 3);
        $board->move_ant();
        $board->move_ant();
        $board->move_ant();
        $board->move_ant();

        $result = <<<EOS
        -----
        --**-
        --a*-
        -----
        -----
        -----
        EOS;

        assertEquals($result, $board->print());
    }

    public function testCanPrintAntFifthMove(): void
    {
        $board = new Board(5, 6);
        $board->set_ant(3, 3);
        $board->move_ant();
        $board->move_ant();
        $board->move_ant();
        $board->move_ant();
        $board->move_ant();

        $result = <<<EOS
        -----
        --**-
        ---*-
        --a--
        -----
        -----
        EOS;

        assertEquals($result, $board->print());
    }

    public function testCanPrintAntSixthMove(): void
    {
        $board = new Board(5, 6);
        $board->set_ant(3, 3);
        $board->move_ant();
        $board->move_ant();
        $board->move_ant();
        $board->move_ant();
        $board->move_ant();
        $board->move_ant();

        $result = <<<EOS
        -----
        --**-
        ---*-
        -a*--
        -----
        -----
        EOS;

        assertEquals($result, $board->print());
    }

    public function testCanPrintAntOutOfBound(): void
    {
        $board = new Board(5, 6);
        $board->set_ant(3, 3);
        for($i = 0; $i < 26; $i++)
        {
            $board->move_ant();
        }
            
        $result = <<<EOS
        -----
        --**-
        -*---
        a*-**
        --**-
        ---**
        EOS;

        assertEquals($result, $board->print());
    }
}