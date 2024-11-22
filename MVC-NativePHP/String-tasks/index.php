<?php

declare(strict_types=1);

//region Task 1
function cleanString(string $str): string
{
    $str = trim($str);
    $str = str_replace(["\n", "\r", "\t"], '', $str);
    $str = preg_replace('/\s+/', ' ', $str);
    return $str;
}

echo "Task 1: Clean String\n";
$examples = [
    "  Hello   World!  ",
    "\n\nNew Line\tTest\t",
    "    Excessive   spaces    "
];
foreach ($examples as $example) {
    echo "Original: '$example'\n";
    echo "Cleaned: '" . cleanString($example) . "'\n";
}
echo PHP_EOL;
//endregion

//region Task 2
function replaceSubstring(string $haystack, string $needle, string $replacement): string
{
    return str_replace($needle, $replacement, $haystack);
}

echo "Task 2: Replace Substring\n";
$text = "Hello world! Hello everyone!";
echo replaceSubstring($text, "Hello", "Hi") . "\n\n";
//endregion

//region Task 3
function extractEmails(string $text): array
{
    preg_match_all('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $text, $matches);
    return $matches[0];
}

echo "Task 3: Extract Emails\n";
$sampleText = "Contact us at test@example.com or support@domain.org.";
print_r(extractEmails($sampleText));
echo PHP_EOL;
//endregion

//region Task 4
function convertDateFormat(string $date, string $fromFormat, string $toFormat): string
{
    $timestamp = DateTime::createFromFormat($fromFormat, $date)->getTimestamp();
    return date($toFormat, $timestamp);
}

echo "Task 4: Date Format Conversion\n";
echo convertDateFormat("22.11.2024", "d.m.Y", "Y-m-d") . "\n\n";
//endregion

//region Task 5
function encryptString(string $str): string
{
    return base64_encode($str);
}

function decryptString(string $str): string
{
    return base64_decode($str);
}

echo "Task 5: Encryption and Decryption\n";
$original = "Secure Data";
$encrypted = encryptString($original);
echo "Encrypted: $encrypted\n";
echo "Decrypted: " . decryptString($encrypted) . "\n\n";
//endregion

//region Task 6
function compareStrings(string $str1, string $str2): int
{
    return strcasecmp($str1, $str2);
}

echo "Task 6: Compare Strings\n";
echo compareStrings("abc", "ABC") . "\n";

function sortStrings(array &$arr, bool $ascending = true): void
{
    usort($arr, fn($a, $b) => $ascending ? strcmp($a, $b) : strcmp($b, $a));
}

$strings = ["Banana", "apple", "Orange"];
sortStrings($strings);
print_r($strings);
//endregion

//region Task 7
function stripHtmlTags(string $html): string
{
    return preg_replace('/<[^>]+>/', '', $html);
}

function extractLinks(string $html): array
{
    preg_match_all('/<a[^>]+href="([^"]+)"/', $html, $matches);
    return $matches[1];
}

echo "Task 7: HTML String Processing\n";
$html = '<p>Hello <a href="https://example.com">world</a>!</p>';
echo stripHtmlTags($html) . "\n";
print_r(extractLinks($html));
echo PHP_EOL;
//endregion

//region Task 8
function countWords(string $text): int
{
    return str_word_count($text);
}

function removeDuplicateWords(string $text): string
{
    $words = explode(' ', $text);
    $uniqueWords = array_unique($words);
    return implode(' ', $uniqueWords);
}

echo "Task 8: Text Processing\n";
$text = "hello world hello universe";
echo "Word count: " . countWords($text) . "\n";
echo "Without duplicates: " . removeDuplicateWords($text) . "\n\n";
//endregion

//region Task 9
function isAnagram(string $word1, string $word2): bool
{
    $arr1 = str_split(strtolower($word1));
    $arr2 = str_split(strtolower($word2));
    sort($arr1);
    sort($arr2);
    return $arr1 === $arr2;
}

function isPalindrome(string $word): bool
{
    $cleaned = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $word));
    return $cleaned === strrev($cleaned);
}

echo "Task 9: String Algorithms\n";
echo "Anagram: " . (isAnagram("listen", "silent") ? "Yes" : "No") . "\n";
echo "Palindrome: " . (isPalindrome("Madam") ? "Yes" : "No") . "\n";
//endregion