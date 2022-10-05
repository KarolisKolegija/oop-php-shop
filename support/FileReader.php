<?php

class FileReader
{
    public static function readJsonFile($path, $asArray = false): array|bool
    {
        if (!file_exists($path)) {
            return false;
        }

        if ($content = file_get_contents($path)) {
            $content = json_decode($content, $asArray);
        } else {
            return false;
        }

        return $content;
    }
}
