<?php

spl_autoload_register(function ($className) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);

    $pathParts = explode(DIRECTORY_SEPARATOR, $path);
    $pathParts[0] = strtolower($pathParts[0]);
    $path = implode(DIRECTORY_SEPARATOR, $pathParts);

    $filePath = __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';

    if (file_exists($filePath)) {
        require_once $filePath;
        return true;
    }

    $filePathLower = strtolower(dirname($filePath)) . DIRECTORY_SEPARATOR . basename($filePath);
    if (file_exists($filePathLower)) {
        require_once $filePathLower;
        return true;
    }

    return false;
});