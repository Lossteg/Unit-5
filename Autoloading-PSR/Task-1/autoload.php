<?php

spl_autoload_register(function ($className) {
    $fileName = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    if (file_exists($fileName)) {
      require $fileName;
    }
});
