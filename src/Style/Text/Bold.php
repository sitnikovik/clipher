<?php

namespace Sitnikovik\CliBeatify\Style\Text;

use Sitnikovik\CliBeatify\Style\AbstractStyle;

class Bold extends AbstractStyle
{
    /**
     * @inheritdoc
     * @override
     */
    protected const COLORS = [
        self::BLACK_KEY => "\033[1;30m",
        self::RED_KEY => "\033[1;31m",
        self::GREEN_KEY => "\033[1;32m",
        self::YELLOW_KEY => "\033[1;33m",
        self::BLUE_KEY => "\033[1;34m",
        self::PURPLE_KEY => "\033[1;35m",
        self::CYAN_KEY => "\033[1;36m",
        self::WHITE_KEY => "\033[1;37m"
    ];
}