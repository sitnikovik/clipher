<?php

namespace Sitnikovik\Console\Progressbar;

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
     * @var float
     */
    private $now = 0;

    /**
     * Defines if the bar has been finished
     *
     * @var bool
     */
    private $isFinished = false;

    /**
     * Bar width that placed in output
     *
     * @var int
     */
    private $widthInPixels;

    /**
     * @param int $max
     * @param int $widthInPixels
     */
    public function __construct(int $max, int $widthInPixels = 0 )
    {
        $this->max = $max;
        $this->widthInPixels = $widthInPixels;
    }

    /**
     * Increment progress value
     *
     * @param float|null $done
     * @return void
     */
    public function advance(float $done = 0): void
    {
        if ($this->isFinished) {
            return;
        }

        if (!$done) {
            $done = 1.00;
            $this->now += $done;
        } else {
            $this->now = $done;
        }

        $percentage = $this->calcPercentLeft();

        if ($percentage >= 100) {
            $this->isFinished = true;
        }

        $percentageString = number_format($percentage, 2) . '%';
        $barString = $this->generateBarString($percentage);

        echo sprintf("%s %s/%s \r", $barString, $this->now, $percentageString);
    }

    /**
     * Calculates percentage by provided progress value
     *
     * @return float
     */
    private function calcPercentLeft(): float
    {
        return ($this->now >= $this->max)
            ? 100
            : $this->now / $this->max * 100;
    }

    /**
     * Calculates bar width placed in the output
     *
     * @return int
     */
    private function calcBarWidth(): int
    {
        if ($this->widthInPixels > 0) {
            return $this->widthInPixels;
        }

        return (int)shell_exec("tput cols") - 8;
    }

    /**
     * Returns progress string based on the percentage
     *
     * @param float $percentage
     * @return string
     */
    private function generateBarString(float $percentage): string
    {
        $barWidth = $this->calcBarWidth();

        $numBars = round(($percentage) / 100 * ($barWidth));
        $numEmptyBars = $barWidth - $numBars;

        return sprintf('[%s%s]', str_repeat("=", ($numBars)) , str_repeat(" ", ($numEmptyBars)));
    }

    /**
     * Beatifies the percentage value for output placed near the bars
     *
     * @param float $percentage
     * @return string
     */
    private function preparePercentageForOutput(float $percentage): string
    {
        $percentageString = number_format($percentage, 2) . '%';

        return str_pad($percentageString,7," ",STR_PAD_LEFT);
    }
}