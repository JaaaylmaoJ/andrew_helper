<?php


class XlsToCsv
{
    private $fileData;

    protected $calculatedData;
    protected $savedFileUrl;

    public $errors;

    public function __construct()
    {

    }

    public function run()
    {
        $this->calc();

        if($this->writeCsv()) {
            return $this->getCsvUrl();
        }
    }

    public function createFileObject($file)
    {
        global $App;

        $xls    = new SimpleXLS($file);
        $xlsx   = new SimpleXLSX($file);

        if ($xls->success()) {
            $this->fileData = $xls->rows();
        } elseif ($xlsx->success()) {
            $this->fileData = $xlsx->rows();
        } else {
            $App->errors[] =  "xls error: " . $xls->error();
            $App->errors[] =  " xlsx error: " . $xlsx->error();

            return false;
        }

        return true;
    }

    public function getCsvUrl()
    {
        return $this->savedFileUrl;
    }

    private function calc()
    {
        foreach ($this->fileData as $row => $vals)
        {
            if($row == 0 || empty($this->fileData[$row-1][0])) continue;

            $kpi        = '';
            $bestPos    = '';
            $price      = '';

            //подставление
            $vals[1] = (!is_numeric($vals[1]) || $vals[1] == 0) ? 31 : $vals[1];
            $vals[2] = (!is_numeric($vals[2]) || $vals[2] == 0) ? 31 : $vals[2];

            //выяснение лучшего показателя
            $bestPos = ($vals[1] <= $vals[2]) ? $vals[1] : $vals[2];

            //выяснение kpi
            if($bestPos >= 1 && $bestPos < 5)
                $kpi = 100;
            elseif($bestPos >=  5 && $bestPos < 10)
                $kpi = 75;
            elseif($bestPos >= 10 && $bestPos < 15)
                $kpi = 50;
            elseif($bestPos >= 15 && $bestPos < 30)
                $kpi = 30;
            elseif($bestPos >= 30)
                $kpi = 0;

            //расчет цены запроса
            //$price =  ($kpi !== 0) ? round($kpi/100*83.75, 2) : 0; //mylablife
            $price =  ($kpi !== 0) ? round($kpi/100*93, 2) : 0;


            $this->calculatedData[] = [
                $vals[0],
                $vals[1],
                $vals[2],
                $bestPos,
                $kpi,
                $price,
            ];
        }
    }

    private function writeCsv()
    {
        $columns = [
            'Запрос',
            'Позиция в яндексе',
            'Позиция в гугле',
            'Лучшая позиция',
            'KPI',
            'Стоимость запроса',
        ];

        $csv_name = 'export-'.date('H_i_s').'.csv';
        $csv_path = DOCUMENT_ROOT . '/app/results/' . $csv_name;

        //добавление названий столбцов
        array_unshift($this->calculatedData, $columns);

        try {
            $fp = fopen($csv_path, 'w');

            foreach ($this->calculatedData as $fields)
                fputcsv($fp, $fields, ';');

            $this->savedFileUrl = '/app/results/' . $csv_name;

            return true;
        } catch(Exception $e) {
            d($e->getMessage());

            return false;
        }
    }
}