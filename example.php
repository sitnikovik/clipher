<?php

use Sitnikovik\CliBeatify\Console;

require_once __DIR__ . '/vendor/autoload.php';

$cli = new Console();
$progressbar = $cli::createProgressbar(1565);
for ($i=0; $i < 1565; $i++)
{
    $progressbar->advance();
    usleep(1000);
}

Console::println();
