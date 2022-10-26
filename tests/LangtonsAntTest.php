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
}