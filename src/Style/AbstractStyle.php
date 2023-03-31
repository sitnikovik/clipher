<?php

namespace Sitnikovik\CliBeatify\Style;

abstract class AbstractStyle implements StyleInterface
{
    /**
     * Colors to print
     */
    protected const COLORS = [];

    /**
     * To reset formatting
     */
    protected const RESET = "\033[0m";

    protected const BLACK_KEY = "black";

    protected const RED_KEY = "red";

    protected const GREEN_KEY = "green";

    protected const YELLOW_KEY = "yellow";

    protected const BLUE_KEY = "blue";

    protected const PURPLE_KEY = "purple";

    protected const CYAN_KEY = "cyan";

    protected const WHITE_KEY = "white";

    /**
     * @inheritdoc
     */
    public function black(string $text): string
    {
        return self::colorize($text, static::COLORS[self::BLACK_KEY] ?? '');
    }

    public function red(string $text): string
    {
        return self::colorize($text, static::COLORS[self::RED_KEY] ?? '');
    }

    public function green(string $text): string
    {
        return self::colorize($text, static::COLORS[self::GREEN_KEY] ?? '');
    }

    public function yellow(string $text): string
    {
        return self::colorize($text, static::COLORS[self::YELLOW_KEY] ?? '');
    }

    public function blue(string $text): string
    {
        return self::colorize($text, static::COLORS[self::BLUE_KEY] ?? '');
    }

    public function purple(string $text): string
    {
        return self::colorize($text, static::COLORS[self::PURPLE_KEY] ?? '');
    }

    public function cyan(string $text): string
    {
        return self::colorize($text, static::COLORS[self::CYAN_KEY] ?? '');
    }

    public function white(string $text): string
    {
        return self::colorize($text, static::COLORS[self::WHITE_KEY] ?? '');
    }


    /**
     * Colorizes text in provided color cli code
     *
     * @param $text
     * @param $color
     * @return string
     */
    protected static function colorize($text, $color)
    {
        return $color . $text . self::RESET;
    }
}