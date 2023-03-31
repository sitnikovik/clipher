<?php

namespace Sitnikovik\CliBeatify\Style;

class Background extends AbstractStyle
{
    /**
     * @inheritdoc
     * @override
     */
    protected const COLORS = [
        self::BLACK_KEY => "\033[40m",
        self::RED_KEY => "\033[41m",
        self::GREEN_KEY => "\033[42m",
        self::YELLOW_KEY => "\033[43m",
        self::BLUE_KEY => "\033[44m",
        self::PURPLE_KEY => "\033[45m",
        self::CYAN_KEY => "\033[46m",
        self::WHITE_KEY => "\033[47m"
    ];
}