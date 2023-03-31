<?php

use Sitnikovik\CliBeatify\Console;

require_once __DIR__ . '/vendor/autoload.php';


$cli = new Console();

$progressbar = $cli::createProgressbar(100);
$progressbar->advance(1200);


Console::println();

Console::println(123);
exit();


$text = $cli->getTextStyle()->cyan('asdadsad');

Console::println($text);
