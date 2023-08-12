<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="style_form.css">

</head>
<body  class="bb">
<?php include_once("above.php");?>
<div id="menu"><?php //include_once("common/menu123.php");?></div>
<div class="wrapper">
    <div class="title">
      Add Band Form
    </div>
    
   <div class="form">
       <div class="inputfield">
          <label>Band ID</label>
          <input type="text" class="input" name="id" id="id">
       </div>  

    
       <div class="inputfield">
          <label>Name of Band</label>
          <input type="text" class="input" name="name" id="name">
       </div>  
    
      <div class="inputfield">
        <input type="submit" value="Register" class="btn">
      </div>
    </div>
</div>
<?php include_once("common/below.php");?>
</body>
</html>