<?php
include_once('dbconnect.php');

$id = $_GET['q'];
if($id == "college"){
  $sql = "SELECT college_id,college_name FROM colleges" ;
  $result = $con->query($sql);
  $dprt.="<table>";
  while($row = mysqli_fetch_array($result)) {
    $dprt.="<tr><td><a href=view_details.php?id='".$row['college_id']."'>".$row['college_name']."</a><td></tr>";
  }
  $dprt.="</table>";
  echo $dprt;
  echo 
}
echo "Test";
/*
//$dprt.="@";
echo $dprt;
//////////////////////////////////



$sql = "SELECT * FROM emp_basic WHERE college='".$collegeid."'";
$result = $con->query($sql);

$dprt.="<select name='eid'> <option>------- Select employee--------</option>";

while($row = mysqli_fetch_array($result)) {
  $id = $row['emp_id'];
  $name = $row['full_name'];
  $dprt.="<option value='" . $id . "'>". $name . "</option>";
}
$dprt.="</select>";
//$data = $dprt.";".$emp;
echo $dprt;
*/
//echo $emp;*/
?>