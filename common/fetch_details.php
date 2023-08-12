<?php

include_once("dbconnect.php");
$output="";
$columnName = $_POST['column_name'];
$order = $_POST['order'];
if($order=='desc'){
  $order='asc';
}
else  {
  $order='desc';
}
$select_query = "SELECT * FROM program ORDER BY ".$columnName." ".$order." ";

$result = query($con,$select_query);
$output .= '
  <table class='customers' id='empTable' width='100%' cellpadding='10'><tr>
          <th><a class="column_sort"  href="#"  data-order="'.$order.'" id="id">ID</a></th>
          <th><a class="column_sort"  href="#"  data-order="'.$order.'" id="college">College</a></th>
          <th><a class="column_sort"  href="#"  data-order="'.$order.'" id="department_id">Department</a></th>
          <th><a class="column_sort"  href="#"  data-order="'.$order.'" id="program_name">Program name</a></th>
          <th><a class="column_sort"  href="#"  data-order="'.$order.'" id="edu_level">Level</a></th>
          <th><a class="column_sort"  href="#"  data-order="'.$order.'" id="modality">Modality</a></th>
          <th>Update</th></tr>
';

while($row = mysqli_fetch_array($result)){
  $name = $row['program_name'];
  $college = $row['college'];
  $depart = $row['department_id'];
  $modality = $row['modality'];
  $level = $row['edu_level'];

  $output .= "<tr>
    <td>".$name."</td>
    <td>".$college."</td>
    <td>".$depart."</td>
    <td>".$level."</td>
    <td>".$modality."</td>
  </tr>";
}
$output.="</table>"
echo $output;