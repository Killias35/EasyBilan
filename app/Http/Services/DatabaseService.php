<?php

namespace App\Http\Services;
use Carbon\Carbon;

class DatabaseService
{
    public static function backup()
    {
        $filename = storage_path('app/backup.sql');

        $command = sprintf(
            'mysqldump -u%s -p%s %s > %s',
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_DATABASE'),
            $filename
        );

        exec($command);

        return $filename;
    }

    public static function restore()
    {
        $filename = storage_path('app/backup.sql');

        $command = sprintf(
            'mysql -u%s -p%s %s < %s',
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_DATABASE'),
            $filename
        );

        exec($command);
    }

    public static function getLastDate()
    {
        $file = storage_path('app/backup.sql');

        if (!file_exists($file)) {
            return null;
        }

        return Carbon::createFromTimestamp(filemtime($file))
        ->setTimezone('Europe/Paris') // UTC+1 ou UTC+2 selon saison
        ->format('d/m/Y H:i');
    }
}