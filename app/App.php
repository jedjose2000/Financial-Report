<?php

declare(strict_types=1);
// Your Code
function getAllTransactions()
{
    $row = 1;
    $readFile = readAllFiles((FILES_PATH));
    if ($readFile !== NULL) {
        foreach ($readFile as $value) {
            if(!file_exists($value)) {
                error_log('File ' . $value . ' does not exist');
                continue; 
            }
            $openedFile = fopen($value, 'r');
            fgetcsv($openedFile);
            while (($data = fgetcsv($openedFile, 1000, ",")) !== FALSE) {
                $row++;
                $dataArray[] = [
                    'date' => $data[0] ?? null,
                    'check' => $data[1] ?? null,
                    'transaction' => $data[2] ?? null,
                    'amount' => $data[3] ?? null
                ];
            }
            fclose($openedFile);
        }
    }
    return $dataArray;
}

function readAllFiles($files){
    $dir = new DirectoryIterator($files);
    foreach ($dir as $file) {
        if (!$file->isDot()) {
            $filePath []=  FILES_PATH . $file->getFilename();
        }
    }
    return $filePath;
}

function computeTransaction($transactions){
    $totalIncome = 0;
    $totalExpenses = 0;
    foreach ($transactions as $key => $value){
        $temp = str_replace([',','$'], '', $value['amount']);
        if($temp >= 0){
            $totalIncome += $temp;
        }else{
            $totalExpenses -= $temp;
        }
    }
    return $data = [
        'totalIncome'=> $totalIncome,
        'totalExpenses'=> $totalExpenses
    ];
}

