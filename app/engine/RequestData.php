<?php

namespace Engine;

use XlsToCsv;

class RequestData
{
    private static $processedFiles;
    private static $storage = DOCUMENT_ROOT . '/app/uploads/';

    public static $savedUploadedFiles = [];

    public static function saveFiles() {
        if(count($_FILES) == 0) return;

        $file_name_arr  = explode('.', $_FILES['xlsx']['name']);
        $file_ext       = array_pop($file_name_arr);

        $filename = self::$storage . date('d-m-y_H-i-s').'.' . $file_ext;

        if(move_uploaded_file($_FILES['xlsx']['tmp_name'], $filename))
        {
            self::$savedUploadedFiles[] = $filename;
        }
    }

    public static function handleUploaded() {
        if(count(self::$savedUploadedFiles) == 0) return;

        /*Впихнуть обработку загруженного xls/xlsx файла
        */
        foreach (self::$savedUploadedFiles as $savedFile) {
            $export = new XlsToCsv();

            if(!$export->createFileObject($savedFile)) continue;

            $export->run();
            $processedFiles[] = $export->getCsvUrl();
        }

        $fileName = 'xlsx/akb_invest.xlsx';


        return $processedFiles;
        // return '/app/results/test.txt';
    }
}