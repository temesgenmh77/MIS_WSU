<?php
include_once('dbconnect.php');

$collegeid = $_GET['q1'];

echo $collegeid."What....";
$sql = "SELECT * FROM emp_basic WHERE department='".$collegeid."'";
$result = $con->query($sql);

echo "<select name='eid'> <option>------- Select11 --------</option>";

while($row = mysqli_fetch_array($result)) {
  $id = $row['emp_id'];
  $name = $row['full_name'];
echo "<option value='" . $id . "'>". $name . "</option>";
}
echo "</select>";
?>