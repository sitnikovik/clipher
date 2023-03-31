<?php

namespace Sitnikovik\CliBeatify;

use Sitnikovik\CliBeatify\Argument\Argument;
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
     * Command description
     *
     * @var string
     */
    private $description = '';

    /**
     * Help information
     *
     * @var string
     */
    private $help = '';

    /**
     * Command arguments
     *
     * @var Argument[]
     */
    private $arguments = [];

    /**
     * Command options
     *
     *
     * @var array
     */
    private $options = [];

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
     * @param string $alias
     * @param string $description
     * @return $this
     */
    public function requireArgument(string $alias, string $description = ''): self
    {
        $this->arguments[$alias] = new Argument(
            count($this->arguments) + 1,
            $alias,
            true,
            $description
        );

        return $this;
    }

    /**
     * @param string $alias
     * @param string $description
     * @return $this
     */
    public function handleArgument(string $alias, string $description = ''): self
    {
        $this->arguments[$alias] = new Argument(
            count($this->arguments) + 1,
            $alias,
            false,
            $description
        );

        return $this;
    }

    /**
     * Returns command description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Sets command description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Returns command help information how to use
     *
     * @return string
     */
    public function getHelp(): string
    {
        return $this->help;
    }

    /**
     * Sets help information
     *
     * @param string $help
     * @return $this
     */
    public function setHelp(string $help): self
    {
        $this->help = $help;

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
     * @return Progressbar
     */
    public static function createProgressbar(int $max): Progressbar
    {
        return new Progressbar($max);
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