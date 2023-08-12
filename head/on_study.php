<?php
if (!isset($_SESSION)){
  session_start();
} 
if(!isset($_SESSION['role']) && $_SESSION['role'] != "Head"){
    header("Location:/MIS/index.php");
  }
?>

<?php include_once("../common/dbconnect.php");
  if(isset($_POST['add_study'])){
    $eid= $_POST['eid'];
    $department = $_POST['department'];
    $college = $_POST['college'];
    $edu_level  = $_POST['level'];
    $st_uni  =$_POST['uni'];
    $st_country  =$_POST['country'];
    $st_modality  =$_POST['modality'];
    $years = $_POST['years'];
    $edate = $_POST['edate'];
    $sdate = $_POST['sdate'];
    $status  =$_POST['status'];
    
    $sql = "insert into on_study (college_id, department_id, emp_id, edu_level, study_uni, country, modality, years, start_date, end_date, complete) values('$college','$department','$eid','$edu_level','$st_uni','$st_country','$st_modality','$years','$sdate','$edate','$status')";
    if(!$con->query($sql)){
      echo "Error: ".$con->error;
    }
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
  <form method="POST" action="on_study.php">
    <div class="title">
      Add staffs on study Form
    </div>
    <div class="form">
       <!---------------------------------------------------------------->
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
                      echo $data['college_id'];
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

<!------------------------------------------------>
        <div class="inputfield">
          <label>Educational level</label>
          <div class="custom_select">
            <select name="level" >
              <option value="">Select</option>
              <option value="Diploma">Diploma</option>
              <option value="1st degree">1st degree</option>
              <option value="2nd degree">2nd degree</option>
              <option value="3rd degree">3rd degree</option>
              <option value="Postdocs">Postdocs</option>
              <option value="Other short term">Other short term</option>              
            </select>
          </div>
       </div>
       <div class="inputfield">
          <label>Study university</label>
           <input type="text" class="input" name="uni">
       </div>  
       <div class="inputfield">
          <label>Country</label>
           <input type="text" class="input" name="country">
       </div>   
        <div class="inputfield">
          <label>Study Modality</label>
          <div class="custom_select">
            <select name="modality">
              <option value="">Select</option>
              <option value="Regular">Regular</option>
              <option value="Weekend">Weekend</option>
              <option value="Summer">Summer</option>
              <option value="Extension">Extension</option>
              <option value="Distance">Distance</option>
              <option value="Sandwitch">Sandwitch</option>
            </select>
          </div>
       </div>
      <div class="inputfield">
          <label>Years required</label>
           <input type="number" class="input" name="years">
       </div>
       <div class="inputfield">
          <label>Started date</label>
           <input type="date" class="input" name="sdate">
       </div> 
      <div class="inputfield">
          <label>End date</label>
          <input type="date" class="input" name="edate">
       </div>
       <div class="inputfield">
          <label>Study Status</label>
          <div class="custom_select">
            <select name="status">
              <option value="">Select</option>
              <option value="Started">Started</option>
              <option value="Reinstated">Reinstated</option>
              <option value="Completed">Completed</option>
              <option value="Terminated">Terminated</option>
              <option value="Withdrawal">Withdrawal</option>
              <option value="Dismissed">Dismissed</option>
              <option value="Extended">Extended</option>
            </select>
          </div>
       </div>
       
      <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="add_study">
      </div>
    </div>
  </form>
</div>
<?php include_once("../common/below.php");?>
</body>
</html>