<?php

session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['AdminID']) || empty($_SESSION['AdminID'])) {
    // Jika tidak login, arahkan ke halaman login
    header("Location: ../");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en" class="">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smartquarium</title>
    <link rel="icon" type="image/png" href="../assets/images/logo.png">
    <link rel="stylesheet" href="../dist/output.css" />

    <script src="https://kit.fontawesome.com/76e513ada2.js" crossorigin="anonymous"></script>
  </head>
  <body class="font-Poppins bg-color-bg lg:flex dark:bg-dark-scondary transition-all duration-150 ease-in-out">

    <!-- sidebar start -->
    <aside id="sidebar" class="w-56 h-screen bg-primary fixed top-[113px] sm:top-[127px] -right-[250px] z-[999] dark:bg-dark-five lg:block lg:left-0 lg:top-0 transition-all duration-150 ease-in-out">
      <div class="w-full lg:flex lg:items-center lg:px-[40px] lg:py-[20px] hidden">
        <img src="../assets/images/logo.png" alt="logo" class="mr-[10px] w-[40px] h-[25px] sm:w-[40px] sm:h-[35px]"/>
        <p class="text-md text-white font-normal sm:text-lg">smart<span class="font-bold text-logo-color">quarium</span></p>
      </div>
      <div class="w-full h-3/4 flex flex-col justify-between px-[20px] sm:h-[75%] lg:h-[80%]">
        <ul class="w-full mt-5 grid grid-cols-1 gap-5">
          <li class="">
            <a href="DashboardView.php" class="flex items-center gap-[20px] text-[14px] font-normal text-secondary hover:text-white px-3 transition-all duration-100">
              <i class="fa-solid fa-house-chimney"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="">
            <a href="MonitoringView.php" class="flex items-center gap-[20px] text-[14px] font-normal text-secondary hover:text-white px-3 transition-all duration-100">
              <i class="fa-solid fa-desktop"></i>
              <span>Monitoring</span>
            </a>
          </li>
          <li class="w-full bg-color-hover rounded-[4px] dark:bg-color-hover">
            <a href="../views/ControllerView.php" class="flex items-center gap-[20px] text-[14px] font-normal text-white px-3 py-2">
              <i class="fa-solid fa-gears"></i>
              <span>Controller</span>
            </a>
          </li>
          <li class="">
            <a href="DevelopInfoView.php" class="flex items-center gap-[20px] text-[14px] font-normal text-secondary hover:text-white px-3 transition-all duration-100">
              <i class="fa-solid fa-laptop-code"></i>
              <span>About Dev</span>
            </a>
          </li>
        </ul>
        <div class="">
          <a id="logOut" href="../controllers/LoginController.php?action=logout" class="flex items-center gap-[20px] text-[14px] font-normal text-secondary hover:text-white px-3 transition-all duration-100">
            <i class="fa-solid fa-right-from-bracket transform rotate-180"></i>
            <span>Logout</span>
          </a>
        </div>
      </div>
    </aside>
    <!-- sidebar end -->

    <!-- main start -->
    <main class="flex-1 lg:pl-[224px]">
      <!-- header start -->
      <header class="flex w-full items-center justify-between px-[40px] py-[10px] fixed bg-white shadow-sm z-[999] dark:bg-dark-primary lg:relative transition-all duration-150 ease-in-out">
        <div class="w-[150px] sm:w-[250px]">
          <h1 class="font-semibold text-2xl text-primary sm:text-3xl lg:text-4xl dark:text-slate-200">
            Controller
          </h1>
          <p class="font-normal text-[12px] text-primary sm:text-md lg:text-[14px] dark:text-dark-fourth">
            Smartquarium.
          </p>
        </div>
        <div class="">
          <a href="https://www.itenas.ac.id" target="_blank">
            <img id="logoItenas" src="../assets/images/itenas-logo-full.png" alt="itenas logo" class="w-[80px] sm:w-[100px] block"/>
          </a>
        </div>
      </header>
      <!-- header end -->

      <!-- navbar start -->
      <nav
        class="w-full flex items-center justify-between px-[40px] py-[10px] bg-primary fixed mt-[67px] z-[999] dark:bg-dark-five lg:hidden">
        <div class="flex items-center">
          <a href="#">
            <img src="../assets/images/logo.png" alt="logo" class="mr-[10px] w-[25px] h-[25px] sm:w-[40px] sm:h-[40px]"/>
          </a>
          <p class="text-md text-white font-normal sm:text-lg">
            ocean<span class="font-bold text-logo-color">Sage</span>
          </p>
        </div>
        <div class="">
          <i id="hamburger" class="fa-solid fa-bars font-bold text-2xl text-white cursor-pointer"></i>
        </div>
      </nav>
      <!-- navbar end -->

      <!-- section content start -->
      <section class="sectionContent px-[40px] pb-5 pt-[132px] sm:pt-[142px] lg:py-[20px] grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div class="w-full p-5 bg-white rounded-[8px] flex flex-col items-end gap-[10px] border-b-4 border-primary dark:bg-dark-primary dark:border-b-logo-color">
          <div class="w-full flex items-center justify-between gap-[10px]">
            <div class="flex flex-col gap-[10px]">
              <i class="fa-solid fa-cookie-bite text-4xl text-color-hover sm:text-5xl lg:text-5xl dark:text-slate-200"></i>
                <p class="text-sm font-medium sm:text-[16px] dark:text-dark-fourth">Smart feeding</p>
            </div>
            <div class="toggleOnOff  w-[70px] p-2 bg-logo-color rounded-full cursor-pointer flex items-center">
              <div class="toggleBall w-[20px] h-[20px] bg-white rounded-full shadow-md z-0 transition-all duration-150 ease-in-out"></div>
            </div>
          </div>
          <!-- <span class="showModalFeed text-lg text-logo-color font-medium cursor-pointer">Edit</span> -->
        </div>
        <div class="w-full p-5 bg-white rounded-[8px] flex flex-col items-end gap-[10px] border-b-4 border-light-yellow dark:bg-dark-primary">
          <div class="w-full flex items-center justify-between gap-[10px]">
            <div class="flex flex-col gap-[10px]">
              <i class="fa-solid fa-faucet-drip text-4xl text-color-hover sm:text-5xl lg:text-5xl dark:text-slate-200"></i>
                <p class="text-sm font-medium sm:text-[16px] dark:text-dark-fourth">Smart Water Pump</p>
            </div>
            <div class="toggleOnOff  w-[70px] p-2 bg-logo-color rounded-full cursor-pointer flex items-center">
              <div class="toggleBall w-[20px] h-[20px] bg-white rounded-full shadow-md z-0 transition-all duration-150 ease-in-out"></div>
            </div>
          </div>
          <!-- <span class="showModalPump text-lg text-logo-color font-medium cursor-pointer">Edit</span> -->
        </div>
      </section>
      <!-- section content end -->

      <!-- modal feed start -->
      <!-- <div class="modalFeed flex justify-center items-center h-screen w-full px-[40px] py-[20px] bg-black bg-opacity-30 backdrop-blur-[2px] fixed top-0 left-0 hidden">
        <div class="w-[260px] p-[20px] bg-white shadow-md rounded-[8px] flex flex-col justify-between gap-5 sm:w-[320px] lg:w-[380px] animate-scale-in">
          <h1 class="font-bold text-xl text-primary">Smart feeding</h1>
          <div class="">
            <p class="font-medium text-primary">First Time</p>
            <input type="time" name="firsttime" id="firstTimeFeed" class="outline-none focus:outline-none" value="11:35">
          </div>
          <div class="">
            <p class="font-medium text-primary">Second Time</p>
            <input type="time" name="secondtime" id="secondTimeFeed" class="outline-none focus:outline-none" value="">
          </div>
          <div class="">
            <p class="font-medium text-primary">Third Time</p>
            <input type="time" name="thirdtime" id="thirdTimeFeed" class="outline-none focus:outline-none" value="">
          </div>
          <div class="w-full flex items-center justify-end gap-5">
            <button type="submit" class="cancelFeed px-3 py-2 bg-danger rounded-md text-white font-bold">Cancel</button>
            <button type="submit" class="applyFeed px-3 py-2 bg-logo-color rounded-md text-white font-bold">Apply</button>
          </div>
        </div>
      </div> -->
      <!-- modal feed end -->

      <!-- modal pump start -->
      <!-- <div class="modalPump flex justify-center items-center h-screen w-full px-[40px] py-[20px] bg-black bg-opacity-30 backdrop-blur-[2px] fixed top-0 left-0 hidden">
        <div class="w-[260px] p-[20px] bg-white shadow-md rounded-[8px] flex flex-col justify-between gap-5 sm:w-[320px] lg:w-[380px] animate-scale-in">
          <h1 class="font-bold text-xl text-primary">Smart feeding</h1>
          <div class="">
            <p class="font-medium text-primary">First Time</p>
            <input type="time" name="time" id="firstTimePump" class="outline-none focus:outline-none" value="">
          </div>
          <div class="">
            <p class="font-medium text-primary">Second Time</p>
            <input type="time" name="secondtime" id="secondTimePump" class="outline-none focus:outline-none" value="">
          </div>
          <div class="">
            <p class="font-medium text-primary">Third Time</p>
            <input type="time" name="thirdtime" id="thirdTimePump" class="outline-none focus:outline-none" value="">
          </div>
          <div class="w-full flex items-center justify-end gap-5">
            <button type="submit" class="cancelPump px-3 py-2 bg-danger rounded-md text-white font-bold">Cancel</button>
            <button type="submit" class="applyPump px-3 py-2 bg-logo-color rounded-md text-white font-bold">Apply</button>
          </div>
        </div>
      </div> -->
      <!-- modal pump end -->
    </main>
    <!-- main end -->

    <!-- button dark mode start -->
    <div id="btnDarkMode" class="w-[35px] h-[35px] bg-dark-primary flex items-center justify-center rounded-l-[50px] fixed right-0 bottom-5 cursor-pointer ">
      <i id="iconDarkMode" class="fa-solid fa-moon text-white text-lg transition-all ease-in-out duration-150"></i>
    </div>
    <!-- button dark mode end -->

      <script src="../assets/js/script.js"></script>
      <script src="../assets/js/mqttws31.js"></script>
      <script src="../assets/js/mqtt-pub.js"></script>
  </body>
</html>
