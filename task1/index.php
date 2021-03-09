<?php

$dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(dirname('../task1')), FALSE);

foreach ($dir as $file) {
    echo '<pre>';
    echo $file;
}