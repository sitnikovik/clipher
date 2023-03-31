<?php

namespace Sitnikovik\CliBeatify\Style\Text;

use Sitnikovik\CliBeatify\Style\AbstractStyle;

class Underlined extends AbstractStyle
{
    /**
     * @inheritdoc
     * @override
     */
    protected const COLORS = [
        self::BLACK_KEY => "\033[4;30m",
        self::RED_KEY => "\033[4;31m",
        self::GREEN_KEY => "\033[4;32m",
        self::YELLOW_KEY => "\033[4;33m",
        self::BLUE_KEY => "\033[4;34m",
        self::PURPLE_KEY => "\033[4;35m",
        self::CYAN_KEY => "\033[4;36m",
        self::WHITE_KEY => "\033[4;37m"
    ];
}