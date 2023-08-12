<?php
if (!isset($_SESSION)){
  session_start();
} 
if(!isset($_SESSION['role']) && $_SESSION['role'] != "Admin"){
    header("Location:/MIS/index.php");
  }
?><?php include_once("common/dbconnect.php");
  if(isset($_POST['add_campus'])){
    $name=$_POST['campus_name'];
    $desc=$_POST['description'];
    $loca=$_POST['location'];
    $area=$_POST['area'];
    
    $sql = "insert into campus (campus_name, descrption, area,location) values('$name','$desc','$area','$loca')";
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
  <link rel="stylesheet" type="text/css" href="my_css/style_form.css">
  <link rel="stylesheet" type="text/css" href="my_css/table.css">
</head>
<body class="bb">
<?php include_once("above.php");?>
<div id="menu"><?php //include_once("common/menu123.php");?></div>
<div class="wrapper">
    <div class="title">
      Add Campus Form
    </div>
    <form action="campus.php" method="POST">
    <div class="form">
       <div class="inputfield">
          <label>Campus name</label>
          <input type="text" class="input" name="campus_name">
       </div>  
       
       <div class="inputfield">
          <label>Description</label>
          <input type="text" class="input" placeholder="Teaching and referral hospital...." name="description">
       </div> 

      <div class="inputfield">
          <label>Area [Hectare]</label>
          <input type="text" class="input"  name="area">
       </div>  
 

       <div class="inputfield">
          <label>GPS Location</label>
          <input type="text" class="input" placeholder="logitude and Latitude (43.12,51.03)..." name="location">
       </div>  

      <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="add_campus">
      </div>
    </div>
 </form>
</div>


<div class="wrapper">
<hr>
<hr>
<br>               
      <h1>List of campus in WSU</h1>     
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">ID</a></th>
              <th><a class="column_sort"  href="#"  data-order="desc" id="name">Campus name</a></th>
                <th><a class="column_sort"  href="#"  data-order="desc" id="level">Description</a></th>
                  <th><a class="column_sort"  href="#"  data-order="desc" id="responsible">Area hectar</a></th>
                    
                      <th><a class="column_sort"  href="#"  data-order="desc" id="office email">Location</a></th>
                        <th>Update</th></tr>
        <?php
            $records = $con->query( "SELECT * From campus");  // Use select query here 
            while($data = mysqli_fetch_array($records))
            {
                echo "<tr><td>".$data['id']."</td><td>".$data['campus_name']."</td><td>".$data['descrption']."</td><td>".$data['area']."</td><td>".$data['location']."</td><td><u>Edit</u></td></tr>";
            }
          echo "</table>";
        ?>
  </table></div>
</div>
<?php include_once("common/below.php");?>
</body>
</html>