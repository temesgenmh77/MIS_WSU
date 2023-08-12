<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="style_form.css">

</head>
<body>
<?php include_once("above.php");?>
<div id="menu"><?php //include_once("menu123.php");?></div>
<div class="wrapper">
    <div class="title">
      Staff Address Form
    </div>
    <div class="form">
       <div class="inputfield">
          <label>Employee Id</label>
          <input type="text" class="input">
       </div>  
        <div class="inputfield">
          <label>Nationality</label>
          <input type="number" class="input">
       </div>  
       <div class="inputfield">
          <label>Region</label>
          <input type="number" class="input">
       </div>  
      <div class="inputfield">
          <label>Institutional email</label>
          <input type="password" class="input">
       </div> 
        
        <div class="inputfield">
          <label>Other email</label>
          <input type="text" name="" class="input"> 
       </div> 

      <div class="inputfield">
        <input type="submit" value="Register" class="btn">
      </div>
    </div>
</div>
<?php include_once("below.php");?>
</body>
</html>