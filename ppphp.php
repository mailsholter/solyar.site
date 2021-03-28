<?php
require_once 'Classes/PHPExcel.php';
$excel = PHPExcel_IOFactory::load('Pr-00001(7).xlsx');
Foreach($excel ->getWorksheetIterator() as $worksheet) {
 $lists[] = $worksheet->toArray();
}
foreach($lists as $list){
 echo '<table border="1">';
 // Перебор строк
 foreach($list as $row){
   echo '<tr>';
   // Перебор столбцов
   foreach($row as $col){
     echo '<td>'.$col.'</td>';
 }
 echo '</tr>';
 }
 echo '</table>';
}
// var_dump(parse_excel_file($excel));

?>