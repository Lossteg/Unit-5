<?php

declare(strict_types=1);

//region Task 1: Оптимизация регулярного выражения для поиска строк с заданным количеством слов
function findStringsWithWordCount(string $text, int $wordCount): array
{
    // Упрощенное регулярное выражение с учетом пробелов между словами
    // \s+ для учета любых пробелов и \b для четкого разделения слов
    $pattern = sprintf('/(?:\b\w+\b\s*){%d}/u', $wordCount);
    preg_match_all($pattern, $text, $matches);
    return $matches[0];
}

echo "Task 1: Find Strings With Specific Word Count\n";
$text = "This is a simple test. Another test string. Short one.";
$wordCount = 3;
print_r(findStringsWithWordCount($text, $wordCount));
echo PHP_EOL;
//endregion

//region Task 2: Оптимизация кода для генерации HTML-ссылок
function generateHTMLLinks(array $urls): string
{
    // implode для сборки строк вместо конкатенации в цикле
    return implode(
            PHP_EOL,
            array_map(fn($url) => sprintf(
                '<a href="%s">%s</a>',
                htmlspecialchars($url),
                htmlspecialchars($url)
            ), $urls)
        ) . PHP_EOL;
}

echo "Task 2: Generate HTML Links\n";
$urls = ["https://example.com", "http://test.org", "https://openai.com"];
echo generateHTMLLinks($urls);
echo PHP_EOL;
//endregion
