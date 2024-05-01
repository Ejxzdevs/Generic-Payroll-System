<?php 
include "connection.php";

include 'Spreadsheet_Excel_Reader.php';


// Create an instance of the library
$xls = new Spreadsheet_Excel_Reader();

// Set the output encoding (optional)
$xls->setOutputEncoding('UTF-8');

// Load the XLS file
$xls->read('report.xls');

// Access the data from the first sheet
$data = $xls->sheets[3]['cells'];

// Process the data
foreach ($data as $row) {
    foreach ($row as $cell) {
        echo $cell;
    }
    echo "<br>";
}



?>