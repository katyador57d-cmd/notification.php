<?php

declare(strict_types=1); 

require_once 'src/Notification.php';
require_once 'src/UrgentNotification.php';
require_once 'src/RegularNotification.php';
require_once 'src/Sendable.php';
require_once 'src/Loggable.php';
require_once 'src/EmailSender.php';
require_once 'src/SmsSender.php';
require_once 'src/PushSender.php';
require_once 'src/NotificationService.php';
require_once 'src/Display.php';

$service = new  NotificationService();
$display = new Display();

$notification = null;

while (true) {
    $display->printMenu();
    $choice = readline("Введите номер: ");
    switch($choice) {
        case '1':
            $type = readline("1-срочное, 2- обычное");
            $reciptient = readline("Получатель: ");
            $text = readline("Введите ваше письмо: ");

            if ($type === '1') {
                $notification = new UrgentNotification($reciptient, $text);
            } else {
                $notification = new RegularNotification($reciptient, $text);
            }
            echo "УСпешно создал!" . "\n";
            break;
        
        case '2':
            if ($notification === null) {
                $display->printError("Уведомление не записано! строчка пустая!");
                break;
            }

            $display->printChannels();
            $channel =readline(" Выберите нужный канал: ");

            $sender = match($channel) {
                '1' => new PushSender(),
                '2' => new SmsSender(),
                '3' => new EmailSender(),
                default => null
            };

            if ($sender === null) {
                $display->printError("Неверный канал");
                break;
            }
        
            $result =  $service->sendNotification($sender, $notification);
            $display->printSendResult($result, $sender->getChannelName());
            break;

        case '3':
            $display->printLogs($service->getLogs());
            break;

        case '4': 
            exit;
    }
}