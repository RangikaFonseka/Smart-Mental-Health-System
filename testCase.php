<?php


function testCaseGenerate($action, $result ,$state) {
   
    $timestamp = date('Y-m-d H:i:s');

    // Prepare the test result entry
    $entry = "Timestamp: $timestamp | Action: $action | Result: $result | Reason:$state ". PHP_EOL;

    $filePath = 'test_results.txt';

    // Save the entry to the file
    file_put_contents($filePath, $entry, FILE_APPEND);
}



















?>