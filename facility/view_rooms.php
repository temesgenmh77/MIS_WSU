<?php include_once("dbconnect.php");
  if(isset($_POST['add_room'])){
    $code =    $_POST['code'];
    $rname  =   $_POST['name'];
    $purpose =$_POST['purpose'];
    $desc =$_POST['description'];
    $floors =  $_POST['floors'];
    $status  =  $_POST['status1'];
    $block_code  =  $_POST['block'];
    $sql = "insert into rooms (r_code, room_name,block_code, purpose, description,floor,status) values('$code','$rname','$block_code','$purpose','$desc','$floors','$status')";
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
  <link rel="stylesheet" type="text/css" href="../my_css/table.css">
</head>
<body class="bb">
<?php include_once("above.php");?>
<div id="menu"><?php include_once("../common/menu123.php");?></div>



<div class="wrapper">  
  <hr>
  <hr>
  <br>               
      <h1>List of rooms in WSU</h1>     
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Room code</a></th>
              <th><a class="column_sort"  href="#"  data-order="desc" id="name">Room name</a></th>
                <th><a class="column_sort"  href="#"  data-order="desc" id="level">Purpose</a></th>
                  <th><a class="column_sort"  href="#"  data-order="desc" id="responsible">Floor</a></th>
                     <th><a class="column_sort"  href="#"  data-order="desc" id="office email">Block code</a></th>
                        <th>Update</th></tr>
                <?php
                  $records = $con->query( "SELECT * From rooms");  // Use select query here 
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<tr><td>".$data['r_code']."</td><td>".$data['room_name']."</td><td>".$data['purpose']."</td><td>".$data['floor']."</td><td>".$data['block_code']."</td><td><u><a name='edit1' href=add_room.php?id=".$data['id']." >Edit</a></u></td></tr>";
                  }
                echo "</table>";
              ?>
  </div>
</div>
<?php include_once("../common/below.php");?>
</body>
</html>