<?php

namespace Sitnikovik\CliBeatify;

use Sitnikovik\CliBeatify\Progressbar\Progressbar;
use Sitnikovik\CliBeatify\Style\Background;
use Sitnikovik\CliBeatify\Style\StyleInterface;
use Sitnikovik\CliBeatify\Style\Text\Regular;

class Console implements StyleInterface
{

    /**
     * @var StyleInterface
     */
    protected $textStyle;

    /**
     * @var StyleInterface
     */
    protected $bgStyle;

    /**
     * @param StyleInterface|null $textStyle
     * @param StyleInterface|null $bgStyle
     */
    public function __construct(?StyleInterface $textStyle = null, ?StyleInterface $bgStyle = null)
    {
        $this->textStyle = $textStyle ?? new Regular();
        $this->bgStyle = $bgStyle ?? new Background();
    }

    /**
     * @return StyleInterface|Regular
     */
    public function getTextStyle()
    {
        return $this->textStyle;
    }

    /**
     * @param StyleInterface|Regular $textStyle
     * @return $this
     */
    public function setTextStyle($textStyle): self
    {
        $this->textStyle = $textStyle;

        return $this;
    }

    /**
     * @return Background|StyleInterface
     */
    public function getBgStyle()
    {
        return $this->bgStyle;
    }

    /**
     * @param Background|StyleInterface $bgStyle
     * @return $this
     */
    public function setBgStyle($bgStyle): self
    {
        $this->bgStyle = $bgStyle;

        return $this;
    }

    /**
     * Prints text in new line
     *
     * @param $text
     * @return void
     */
    public static function println(string $text = ''): void
    {
        echo $text . PHP_EOL;
    }

    /**
     * @inheritdoc
     */
    public function black(string $text): string
    {
        return $this->textStyle->black($text);
    }

    /**
     * @inheritdoc
     */
    public function red(string $text): string
    {
        return $this->textStyle->red($text);
    }

    /**
     * @inheritdoc
     */
    public function green(string $text): string
    {
        return $this->textStyle->green($text);
    }

    /**
     * @inheritdoc
     */
    public function yellow(string $text): string
    {
        return $this->textStyle->yellow($text);
    }

    /**
     * @inheritdoc
     */
    public function blue(string $text): string
    {
        return $this->textStyle->blue($text);
    }

    /**
     * @inheritdoc
     */
    public function purple(string $text): string
    {
        return $this->textStyle->purple($text);
    }

    /**
     * @inheritdoc
     */
    public function cyan(string $text): string
    {
        return $this->textStyle->cyan($text);
    }

    /**
     * @inheritdoc
     */
    public function white(string $text): string
    {
        return $this->textStyle->white($text);
    }

    /**
     * Creates and returns progressbar object
     *
     * @param int $max
     * @param int $barWidth Provide `0` to stretch the bar
     * @return Progressbar
     */
    public static function createProgressbar(int $max, int $barWidth = 50): Progressbar
    {
        return new Progressbar($max, $barWidth);
    }


    /**
     * Prints separate line
     *
     * @return void
     */
    public static function separate(): void
    {
        echo PHP_EOL;
        for ($i = 0; $i < 58; $i++) {
            echo '=';
        }
        echo PHP_EOL;
    }

    /**
     * Success quit from program
     *
     * @param string $message
     * @return void
     */
    public static function quit(string $message = ''): void
    {
        if (!empty($message)) {
            self::println($message);
        }

        exit(0);
    }

    /**
     * Quit on program failed and print message with red background
     *
     * @param string $message
     * @param int $code
     * @return void
     */
    public function panic(string $message = '', int $code = 1): void
    {
        if (!empty($message)) {
            self::println($this->getBgStyle()->red($message));
        }

        exit($code);
    }

    /**
     * Returns the string value answer for the provided question from input
     *
     * @param $question
     * @return string
     */
    public static function prompt(string $question): string
    {
        return (string)readline(sprintf('%s: ', $question));
    }

    /**
     * Prints question to be confirmed with [y/n]
     *
     * @param $question
     * @param $yesOnDefault
     * @return bool
     */
    public static function confirm(string $question, bool $yesOnDefault = false): bool
    {
        $answer = readline(sprintf('%s [%s]: ', $question, (!$yesOnDefault) ? 'y/N' : 'Y/n'));

        $approved = in_array(strtolower($answer), ['y', 'yes']);

        return ($yesOnDefault) ? empty($answer) || $approved : $approved;
    }
}