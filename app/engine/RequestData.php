<?php

namespace Engine;


class RequestData
{
    private static $dirtyFiles;
    private static $storage = DOCUMENT_ROOT . '/app/uploads/';

    public static $savedFiles = [];

    public static function saveFiles() {
        if(count($_FILES) == 0) return;

        $filename = self::$storage . date('d_m_y-H_i_s').'.xls';

        if(file_put_contents($filename, $_FILES['xlsx']['tmp_name']))
        {
            self::$savedFiles[] = $filename;
        }
    }

    public static function handleUploaded() {
        if(count(self::$savedFiles) == 0) return;

        /*Впихнуть обработку загруженного файла*/

        return '/app/results/test.txt';
    }
}