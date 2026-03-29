<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/db.php';
require __DIR__ . '/QueueManager.php';

$q = new QueueManager();
$q->publish([
    'name' => $_POST['name'] ?? 'Без имени',
    'timestamp' => date('Y-m-d H:i:s')
]);

echo "Сообщение отправлено в очередь.";
