<?php
include_once('dbconnect.php');
$collegeid = $_GET['q'];
$dprt = "";
$emp = "";
$sql = "SELECT * FROM swork_unit WHERE work_unit='".$collegeid."'";
$result = $con->query($sql);

$dprt.="<select name='department'> <option>------- Select department--------</option>";

while($row = mysqli_fetch_array($result)) {
  $id = $row['id'];
  $name = $row['soffice_name'];

  $dprt.="<option value='" . $id . "'>". $name . "</option>";
}
$dprt.="</select>";
$dprt.="@";
//echo $dprt;
//////////////////////////////////


$sql = "SELECT * FROM work_position WHERE work_unit='".$collegeid."' order by work_position";
$result = $con->query($sql);

$dprt.="<select name='eid'> <option>------- Select work position--------</option>";

while($row = mysqli_fetch_array($result)) {
  $id = $row['id'];
  $name = $row['work_position'];
  $dprt.="<option value='" . $id . "'>". $name . "</option>";
}
$dprt.="</select>";
//$data = $dprt.";".$emp;
echo $dprt;

//echo $emp;*/
?>