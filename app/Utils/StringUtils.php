<?php

namespace App\Utils;

class StringUtils
{
    public static function normalize_path($path)
    {
        // Convert backslashes to forward slashes for consistency
        $path = str_replace('\\', '/', $path);

        // Get the realpath for absolute path, ensuring the file exists
        $realPath = realpath($path);

        if ($realPath === false) {
            // If realpath fails, normalize manually for the given OS
            // For Windows, we assume paths with drive letters and convert them
            if (DIRECTORY_SEPARATOR === '\\') {
                $path = str_replace('/', '\\', $path); // Convert backslashes back
            }
            return $path;
        }

        // Replace backslashes with forward slashes for PHPWord
        return str_replace('\\', '/', $realPath);
    }
}
