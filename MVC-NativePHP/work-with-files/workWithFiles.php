<?php

declare(strict_types=1);

//region Task 3.1: Анализ логов — Извлечение информации об ошибках
function extractErrorLogs(string $logFilePath): array
{
    $errors = [];
    if (!file_exists($logFilePath)) {
        return $errors;
    }

    $lines = file($logFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (stripos($line, 'error') !== false) {
            $errors[] = $line;
        }
    }
    return $errors;
}

echo "Task 3.1: Log Analysis - Extract Errors\n";
$logFilePath = "server.log";
print_r(extractErrorLogs($logFilePath));
echo PHP_EOL;
//endregion

//region Task 3.2: Анализ логов — Подсчет запросов за определенный период
function countRequestsInPeriod(string $logFilePath, string $startTime, string $endTime): int
{
    if (!file_exists($logFilePath)) {
        return 0;
    }

    $count = 0;
    $lines = file($logFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (preg_match('/\[(.*?)\]/', $line, $matches)) {
            $timestamp = strtotime($matches[1]);
            if ($timestamp >= strtotime($startTime) && $timestamp <= strtotime($endTime)) {
                $count++;
            }
        }
    }
    return $count;
}

echo "Task 3.2: Log Analysis - Count Requests\n";
$startTime = "2024-11-01 00:00:00";
$endTime = "2024-11-01 23:59:59";
echo "Requests between $startTime and $endTime: " . countRequestsInPeriod($logFilePath, $startTime, $endTime) . "\n";
echo PHP_EOL;
//endregion

//region Task 3.3: Обработка CSV-файлов — Извлечение и обработка данных
function extractAndProcessCSV(string $csvFilePath): array
{
    $data = [];
    if (!file_exists($csvFilePath)) {
        return $data;
    }

    if (($handle = fopen($csvFilePath, "r")) !== false) {
        $headers = fgetcsv($handle);
        while (($row = fgetcsv($handle)) !== false) {
            $data[] = array_combine($headers, $row);
        }
        fclose($handle);
    }
    return $data;
}

echo "Task 3.3: CSV File Processing - Extract Data\n";
$csvFilePath = "data.csv";
print_r(extractAndProcessCSV($csvFilePath));
echo PHP_EOL;
//endregion

//region Task 3.4: Обработка CSV-файлов — Обновление значений
function updateCSVValues(string $csvFilePath, callable $updateCallback): void
{
    if (!file_exists($csvFilePath)) {
        return;
    }

    $data = [];
    if (($handle = fopen($csvFilePath, "r")) !== false) {
        $headers = fgetcsv($handle);
        while (($row = fgetcsv($handle)) !== false) {
            $rowData = array_combine($headers, $row);
            $data[] = $updateCallback($rowData);
        }
        fclose($handle);
    }

    if (($handle = fopen($csvFilePath, "w")) !== false) {
        fputcsv($handle, $headers);
        foreach ($data as $row) {
            fputcsv($handle, $row);
        }
        fclose($handle);
    }
}

echo "Task 3.4: CSV File Processing - Update Values\n";
$updateCallback = function (array $row): array {
    if (isset($row['Status']) && $row['Status'] === 'Pending') {
        $row['Status'] = 'Completed';
    }
    return $row;
};
updateCSVValues($csvFilePath, $updateCallback);
echo "CSV file updated.\n";
//endregion
