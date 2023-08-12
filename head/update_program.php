<?php
  session_start();
  if(!(isset($_SESSION['role'])) && ($_SESSION['role'] != "Head")){
    header("Location: ../index.php");
  }
?>

<?php
include_once("../common/dbconnect.php");
if(isset($_POST['update_program'])){
  $sql = "update program set college='".$_POST['college']."', department_id='".$_POST['department']."' ,program_name='".$_POST['']."', edu_level='".$_POST['edu']."', modality='".$_POST['modal']."', year='".$_POST['year']."', nyears='".$_POST['nyear']."'";
  if($con->query($sql)){
    echo "Successfully updated!";
  }else{echo "Errorrrrrrrrrrr".$con->error;}


}

$program = $_GET['pid'];
$record = $con->query("SELECT * from program where id='$program'");
while($data = $record->fetch_assoc()){

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../my_css/style_form.css">
</head>
<body  class="bb">
<?php include_once("above_head.php");?>
<?php //include_once("../common/menu123.php");?>
<div class="wrapper">
    <div class="title">
      Update Program Form
    </div>

    <form action="programs.php" method="POST">

    <div class="form">
       <div class="inputfield">
          <label>Program name</label>
          <input type="text" class="input" name="program_name" value="<?php echo $data['program_name']; ?>">
       </div>  
      
      <div class="inputfield">
          <label>College</label>
          <div class="custom_select">
            <select name='college' id="college" onchange="showCustomer(this.value)">
              <option disabled selected >Select College/School </option>
                <?php
                  $records = $con->query( "SELECT college_id,college_name From college");  
                  // Use select query here 
                  $cid = "";
                  while($data1 = mysqli_fetch_array($records))
                  {
                    if($data['college']==$data1['college_id']){
                      echo "<option value='". $data1['college_id'] ."' selected='selected'>" .$data1['college_name'] ."</option>";
                      $cid=$data1['college_id'];
                  }
                    else{
                      echo "<option value='". $data1['college_id'] ."'>" .$data1['college_name'] ."</option>";  // displaying data in option menu
                    }
                      
                  } 
                ?>  
            </select>
        </div>
      </div>
      

          <div class="inputfield">
          <label>Department</label>
          <div class="custom_select">
          <select name='department' id="department"> <option disabled="disabled" selected="selected"> Select department</option>
                <?php
              $records = $con->query( "SELECT department_id,department_name From department where college_id='".$cid."'" );  // Use select query here 
                  $cid = "";

                  while($data1 = mysqli_fetch_array($records))
                  {
                    if(($data['department_id'] == $data['department_id']))
                      echo "<option selected='selected' value='". $data1['department_id'] ."'>" .$data1['department_name'] ."</option>";  // displaying data in option menu
                    else
                    echo "<option value='". $data1['department_id'] ."'>" .$data1['department_name'] ."</option>";  // displaying data in option menu
                        
                  }
                 
                ?>
            </select>
          </div>
        </div>

        <div class="inputfield">
          <label>Educational Level</label>
          <div class="custom_select">
            <select name="edu">
              <option value="">Select level</option>
              <option value="Diploma" <?php if($data['edu_level']=="Diploma") echo 'selected="selected"';?>>Diploma </option>
              <option value="1st degree" <?php if($data['edu_level']=="1st degree") echo 'selected="selected"';?>>First degree</option>
              <option value="2nd degree" <?php if($data['edu_level']=="2nd degree") echo 'selected="selected"';?>>2nd degree</option>
              <option value="3rd degree" <?php if($data['edu_level']=="3rd degree") echo 'selected="selected"';?>>3rd degree</option>
              <option value="Speciality" <?php if($data['edu_level']=="Speciality") echo 'selected="selected"';?>>Speciality</option>
              <option value="Subspeciality" <?php if($data['edu_level']=="Subspeciality") echo 'selected="selected"';?>>Subspeciality</option>
              <option value=""></option>
              <option value=""></option>
            </select>
          </div>
       </div>

        <div class="inputfield">
          <label>Modality</label>
          <div class="custom_select">
            <select name="modal">
              <option value="">Select modality</option>
              <option value="Regular"  <?php if($data['modality']=="Regular") echo 'selected="selected"';?>>Regular </option>
              <option value="Weekend"  <?php if($data['modality']=="Weekend") echo 'selected="selected"';?>>Weekend</option>
              <option value="Summer"  <?php if($data['modality']=="Summer") echo 'selected="selected"';?>>Summer</option>
              <option value="Evenning"  <?php if($data['modality']=="Evenning") echo 'selected="selected"';?>>Evening</option>
              <option value="Short-term"  <?php if($data['modality']=="Short-term") echo 'selected="selected"';?>>Other short tem</option>              
            </select>
          </div>
       </div>


       <div class="inputfield">
          <label>Started year (G.C.)</label>
          <input type="text" class="input" name="year" value="<?php echo $data['year'];?>">
       </div>
       <div class="inputfield">
          <label>Number of year </label>
          <input type="text" class="input" class="btn"name="nyear" value="<?php echo $data['nyears'];?>">
       </div>

       <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="update_program">
      </div>

</div>
</form>
<?php } include_once("../common/below.php");?>
</body>
</html>