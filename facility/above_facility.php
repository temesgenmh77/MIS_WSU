<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> MIS Institutional data </title>
    <link rel="stylesheet" href="../my_css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
          <a href="#">
            <i class='bx bxs-building-house'  ></i>
            <span class="link_name">Appartments</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Appartments</a></li>
          <li><a href="add_block.php">Add block</a></li>
          <li><a href="add_room.php">Register rooms</a></li>
          <li><a href="#">Update detail</a></li>
          <li><a href="#">View details</a></li>
        </ul>
      </li>
      
      <li>
        <div class="iocn-link">
          <a href="#"> 
            <i class='bx bx-buildings'  ></i>
            <span class="link_name">Buildings</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Buildings</a></li>
          <li><a href="#">Add category</a></li>
          <li><a href="add_block">Add block</a></li>
          <li><a href="add_room.php">Register rooms</a></li>
          <li><a href="#">Update detail</a></li>
          <li><a href="#">View details</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
           <!-- <i class='bx bx-book-alt' ></i>-->
            <i class='bx bx-bus'  ></i>
            <span class="link_name">Vehicle data</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Vehicle data</a></li>
          <li><a href="vehicle.php">Add vehicle</a></li>
          <li><a href="vehicle_more.php">Add copoun detail</a></li>
          <li><a href="#">Update detail</a></li>
          <li><a href="#">View detail</a></li>
        </ul>
      </li>


  <li>
        <div class="iocn-link">
          <a href="#">
           <!-- <i class='bx bx-book-alt' ></i>-->
            <i class='bx bx-bus'  ></i>
            <span class="link_name">Construction</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          
          <li><a class="link_name" href="#">Construction</a></li>
          <li><a href="#">Add Site </a></li>
          <li><a href="#">Add building</a></li>
          <li><a href="#">Budget detail</a></li>
          <li><a href="#">Update detail</a></li>
          <li><a href="#">View detail</a></li>


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
      <?php include_once("../common/after_login.php");?>
<div id="notify1">
  <!--Notifications comes here-->
</div>
