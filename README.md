# Console
Beatifies your cli scripts with colors, bolds, loading bars and much more

- [Input](#input)
    - [confirm](#confirm)
    - [prompt](#prompt)
- [Output](#output)
  - [println](#println)
  - [separate](#separate)
  - [quit](#quit)
  - [panic](#panic)
  - [Colors](#colors)
  - [Progressbar](#progress-bar)


## Get started
Just create an object of `Sitnikovik\Console\Console` and go on:
```php
$console = new \Sitnikovik\Console\Console();
```

## Input

### confirm
```php
\Sitnikovik\Console\Console::confirm(string $question, bool $yesOnDefault = false): void
```
Make user approve or decline some process with the `y/n`

### prompt
```php
\Sitnikovik\Console\Console::prompt(string $question): string
```
Asks user input the answer needed to continue the program


## Output

### println
```php
\Sitnikovik\Console\Console::println(string $text): void
```
Prints the text console output with new line

### separate
```php
\Sitnikovik\Console\Console::separate(int $width = 0): void
```
Prints a separate bar with provided width or stretched if width is `0`

### quit
```php
\Sitnikovik\Console\Console::quit(string $message = '')
```
Exit the program with `0` code and prints message text if not empty

### panic
```php
\Sitnikovik\Console\Console::panic(string $message = '', int $code = 1)
```
Exit the program with provided code signalizing the program failed and prints message in red color if not empty

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
### Customize style colors
Eitherway, you can create custom classes extended by `Sitnikovik\Console\Style\AbstractStyle` 
or others implemented `Sitnikovik\Console\Style\StyleInterface` and modify colors you prefer.

### Colorize text
There are at least **8 methods** to colorize text implemented by `Sitnikovik\Console\Style\AbstractStyle` 
and `Sitnikovik\Console\Style\StyleInterface`. Class calls the interface methods:
- black()
- red()
- green()
- yellow()
- blue()
- purple()
- cyan()
- white()

```php
$text = $console->red('some text'); // colorize text
// or
$text = $console->bgRed('some text'); // set background to text
```
They return provided text colorized to called color.

## Progress bar
If you need to visualize some process progress you can use `Sitnikovik\Console\Progressbar\Progressbar`
```php
// Create the bar like that
$maxValue = 100;
$progressbar = $console::createProgressbar($maxValue);
// or 
$progressbar = Sitnikovik\Console\Progressbar\Progressbar($maxValue);

// Advancing
for ($current = 0; $current < $maxValue; $current++) {
    $progressbar->advance(); // increment with 1 point of the max value
}

// Or advance it manually
$progressbar->advance(40); // or another value
```

