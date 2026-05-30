<?php

declare(strict_types=1); 

class Display
{
    public function printMenu(): void
    {
        echo " 1.Создать уведомление\n";
        echo " 2.Канал для связи\n";
        echo "3. Показать логи\n";
        echo "4. Выйти\n";
    }

    public function printChannels(): void
    {
        echo "Каналы: " . "\n";
        echo "1.Push" . "\n";
        echo "2.SMS" . "\n";
        echo "3.EMAIL" . "\n";
    }

    public function printSendResult(bool $success, string $channelName): void
    {
        if ($success) {
            echo "Успешно добавлено через" . $channelName . "\n";
        } else {
            echo "Произошла ошибка отправки через" . $channelName . "\n";
        }

    }

    public function printLogs(array $logs): void
    {
        if (empty($logs)) {
            echo "Тут пока пусто" . "\n";
            return;
        }

        echo "_____Логи_______: " . "\n";
        
        foreach ($logs as $key=>$log) {
            echo $key + 1 . "."  . $log . "\n";
        }
    }

    public function printError(string $message): void
    {
        echo "Ошибка: " . $message;
    }
}