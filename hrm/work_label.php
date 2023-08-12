<?php include_once("../common/dbconnect.php");
  if(isset($_POST['add_label'])){    
    $code = $_POST['code'];
    $oname  =   $_POST['college'];
    $worklabel = $_POST['name'];
    $salary = $_POST['salary'];
    $level = $_POST['level'];

    $description = $_POST['description'];

    $sql = "insert into work_position (work_unit, swork_unit, code, work_position, salary, level,description) values('$oname','$sname', '$code', '$worklabel','$salary','$level','$description')";
    if(!$con->query($sql)){
      echo "Error: ".$con->error;
    }else{ echo "Work position successful registered"; header("Location:view_work_position.php");}
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
<body class="bb">
<?php include_once("above_hrm.php");?>
<div id="menu"><?php //include_once("../common/menu123.php");?></div>
<div class="wrapper">
  <form action="work_label.php" method="POST">
    <div class="title">
      Record work label Form
    </div>
    <div class="form">

      <div class="inputfield">
        <label>ዋና የሥራ ክፍል</label>
          <div class="custom_select">
            
            <select name='college' id="college" onchange="showCustomer(this.value)">
              <option disabled selected>ዋና የሥራ ክፍል ይምረጡ </option>
                <?php
                  $records = $con->query( "SELECT id,office_name From work_unit");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['id'] ."'>" .$data['office_name'] ."</option>";  // displaying data in option menu
                      
                  } 
                ?>  
            </select>
        </div></div>
        <div class="inputfield">
          <label>ንሁስ ክፍል</label>
          <div class="custom_select" id="department1"> <select name='department'> <option disabled="disabled" selected="selected"> ንሁስ ክፍል ይምረጡ</option>
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
                    xhttp.open("GET", "../common/getdatasss.php?q="+str);
                    xhttp.send();
                  }
              </script>
            </select>
          </div>
        </div>

        <div class="inputfield">
          <label>የመደቡ ኮድ</label>
           <input type="text" class="input" name="code" placeholder="/80.2/201">
       </div>
       <div class="inputfield">
          <label>የሥራ መደብ ስም </label>
           <input type="text" class="input" name="name" placeholder="Secretary">
       </div>

       <div class="inputfield">
          <label>ደመዉዝ መጠን</label>
           <input type="text" class="input" name="salary">
       </div>

      <div class="inputfield">
          <label>ደረጃ</label>
           <input type="text" class="input" name="level" placeholder="III, IV, V,..... XVII">
       </div>

       <div class="inputfield">
          <label>ማብራርያ</label>
           <input type="text" class="input" name="description">
       </div>
      <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="add_label">
      </div>
    </div>
  </form>

  </div>
</div>
<?php include_once("../common/below.php");?>
</body>
</html>