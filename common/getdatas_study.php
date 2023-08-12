<?php
include_once('dbconnect.php');
$collegeid = $_GET['q'];
$dprt = "";
$emp = "";
$sql = "SELECT * FROM department WHERE college_id='".$collegeid."'";
$result = $con->query($sql);

$dprt.="<select name='department'> <option>------- Select department--------</option>";

while($row = mysqli_fetch_array($result)) {
  $id = $row['department_id'];
  $name = $row['department_name'];
  $dprt.="<option value='" . $id . "'>". $name . "</option>";
}
$dprt.="</select>";
$dprt.="@";
//echo $dprt;
//////////////////////////////////


$sql = "SELECT * FROM emp_basic WHERE college='".$collegeid."' order by full_name";
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

//echo $emp;*/
?>