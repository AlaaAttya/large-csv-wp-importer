<?php


require_once 'CSVProcessor.php';

$file_path = "DUMMY_DATA_IMPORT.csv";

$csvProcessor = new CSVProcessor($file_path);
$csvProcessor->process();