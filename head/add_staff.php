<?php
  session_start();
  if(!(isset($_SESSION['role'])) && ($_SESSION['role'] != "Head")){
    header("Location: ../index.php");
  }
?>

<?php include_once("../common/dbconnect.php");
  if(isset($_POST['add_staff'])){
    $eid = $_POST['emp_id'];
    $fname  = $_POST['fname'];
    $dob = $_POST['dob'];
    $sex = $_POST['gender'];
    $college = $_POST['college'];
    $department= $_POST['department'];
    $disablity = $_POST['disable'];
    $hired = $_POST['hired'];
    $level = $_POST['level'];
    $rank = $_POST['rank'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $nation = $_POST['nation'];
    $region = $_POST['region'];

    $work = $_POST['status'];
   
    $category = $_POST['category'];
    $elip = $_POST['elip'];
    $hdp = $_POST['hdp'];
    $campus = $_POST['campus'];

    $sql = "insert into emp_basic 
    (emp_id,full_name,dob,hired_date,sex,college,department,Disability,level, rank,category, nation,region, email,phone,elip,hdp,work_status,campus_id) 
    values('$eid','$fname','$dob','$hired','$sex','$college','$department','$disablity','$level','$rank','$category','$nation','$region','$email','$phone','$elip','$hdp','$work','$campus')";
    if($con->query($sql)){
      echo "Staff Successful Added!";
      header("Location:view_staff.php");
    }else{echo "Error!!!".$con->error;}
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  
  <link rel="stylesheet" type="text/css" href="../my_css/style_form.css">
  <link rel="stylesheet" type="text/css" href="../my_css/table.css">
  <script type="text/javascript" src="jquery.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="bb">
<?php include_once('above_head.php');?>
<?php //include_once('../common/menu123.php');?>
<form action="add_staff.php" method="POST">
<div class="wrapper">
    <div class="title">
      Registration staff basic Info
    </div>

    <div class="form">
      <div class="inputfield">
      <table width="100%" style="text-align: center;">
        <tr><td style="padding: 20px; margin-left: 0;">
          <label>Employee ID</label></td> <?php
                  $records = $con->query( "SELECT emp_id From emp_basic");  // Use select query here 
                  
                  while($data = mysqli_fetch_array($records))
                  {
                      $cid = $data['emp_id'];
                  } 
                  $data = explode("/", $cid);
                  $data[2] = $data[2]+1; 
                  $data[2] = "WSU/MIS/".$data[2];
                  //echo $data[2]; 
                ?>

             <td><input type="text" class="input" name="emp_id" id="emp_id" value="<?= $data[2];?>"></td><td>
          <label>Date of birth  </label></td><td>
          <input type="date" class="input" name="dob"></td>
        </tr>

        <tr><td>
          <label>Full Name</label></td><td>
          <input type="text" class="input" name="fname"></td><td>
          <label>Hired date  </label></td><td>
          <input type="date" class="input" name="hired"></td>
        </tr>     
        <tr><td style="padding: 20px; margin-left: 0; margin-top: 10px; margin-bottom: 10px;">
          <label>Gender</label></td><td>
          <input type="Radio" class="input" name="gender" value="M">Male
          <input type="Radio" class="input" name="gender" value="F">Female </td><td>     
          <label>Disablity</label></td><td>
           <input type="Radio" class="input" name="disable" value="Yes">Yes
          <input type="Radio" class="input" name="disable" value="No">No
       </td></tr>
         <tr><td  style="padding: 20px; margin-left: 0;"> <label>College</label></td><td>
          <div class="custom_select">
            <select name='college' id="college" onchange="showCustomer(this.value)">
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
        </td><td>
          <label>Department</label></td><td>
          <div class="custom_select" id="department1"> <select name='department'> <option disabled="disabled" selected="selected"> Select department</option>
              <script>
                  function showCustomer(str) {
                    if (str == "") {
                      document.getElementById("department1").innerHTML = "";
                      return;
                    }
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                      document.getElementById("department1").innerHTML = this.responseText;
                    }
                    xhttp.open("GET", "../common/getdatas.php?q="+str);
                    xhttp.send();
                  }
              </script>
            </select>
          </div>
        </td></tr>

    <tr><td style="padding: 20px; margin-left: 0;">
          <label>Employee Category</label></td><td>
          <div class="custom_select">
            <Select name="category">
              <option value="">Select category</option>
              <option value="Academic">Academic staff</option>
              <option value="TA">Technical Assistant</option>
              <option value="Admin">Administrative staff</option>
              <option value="Clinical">Clinical staff</option>
            </Select>
        </div>
          </td>
            <td> <label>Campus</label></td>
            <td><div class="custom_select">
            <select name='campus' id="campus_id">
              <option disabled="disabled" selected="selected">Select Campus </option>
                <?php
                  $records = $con->query( "SELECT id,campus_name From campus");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['id'] ."'>" .$data['campus_name'] ."</option>";  // displaying data in option menu 
                  } 
                ?>  
            </select>
        </div>
          </td>
        </tr>
        <tr><td style="padding: 20px; margin-left: 0;">
          <label>Academic rank</label></td><td>
            <div class="custom_select">
            <Select name="rank">
              <option value="" selected="selected" disabled="disabled">Select academic rank</option>
              <option value="GAI">Graduate Assistant I</option>
              <option value="GAII">Graduate Assistant II</option>
              <option value="Ass. Lecturer">Assistant Lecturer</option>
              <option value="Lecturer">Lecturer</option>
              <option value="Ass. Prof.">Assistant Professor</option>
              <option value="Asso. Prof.">Associate Professor</option>
              <option value="Prof.">Professor</option>
            </Select>
        </div>
          </td><td>
          <label>Educational level</label></td><td>
          <div class="custom_select">
            <select name="level">
              <option value="" selected="selected" disabled="disabled">Select educational level</option>
                <option value="10+">Level I II III or IV</option>
                <option value="Diploma">Diploma</option>
                <option value="BSc/BA">1st degree</option>
                <option value="MSc/MA">2nd degree</option>
                <option value="PhD">3rd degree</option>
                <option value="MD+Speciality">Speciality</option>
                <option value="MD+subspeciality">Subspeciality</option>               
            </select>
          </div>
          </td>
        </tr>
        <tr><td style="padding: 20px; margin-left: 0;">
           <label>HDP training</label></td><td>
          <div class="custom_select">
            <select name="hdp">
              <option value="" selected="selected" disabled="disabled">Select HDP status</option>
              <option value="1">Completed</option>
              <option value="2">Ongoing</option>
              <option value="3">Not started</option>
            </select>
          </div>
          </td><td>
          <label>ELIP training</label></td><td>
          <div class="custom_select">
            <select name="elip">
              <option selected="selected" disabled="disabled" value="">Select ELIP status</option>
              <option value="1">Completed</option>
              <option value="2">Ongoing</option>
              <option value="3">Not started</option>
            </select>
          </div>
          </td>
        </tr>
        <tr><td  style="padding: 20px; margin-left: 0;">
          <label>Email</label></td><td>
          <input type="email" class="input" name="email"></td><td>
          <label>Phone  </label></td><td>
          <input type="number" class="input" name="phone"></td>
        </tr>
        
       <tr><td>
          <label>Nationality</label></td><td>
          <input type="text" class="input" name="nation"></td><td>
          <label>Region  </label></td><td>
          <input type="text" class="input" name="region"></td>
        </tr>
        <tr><td  style="padding: 20px; margin-right: 0;">
        
            <label>Current status</label></td><td>
            <div class="custom_select">
            <select name="status">
              <option value="0">Select work status</option>
              <option value="On duty">On duty</option>
              <option value="On study">On study</option>
              <option value="Both">Both</option>
              <option value="Terminated job">Terminated job</option>
            </select>
          </div>
          </td> <td></td><td></td></tr>
         
    

</table></div>
        
      <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="add_staff">
      </div>
    </div>
</div>
</form>
<?php include_once('../common/below.php');?>
</body>
</html>