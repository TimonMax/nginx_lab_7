<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/db.php';
require __DIR__ . '/QueueManager.php';

$q = new QueueManager();

$payload = [
    'id' => random_int(1000, 9999),
    'visit_date' => $_POST['visit_date'] ?? date('Y-m-d'),
    'source' => $_POST['source'] ?? 'Без источника',
    'page' => $_POST['page'] ?? '/home',
    'duration' => (int)($_POST['duration'] ?? 0),
    'timestamp' => date('Y-m-d H:i:s'),
];

$q->publish($payload);

# Замените на echo "Сообщение отправлено в очередь."; если хотите посмотреть, что сообщение точно отправилось
# А так оно автоматически переходит обратно на главную
header('Location: /index.php');
exit;