# Console
Beatifies your cli scripts with colors, bolds, loading bars and much more

## Get started
Just create an object of `Sitnikovik\Console\Console` and go on:
```php
$console = new \Sitnikovik\Console\Console();
```
Now you can colorize, prompt, confirm or visualize progress bars it the terminal.


## Colors
If you want to switch color styles you have to provide `Sitnikovik\Console\Style\StyleInterface` 
classes for text and background layout to colorize the output.
```php
// set colors
$console->setTextStyle(new Sitnikovik\Console\Style\Text\Bold());
$console->setBackgroundStyle(new Sitnikovik\Console\Style\Background());

// or via constructor
$console = new Console(new Sitnikovik\Console\Style\Text\Regular(), new Sitnikovik\Console\Style\Background());
```
Eitherway, you can create custom classes extended by `Sitnikovik\Console\Style\AbstractStyle` 
or others implemented `Sitnikovik\Console\Style\StyleInterface` and modify colors you prefer.