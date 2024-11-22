<?php

declare(strict_types=1);

//region Task 1: Проверка на действительный email-адрес
function isValidEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

echo "Task 1: Valid Email Check\n";
$emails = ["test@example.com", "invalid-email@", "another@test.org"];
foreach ($emails as $email) {
    echo "$email is " . (isValidEmail($email) ? "valid" : "invalid") . "\n";
}
echo PHP_EOL;
//endregion

//region Task 2: Поиск строк, начинающихся с заглавной буквы
function findStringsStartingWithCapital(string $text): array
{
    preg_match_all('/\b[A-Z][a-z]*\b/', $text, $matches);
    return $matches[0];
}

echo "Task 2: Strings Starting With Capital Letter\n";
$text = "Hello world! This is a Test of Strings.";
print_r(findStringsStartingWithCapital($text));
echo PHP_EOL;
//endregion

//region Task 3: Извлечение группы слов, разделенных запятыми
function extractCommaSeparatedWords(string $text): array
{
    preg_match('/\b([^,]+(?:,[^,]+)*)\b/', $text, $matches);
    return $matches ? explode(',', $matches[1]) : [];
}

echo "Task 3: Extract Comma-Separated Words\n";
$text = "apple,banana,cherry,grape";
print_r(extractCommaSeparatedWords($text));
echo PHP_EOL;
//endregion

//region Task 4: Преобразование номера телефона
function formatPhoneNumber(string $phone): string
{
    $digits = preg_replace('/\D/', '', $phone);
    if (strlen($digits) === 11 && $digits[0] === '7') {
        return sprintf(
            "+7 (%s) %s-%s",
            substr($digits, 1, 3),
            substr($digits, 4, 3),
            substr($digits, 7, 4)
        );
    }
    return "Invalid phone number format.";
}

echo "Task 4: Phone Number Formatting\n";
$phone = "79123456789";
echo formatPhoneNumber($phone) . "\n";
echo PHP_EOL;
//endregion

//region Task 5: Проверка надежности пароля
function isStrongPassword(string $password): bool
{
    return (bool)preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password);
}

echo "Task 5: Strong Password Check\n";
$passwords = ["Passw0rd!", "weakpass", "Str0ng_P@ss"];
foreach ($passwords as $password) {
    echo "$password is " . (isStrongPassword($password) ? "strong" : "weak") . "\n";
}
echo PHP_EOL;
//endregion


//region Task 6: Проверка формата IP-адреса
function isValidIPAddress(string $ip): bool
{
    return filter_var($ip, FILTER_VALIDATE_IP) !== false;
}

echo "Task 6: IP Address Validation\n";
$ips = ["192.168.0.1", "256.256.256.256", "127.0.0.1"];
foreach ($ips as $ip) {
    echo "$ip is " . (isValidIPAddress($ip) ? "valid" : "invalid") . "\n";
}
echo PHP_EOL;
//endregion

//region Task 7: Поиск и замена слов-ошибок
function correctTextErrors(string $text, array $corrections): string
{
    foreach ($corrections as $wrong => $correct) {
        $text = str_replace($wrong, $correct, $text);
    }
    return $text;
}

echo "Task 7: Correcting Text Errors\n";
$text = "Thsi is a smaple text with erros.";
$corrections = [
    "Thsi" => "This",
    "smaple" => "sample",
    "erros" => "errors"
];
echo correctTextErrors($text, $corrections) . "\n";
//endregion
