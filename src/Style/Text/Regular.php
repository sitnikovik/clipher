<?php

namespace Sitnikovik\Console\Style\Text;

use Sitnikovik\Console\Style\AbstractStyle;

class Regular extends AbstractStyle
{
    /**
     * @inheritdoc
     * @override
     */
    protected const COLORS = [
        self::BLACK_KEY => "\033[0;30m",
        self::RED_KEY => "\033[0;31m",
        self::GREEN_KEY => "\033[0;32m",
        self::YELLOW_KEY => "\033[0;33m",
        self::BLUE_KEY => "\033[0;34m",
        self::PURPLE_KEY => "\033[0;35m",
        self::CYAN_KEY => "\033[0;36m",
        self::WHITE_KEY => "\033[0;37m"
    ];
}