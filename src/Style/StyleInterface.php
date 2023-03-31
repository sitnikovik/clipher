<?php

namespace Sitnikovik\Console\Style;

interface StyleInterface
{
    /**
     * Colorizes text to black
     *
     * @param string $text
     * @return string
     */
    public function black(string $text): string;

    /**
     * Colorizes text to red
     *
     * @param string $text
     * @return string
     */
    public function red(string $text): string;

    /**
     * Colorizes text to green
     *
     * @param string $text
     * @return string
     */
    public function green(string $text): string;

    /**
     * Colorizes text to yellow
     *
     * @param string $text
     * @return string
     */
    public function yellow(string $text): string;

    /**
     * Colorizes text to blue
     *
     * @param string $text
     * @return string
     */
    public function blue(string $text): string;

    /**
     * Colorizes text to purple
     *
     * @param string $text
     * @return string
     */
    public function purple(string $text): string;

    /**
     * Colorizes text to cyan
     *
     * @param string $text
     * @return string
     */
    public function cyan(string $text): string;

    /**
     * Colorizes text to white
     *
     * @param string $text
     * @return string
     */
    public function white(string $text): string;
}