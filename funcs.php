<?php

function writeFile()
{
    $text = $_POST['text'] ?? '';

    $text = !empty($_POST['text']) ? trim($_POST['text']) : '';

    if (empty($text)) {
        $_SESSION['errors'] = 'Введите ваше сообщение!';
        return false;
    }

    if (!empty($text)) {
        $datetime = date(DATE_ATOM);
        $isWrote = file_put_contents(__DIR__ . '/text.txt', $datetime . PHP_EOL . $text . PHP_EOL . PHP_EOL, FILE_APPEND) !== false;
        if ($isWrote === false) {
            $_SESSION['errors'] = 'Не удалось записать сообщение в файл!';
        } else {
            $_SESSION['success'] = 'Ваше сообщение успешно записано! Можете скачать файл!';
        }
    }
}