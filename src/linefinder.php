<?php

/*
 * This function was generated using ChatGPT 4o
*/
function getAllFiles($dir) {
    $files = [];

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS)
    );

    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $files[] = $file->getPathname();
        }
    }

    return $files;
}

/*
 * This function was generated using ChatGPT 4o
*/
function getLinesInFile($filename) {
    $lineCount = 0;
    $handle = fopen($filename, "r");

    if ($handle) {
        while (fgets($handle) !== false) {
            $lineCount++;
        }
        fclose($handle);
    }
    return $lineCount;
}

function getDirectoryArgument() {
    // is set argument1 then use argument1 or else use '.'
    $directory = isset($argv[1]) ? $argv[1] : '.';
    return $directory;
}

function main() {
    $totalLines = 0;

    $directory = getDirectoryArgument();
    $files = getAllFiles($directory);
    foreach ($files as $file) {
        $lines = getLinesInFile($file);
        $totalLines = $totalLines + $lines;
    }
    echo "Total Lines: " . $totalLines . "\n";
}

main();
?>
