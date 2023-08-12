
<?php
if (!isset($_SESSION)){
  session_start();
} 
if(!isset($_SESSION['role']) && $_SESSION['role'] != "Head"){
    header("Location:/MIS/index.php");
  }
?>

<?php
include_once("../common/dbconnect.php");
if(isset($_POST['efficient'])){

    $eid = $_POST['eid'];
    $college = $_POST['college'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $year = $_POST['year'];
    $result = $_POST['result'];
    $coment = $_POST['coment'];
    
    $sql = "insert into staff_efficiency 
    (emp_id,college,department,year,semester,staff_efficiency,Comment,updated_date) values('$eid','$college','$department','$year','$semester','$result','$coment', CURDATE())";
    if($con->query($sql)){ echo "Efficiency recorded";}
    else{echo "Efficiency recorded".$con->error;}  
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../my_css/style_form.css">
</head>
<body class="bb">
<?php include_once("above_head.php");?>
<div id="menu"><?php //include_once("../common/menu123.php");?></div>
<div class="wrapper">
    <div class="title">
      Staff Efficiency Form
    </div>
    <form action="efficiency.php" method="POST">
    <div class="form">

                <div class="inputfield">
          <label>College</label>
          <div class="custom_select">
            <select name='college' id="college" onchange="showDepartment(this.value)">
              <option disabled selected>Select College/School </option>
                <?php
                  $records = $con->query( "SELECT college_id,college_name From college");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['college_id'] ."'>" .$data['college_name'] ."</option>";  // displaying data in option menu
                  } 
                ?>  
            </select>
          </div>
        </div>
        <div class="inputfield">
          <label>Department</label>
          <div class="custom_select" id="department1"> 
            <select name='department' onchange="showEmployee(this.value)"> 
              <option>------- Select department--------</option>
              <script>
                  function showDepartment(str1) {
                    if (str1 == "") {
                      document.getElementById("department1").innerHTML = "";
                      return;
                    }
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                      var dp = this.responseText;
                      var dpp=dp.split("@");
                      //document.write(dp11[0]);
                      //document.write(dp11[1]);
                      document.getElementById("department1").innerHTML = dpp[0];
                      //document.getElementById("empid").innerHTML = dpp[1];
                      //document.getElementById("empid").innerHTML = this.responseText;
                    }
                    xhttp.open("GET", "../common/getdatas_study.php?q="+str1);
                    xhttp.send();
                  }
              </script>
            </select>
          </div>
        </div>
<!--    <div class="inputfield">
          <label>Employee Id</label>
          <div class="custom_select" id="empid"> 
            <select name='eid'> 
              <option>------- Select employee--------</option>
            </select>
          </div>
        </div>
-->
        <div class="inputfield">
          <label>Employee Id</label>
          <div class="custom_select" id="empid"> 
            <select name='eid'>
             

             <option disabled selected selected="selected">Select staff </option>
                <?php
                  $records = $con->query( "SELECT emp_id,full_name From emp_basic where department='".$_SESSION['department']."'");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['emp_id'] ."'>" .$data['full_name'] ."</option>";  // displaying data in option menu
                  } 
                ?>
              <option></option>
            </select>
          </div>
        </div>  
    



        <div class="inputfield">
          <label>Semester</label>
          <div class="custom_select">
          <select name='semester'>
            <option value="" disabled="disabled" selected="selected">Select Semester</option>
            <option value="1">First semester</option>
            <option value="2">Second semester</option>
          </select>
       </div>  
     </div>
       <div class="inputfield">
          <label>Year</label>
          <input type="number" class="input" name="year">
       </div>

      <div class="inputfield">
          <label>Efficiency result (100%)</label>
          <input type="number" class="input" name="result">
       </div> 
        <div class="inputfield">
          <label>Comment</label>
          <textarea class="input" name="coment"></textarea> 
       </div>       
      <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="efficient" id="efficient">
      </div>
    </div>
</div>
</form>
<?php include_once("../common/below.php");?>
</body>
</html>