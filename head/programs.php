<?php
  session_start();
  if(!isset($_SESSION['role']) && $_SESSION['role'] != ""){
    header("Location: ../index.php");
      }
?>

<?php include_once("../common/dbconnect.php");
  if(isset($_POST['add_program'])){
    $college = $_POST['college'];
    $department = $_POST['department'];
    $pname  = $_POST['program_name'];
    $modal2= $_POST['modal'];
    $edu2 = $_POST['edu'];
    $year = $_POST['year'];
    $nyears = $_POST['nyear'];
    $sql = "insert into program (college, department_id, program_name, edu_level, modality, year, nyears) values('$college','$department','$pname','$edu2','$modal2','$year','$nyears')";
    if(!$con->query($sql)){
      echo "Error: ".$con->error;
    }else{echo "Successful"; header("Location:view_program.php");}
  }

  if(isset($_POST['edit'])){
    $id = $_GET['id'];
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../my_css/style_form.css">
  <link rel="stylesheet" type="text/css" href="../my_css/table.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../my_css/jquery.min.js"></script>
  
</head>
<body  class="bb">
<?php include_once("above_head.php");?>
<div id="menu"><?php //include_once("../common/menu123.php");?></div>
<div class="wrapper">
    <div class="title">
      Add Program Form
    </div>
    <form action="programs.php" method="POST">

    <div class="form">
       <div class="inputfield">
          <label>Program name</label>
          <input type="text" class="input" class="btn"name="program_name">
       </div>  
      
      <div class="inputfield">
          <label>College</label>
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
      </div>
        <div class="inputfield">
          <label>Department</label>
          <div class="custom_select" id="department1"> 
            <select name='department'> <option>------- Select --------</option>
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
        </div> 

        <div class="inputfield">
          <label>Educational Level</label>
          <div class="custom_select">
            <select name="edu">
              <option value="">Select level</option>
              <option value="Diploma">Diploma</option>
              <option value="1st degree">First degree</option>
              <option value="2nd degree">2nd degree</option>
              <option value="3rd degree">3rd degree</option>
              <option value="Speciality">Speciality</option>
              <option value="Subspeciality">Subspeciality</option>
              
            </select>
          </div>
       </div>

        <div class="inputfield">
          <label>Modality</label>
          <div class="custom_select">
            <select name="modal">
              <option value="">Select modality</option>
              <option value="Regular">Regular</option>
              <option value="Weekend">Weekend</option>
              <option value="Summer">Summer</option>
              <option value="Evenning">Evening</option>
              <option value="Short-term">Other short tem</option>              
            </select>
          </div>
       </div>

       <div class="inputfield">
          <label>Started year (G.C.)</label>
          <input type="text" class="input" name="year">
       </div>
       <div class="inputfield">
          <label>Number of year </label>
          <input type="text" class="input" class="btn"name="nyear">
       </div>
    <div class="inputfield">
       <table width="100%"><tr>
          <td> <input type="submit" value="Add" class="btn" name="add_program"></td>
          <td> <input type="submit" value="Update" class="btn" name="edit"></td>
          <td> <input type="submit" value="Delete" class="btn" name="delete"></td>
        </tr></table>
      </div>
  </div>
</form>

  </div>
<?php include_once("../common/below.php");?>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.column_sort',function(){
      var column_name = $(this).attr('id');
      var order = $(this).attr('order');
      var arrow = '';
      //glyphicon glyphicon-arrow-up
      //glyphicon glyphicon-arrow-down

      if(order=='desc'){
        arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';
      }
      else{
        arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';
      }
      $.ajax({
        url:"fetch_details.php",
        method:"POST",
        data:{column_name:column_name,order:order},
        success:function(data){
          $('#program_data').html(data);
          $('#'+column_name+'').append(arrow);
        }
      })
    });
  }); 
</script>
