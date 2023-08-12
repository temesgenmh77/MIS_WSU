<?php
if (!isset($_SESSION)){
  session_start();
} 
  if(!isset($_SESSION['role']) && $_SESSION['role'] != "HRM"){
    header("Location:../index.php");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> MIS Institutional data </title>
    <link rel="stylesheet" href="../my_css/style.css">
    <link rel="stylesheet" href="../my_css/style_menu.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <!-- Boxiocns CDN Link -->
    <link href='../my_css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

  <div class="sidebar close">
    <div class="logo-details">      
      <i class='bx bx-menu' ></i>
      <span class="logo_name">WSU MIS</span>
    </div>

    <ul class="nav-links">
      <li>
      	<div class="iocn-link">
        <a href="#"> <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
        </ul>
    </li>
   
      <li>
        <div class="iocn-link">
           <a href="#"> <i class='bx bx-collection' ></i>
            <span class="link_name">Admin staff</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Admin staff</a></li>
          <li><a href="view_employee.php">Employee detail</a></li>
          <li><a href="view_category.php">Category</a></li>
          <li><a href="view_subcategory.php">sub category</a></li>
          <li><a href="view_work_position.php">Work position</a></li>
          <li><a href="search_employee_details.php">Epmployee detail</a></li>
          
        </ul>
      </li>

      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">About MIS</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">About MIS</a></li>
        </ul>
      </li>
      
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
   <!--   
      <li>
    <div class="profile-details">
      <div class="profile-content"> 
        <img src="image/profile.jpg" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">Temesgen M.</div>
        <div class="job">Web Desginer</div>
      </div>
      <i class='bx bx-log-out' ></i>
    </div>
  </li>
-->
</ul>
  </div>
 <section class="home-section">
<!--     <div class="home-content">
      <i class='bx bx-menu' ></i>-->
      <!--<span class="text">Drop Down Sidebar</span>-->
      <?php //include_once("../common/menu123.php");?>
      <?php include_once("../common/after_login.php");?>

<div id="notify1">
  <!--Notifications comes here-->
</div>
