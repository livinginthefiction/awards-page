<?php 
  session_start();
  if (!isset($_SESSION['language'])) {$_SESSION['language']='en';}

  if ($_SESSION['language']=='en') {include('components/enLang.php');} 
  else {include('components/arLang.php');}
?>

<!DOCTYPE html>
<html <?= ($_SESSION['language']=='en') ? "lang='en'":"lang='ar'" ?>>

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Alyousuf Awards </title>
    <link rel="stylesheet" href="admin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="admin/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="css/slick-theme.css">
    <!-- slick end -->
    <link rel="icon" href="https://www.konemamwenenge.com/alyousuf-website/wp-content/uploads/2021/08/cropped-logo-1-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://www.konemamwenenge.com/alyousuf-website/wp-content/uploads/2021/08/cropped-logo-1-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://www.konemamwenenge.com/alyousuf-website/wp-content/uploads/2021/08/cropped-logo-1-180x180.png" />
    <link href="https://www.dafontfree.net/embed/Z2lsbC1zYW5zLW10LXJlZ3VsYXImZGF0YS8xMy9nLzY0ODQ1L0dJTF9fX19fLlRURg" rel="stylesheet" type="text/css"/>
    <style type="text/css">
      body:lang(en), .h1:lang(en), .h2:lang(en), .h3:lang(en), .h4:lang(en), .h5:lang(en), .h6:lang(en), .p:lang(en), h1:lang(en), h2:lang(en), h3:lang(en), h4:lang(en), h5:lang(en), h6:lang(en), p:lang(en), a:lang(en), li:lang(en), span:lang(en) {font-family: 'gill-sans-mt-regular', sans-serif !important;}

      body:lang(ar), .h1:lang(ar), .h2:lang(ar), .h3:lang(ar), .h4:lang(ar), .h5:lang(ar), .h6:lang(ar), .p:lang(ar), h1:lang(ar), h2:lang(ar), h3:lang(ar), h4:lang(ar), h5:lang(ar), h6:lang(ar), p:lang(ar), a:lang(ar), li:lang(ar), span:lang(ar) {font-family: "GE SS TV",Roboto !important;}   
    
      h5.card-title.m-0.text-center {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

  .sidenav {
    height: 100%; /* 100% Full-height */
    width: 0; /* 0 width - change this with JavaScript */
    position: fixed; /* Stay in place */
    z-index: 1050; /* Stay on top */
    top: 0;
    right: 0;
    background-color: #02020290; /* Black*/
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 60px; /* Place content 60px from the top */
    transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

<?php
    if ($_SESSION['language']!='en') {echo '.sidenav{left:0;}';}
  ?>
  .opensidenav {width: 250px; /* 0 width - change this with JavaScript */}

/* The navigation menu links */
.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #ffffff;
    display: block;
    transition: 0.3s;
    text-align: center;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
    transition: margin-left .5s;
    padding: 20px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media only screen and (max-width: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
    a.navbar-brand {margin-right: 0 !important;}
    nav .container {display: inline;} 
    .navbar-brand img {width: 50% !important;}
    button.btn.mx-1.text-light.pr-5 {padding-right: 0 !important;}
    .mob-div{display: inherit;}
}

</style>
  </head>
<body>
  <div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    <!--Navbar-->
<!--Navbar-->
<nav class="navbar fixed-top navbar-light light-blue lighten-4 py-4 " style="background-color: #474747;" <?= ($_SESSION['language']=='en') ? "":"dir='rtl'" ?>>

 <div class="container">
     <!-- Navbar brand -->
  <a class="navbar-brand" href="#"><img class="w-100 " src="upload/logo-light.png" alt=""></a>
  

  <div class="mob-div">
    <!-- Facebook -->
    <i class="px-2 pt-2 fab fa-facebook-f text-light"></i>
    <!-- Linkedin -->
    <i class="px-2 pt-2 fab fa-linkedin-in text-light"></i>
    <!-- Instagram -->
    <i class="px-2 pt-2 fab fa-instagram text-light"></i>
      <?php 
        if ($_SESSION['language']=='en') { ?>
      <button onclick="setLang('ar')" class="btn mx-1 text-light pr-5" type="button">العربية</button>
      <?php } else { ?>
      <button onclick="setLang('en')" class="btn mx-1 text-light pr-5" type="button">English</button>

      <?php } ?>
    <!-- <div class="dropdown float-right">
      <button class="btn dropdown-toggle mx-1 text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['language'] ?></button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" onclick="setLang('en')" href="#">EN</a>
        <a class="dropdown-item" onclick="setLang('ar')" href="#">AR</a>
      </div>
    </div> -->

    <script type="text/javascript">
      function setLang(lang) {
        $.ajax({
          url: 'admin/ajax/setlanguage.php',
          type: 'POST',
          data: {language:lang},
          success: function (data) {location.reload();},
        });
      }
    </script>

     <!-- Collapse button -->
  <button class="navbar-toggler toggler-example border-0" onclick="toggleSideNav()"><i class="fas fa-bars fa-1x text-light"></i>
  </button>
  </div>
  

 
 </div>



</nav>
<!--/.Navbar-->



<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="toggleSideNav()">&times;</a>
  <a href="#"><?= $lang['home'] ?></a>
  <a href="#"><?= $lang['aboutus'] ?></a>
  <a href="#"><?= $lang['ourbusiness'] ?></a>
  <a href="#"><?= $lang['careers'] ?></a>
  <a href="#"><?= $lang['contactus'] ?></a>
  <a href="#"><?= $lang['ourpromotions'] ?></a>
  <a href="#"><?= $lang['awards'] ?></a>
</div>

<script type="text/javascript">
  function toggleSideNav() {
    // document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("mySidenav").classList.toggle("opensidenav");
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

  <!-- Collapsible content -->
  <!-- <div class="mySidenav" id="sidenav"> -->
<!--   <div class="collapse navbar-collapse" id="navbarSupportedContent1">
    <ul class="navbar-nav w-25 float-right">
      <li class="nav-item text-center border-bottom border-light bg-dark active">
        <a class="nav-link text-light py-3" href="#"><?= $lang['home'] ?></a>
      </li>
      <li class="nav-item text-center border-bottom border-light bg-dark">
        <a class="nav-link text-light py-3" href="#"><?= $lang['aboutus'] ?></a>
      </li>
      <li class="nav-item text-center border-bottom border-light bg-dark">
        <a class="nav-link text-light py-3" href="#"><?= $lang['ourbusiness'] ?></a>
      </li>
      <li class="nav-item text-center border-bottom border-light bg-dark">
        <a class="nav-link text-light py-3" href="#"><?= $lang['careers'] ?></a>
      </li>
      <li class="nav-item text-center border-bottom border-light bg-dark">
        <a class="nav-link text-light py-3" href="#"><?= $lang['contactus'] ?></a>
      </li>
      <li class="nav-item text-center border-bottom border-light bg-dark">
        <a class="nav-link text-light py-3" href="#"><?= $lang['ourpromotions'] ?></a>
      </li>
      <li class="nav-item text-center border-bottom border-light bg-dark">
        <a class="nav-link text-light py-3" href="#"><?= $lang['awards'] ?></a>
      </li>
    </ul>
  </div> -->
  <!-- Collapsible content -->
