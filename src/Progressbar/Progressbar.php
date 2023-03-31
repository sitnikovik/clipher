<?php

namespace Sitnikovik\CliBeatify\Progressbar;

class Progressbar
{
    /**
     * Max value of loader
     *
     * @var int
     */
    private $max;

    /**
     * Counter that be incremented on process
     * @var int
     */
    private $now = 0;

    /**
     * Defines if the bar has been finished
     *
     * @var bool
     */
    private $isFinished = false;

    /**
     * @param int $max
     */
    public function __construct($max)
    {
        $this->max = $max;
    }

    /**
     * Increment progress value
     * @param int $done
     * @return void
     */
    public function advance(int $done = 1): void
    {
        if ($this->isFinished) {
            return;
        }

        $this->now += $done;

        if ($this->now >= $this->max) {
            // if it is out of range on start
            $percent = 100;
            $width = $percent / 2;
            $this->isFinished = true;
            $left = 0;
        } else {
            $percent = floor(($done / $this->max) * 100);
            $width = $percent / 2;
            $left = 100 - $percent;
        }

        fwrite(STDERR, sprintf("\033[0G\033[2K[%'={$width}s>%-{$left}s] - $done/{$percent}%%", "", ""));
    }
}