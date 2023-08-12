<?php
if (!isset($_SESSION)){
  session_start();
} 
if(!isset($_SESSION['role']) && $_SESSION['role'] != "HRM"){
    header("Location:../index.php");
  }
?>

<?php include_once("../common/dbconnect.php");
mysqli_set_charset($con,'utf8');
  if(isset($_POST['add_emp'])){
    $eid = $_POST['emp_id'];
    $fname  = $_POST['fname'];
    $afname  = $_POST['afname'];
    $dob = $_POST['dob'];
    $sex = $_POST['gender'];
    $salary = $_POST['salary'];
    $level = $_POST['wlevel'];
    
    $wsection = $_POST['college'];
    $wcategory = $_POST['department'];
    $wposition = $_POST['wposition'];
    $disablity = $_POST['disable'];
    $hired = $_POST['hired'];
    $edu_level = $_POST['level'];
    $edu_type = $_POST['specialized'];
    
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $nationality = $_POST['nation'];
    $region = $_POST['region'];
    $nation = $_POST['nations'];

    $work = $_POST['status'];
    $category = $_POST['category'];
    $campus = $_POST['campus'];

    $sql = "INSERT into employee  (emp_id, fname,full_name, dob, gender,disability, edu_type, edu_level,hiredate,worksection, workcategory, workposition, level, salary,  nationality, region, nations, email, phone, emp_cat, campus, work_status)
    values('$eid', '$fname','$afname','$dob' ,'$sex','$disablity','$edu_type','$edu_level', '$hired', '$wsection', '$wcategory','$wposition','$level','$salary' ,'$nationality', '$region','$nation', '$email','$phone','$category', '$campus','$work')";
    if($con->query($sql)){
      echo "Employee Successful Added!";
    }else{echo "Error!!!".$con->error;}
  }
?>

<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" type="text/css" href="../my_css/style_form.css">
  <link rel="stylesheet" href="../my_css/style.css">
    <link rel="stylesheet" href="../my_css/style_menu.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../my_css/jquery.min.js"></script>

</head>

<body class="bb">
<?php include_once('above_hrm.php');?>
<?php //include_once('../common/menu123.php');?>
<form action="add_emp.php" method="POST">
<div class="wrapper">
    <div class="title">
      Registration of employee basic Info
    </div>

    <div class="form">
      <div class="inputfield">
      <table width="100%" style="text-align: center;">
        <tr><td style="padding: 20px; margin-left: 0;">
          <label><b>መለያ ቁጥር</b></label></td> <?php
          mysqli_set_charset($con,"utf8");
                  $records = $con->query( "SELECT emp_id From employee");  // Use select query here 
                  
                  while($data = mysqli_fetch_array($records))
                  {
                      $cid = $data['emp_id'];
                  } 
                  $data = explode("/", $cid);
                  $data[2] = $data[2]+1; 
                  $data[2] = "WSU/MIS/".$data[2];
                  //echo $data[2]; 
                ?>

             <td><input type="text" class="input" name="emp_id" id="emp_id" value="<?php echo $data[2];?>" class="field left" readonly="readonly"></td><td>
          <label><b>የትውልድ ዘመን </b> </label></td><td>
          <input type="date" class="input" name="dob" placeholder="ቀን/ወር/ዓ.ም"></td>
        </tr>

        <tr><td>
          <label><b>ስም ከነአያት</b></label></td><td>
          <input type="text" class="input" name="fname" placeholder="በአማረኛ"></td><td>
          <label><b>FUll name</b></label></td><td>
          <input type="text" class="input" name="afname"></td>
        </tr>     

        <tr><td style="padding: 20px; margin-left: 0; margin-top: 10px; margin-bottom: 10px;">
          <label><b>ፆታ</b></label></td><td>
          <input type="Radio" class="input" name="gender" value="ወ">ወንድ
          <input type="Radio" class="input" name="gender" value="ሴ">ሴት </td><td>     
          <label><b>አካል ጉዳት</b></label></td><td>
           <input type="Radio" class="input" name="disable" value="1">አለ
          <input type="Radio" class="input" name="disable" value="2">የለም
       </td></tr>

         <tr><td  style="padding: 20px; margin-left: 0;"> <label>የሥራ ክፍል</label></td><td>
          <div class="custom_select">
            <select name='college' id="college" >
              <option disabled selected>የሥራ ክፍል ይምረጡ</option>
                <?php
                mysqli_set_charset($con,'utf8');
                  $records = $con->query( "SELECT id,office_name From work_unit");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['id'] ."'>" .$data['office_name'] ."</option>";  // displaying data in option menu
                      
                  } 
                ?>  
            </select>
        </div>
        </td><td>
          <label><b>የሚሰሩበረ ዘርፍ</b></label></td><td>
          <div class="custom_select" id="department1"> <select name='department'> 

            <option disabled="disabled" selected="selected"> የሚሰሩበረ ዘርፍ ይምረጡ</option>
              
                <?php
                mysqli_set_charset($con,'utf8');
                  $records = $con->query( "SELECT id,soffice_name From swork_unit");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['id'] ."'>" .$data['soffice_name'] ."</option>";  // displaying data in option menu
                      
                  } 
                ?>  
            </select>
        </div>
        </td></tr>
        <tr><td><label>የሥራ መደብ</label></td><td><div class="inputfield">
          <input type="text" class="input" name="wposition"></div></td>

          <td>

            <label>ደረጃ</label></td><td>
            <div class="custom_select">
            <select name="wlevel">
              <option value="" disabled="disabled" selected="selected">JEG ደረጃ ይምረጡ</option>
              <option value="No">No level</option>
              <option value="I">I</option>
              <option value="II">II</option>
              <option value="III">III</option>
              <option value="IV">IV</option>
              <option value="V">V</option>
              <option value="VI">VI</option>
             <option value="VII">VII</option>
              <option value="VIII">VIII</option>
              <option value="IX">IX</option>
              <option value="X">X</option>
              <option value="XI">XI</option>
              <option value="XII">XII</option>
              <option value="XIII">XIII</option>
              <option value="XIV">XIV</option>
              <option value="XV">XV</option>
              <option value="XVI">XVI</option>
              <option value="XVII">XVII</option>
              <option value="XVIII">XVIII</option>
              <option value="Other">Other</option>

            </select>
          </div>
          </td></tr>

         <tr><td>
          <label style="padding: 10px;">ደመወዝ</label></td><td><div class="inputfield">
          <input type="text" class="input" name="salary"></div></td> <td>
          <label><b>የተቀጠሩበት ዘመን </b> </label></td><td>
          <input type="date" class="input" name="hired" placeholder="ቀን/ወር/ዓ.ም"></td>
        </tr>
</div>
    <tr><td style="padding: 20px; margin-left: 0;">
          <label>የሥራ ዘርፍ</label></td><td>
          <div class="custom_select">
            <Select name="category">
              <option value="" selected="selected" disabled="disabled">የሥራ ዘርፍ ይምረጡ</option>
              <option value="Admin">የአስተዳደር ዘርፍ/Admin</option>
              <option value="Clinical">የሕክምና ዘርፍ/clinical</option>
            </Select>
        </div>
          </td>
            <td> <label>ግቢ</label></td>
            <td><div class="custom_select">
            <select name='campus' id="campus_id">
              <option disabled="disabled" selected="selected">ግቢ ይምረጡ</option>
                <?php
                mysqli_set_charset($con,'utf8');
                  $records = $con->query( "SELECT id,campus_name From campus");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['campus_name'] ."'>" .$data['campus_name'] ."</option>";  // displaying data in option menu 
                  } 
                ?>  
            </select>
        </div>
          </td>
        </tr>
        <tr><td style="padding: 20px; margin-left: 0;">
          <label>የትምህርት ደረጃ</label></td><td>
          <div class="custom_select">
            <select name="level">
              <option value="" selected="selected" disabled="disabled">የትምህርት  ደረጃ ይምረጡ</option>
                <option value=" < 4th">< 4th</option>
                <option value="4th">4th</option>
                <option value="5th">5th</option>
                <option value="6th">6th</option>
                <option value="7th">7th</option>
                <option value="8th">8th</option>
                <option value="9th">9th</option>
                <option value="10th">10th</option>
                <option value="11th">11th</option>
                <option value="12th">12th</option>
                <option value="Level-I">Level-I</option>
                <option value="Level-II">Level-II</option>
                <option value="Level-III">Level-III</option>
                <option value="Level-IV">Level-IV</option>
                <option value="Level-V">Level-V</option>
                <option value="Diploma">Diploma</option>
                <option value="Degree">Degree</option>
                <option value="Masters">Masters</option>
                <option value="PhD">PHD</option>
                <option value="MD doctor">MD doctor</option>
                <option value="MD+Speciality">Speciality</option>
                <option value="MD+subspeciality">Subspeciality</option>               
            </select>
          </div>
          </td>

          <td>
          <label>የትምህርት ዓይነት</label></td><td>
          <input type="text" class="input" name="specialized"></td>

        </tr>

        <tr><td  style="padding: 20px; margin-left: 0;">
          <label>ኢ-ሜል</label></td><td>
          <input type="text" class="input" name="email" placeholder="example@wsu.edu.et"></td><td>
          <label>ስልክ ቁጥር</label></td><td>
          <input type="text" class="input" name="phone"></td>
        </tr>

         <tr><td>
          <label>ዜግነት</label></td><td>
          <input type="text" class="input" name="nation"></td><td>
          <label>ክልል  </label></td><td>
          <input type="text" class="input" name="region"></td>
         </tr>

         <tr> <td><label>ብሄር/ብሄረሰብ  </label></td><td>
          <input type="text" class="input" name="nations"></td>

          <td><label>አሁናዊ ሁነታ</label></td><td>
            <div class="custom_select">
            <select name="status">
              <option value="0" selected="selected" disabled="disabled">አሁናዊ ሁነታ ይምረጡ</option>
              <option value="On duty">በሥራ ላይ</option>
              <option value="On study">በትምህርት ላይ</option>
              <option value="Both">በሥራ ና በትምህርት ላይ</option>
              <option value="Terminated job">ስራ ክፍሉን ለቋል</option>
              <option value="Terminated job">ውል ተቋርጧል</option>
            </select>
          </div>
          </td></tr>
</table></div>
        
      <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="add_emp">
      </div>
    </div>
</div>
</form>
<?php include_once('../common/below.php');?>
</body>
</html>