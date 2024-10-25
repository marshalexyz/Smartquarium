<?php

session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['AdminID']) || empty($_SESSION['AdminID'])) {
    // Jika tidak login, arahkan ke halaman login
    header("Location: ../auth/login");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en" class="">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smartquarium</title>
    <link rel="stylesheet" href="../public/dist/output.css" />

    <script src="https://kit.fontawesome.com/76e513ada2.js" crossorigin="anonymous"></script>
  </head>
  <body class="font-Poppins bg-color-bg lg:flex transition-all duration-150 ease-in-out">

    <!-- sidebar start -->
    <aside id="sidebar" class="w-56 h-screen bg-primary fixed top-[113px] sm:top-[127px] -right-[250px] lg:block lg:left-0 lg:top-0 transition-all duration-150 ease-in-out">
      <div class="w-full lg:flex lg:items-center lg:px-[40px] lg:py-[20px] hidden">
        <img src="../assets/images/logo.png" alt="logo" class="mr-[10px] w-[40px] h-[25px] sm:w-[40px] sm:h-[35px]"/>
        <p class="text-md text-white font-normal sm:text-lg">ocean<span class="font-bold text-logo-color">Sage</span></p>
      </div>
      <ul class="w-full px-[20px] grid grid-cols-1 gap-10">
        <li class="mt-5">
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
        <li class="">
          <a href="../views/ControllerView.php" class="flex items-center gap-[20px] text-[14px] font-normal text-secondary hover:text-white px-3 transition-all duration-100">
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
        <li class="place-self-stretch">
          <a href="../controllers/LoginController.php?action=logout" class="flex items-center gap-[20px] text-[14px] font-normal text-secondary hover:text-white px-3 transition-all duration-100">
            <i class="fa-solid fa-right-from-bracket transform rotate-180"></i>
            <span>Logout</span>
          </a>
        </li>
      </ul>
    </aside>
    <!-- sidebar end -->

    <!-- main start -->
    <main class="flex-1 lg:pl-[224px]">
      <!-- header start -->
      <header class="flex w-full items-center justify-between px-[40px] py-[10px] fixed bg-white lg:relative transition-all duration-150 ease-in-out">
        <div class="w-[150px] sm:w-[250px]">
          <h1 class="font-semibold text-2xl text-primary sm:text-3xl lg:text-4xl">Notifications</h1>
          <p class="font-normal text-[12px] text-primary sm:text-md lg:text-[16px]">Lorem ipsum, dolor sit amet.</p>
        </div>
        <div class="">
          <a href="https://www.itenas.ac.id" target="_blank">
            <img src="../assets/images/itenas-logo-full.png" alt="itenas logo" class="w-[80px] sm:w-[100px] block"/>
          </a>
        </div>
      </header>
      <!-- header end -->

      <!-- navbar start -->
      <nav class="w-full flex items-center justify-between px-[40px] py-[10px] bg-primary fixed mt-[67px] lg:hidden">
        <div class="flex items-center">
          <a href="#">
            <img src="../assets/images/logo.png" alt="logo" class="mr-[10px] w-[25px] h-[25px] sm:w-[40px] sm:h-[40px]"/>
          </a>
          <p class="text-md text-white font-normal sm:text-lg">ocean<span class="font-bold text-logo-color">Sage</span></p>
        </div>
        <div class="">
          <i id="hamburger" class="fa-solid fa-bars font-bold text-2xl text-white cursor-pointer"></i>
        </div>
      </nav>
      <!-- navbar end -->

      <!-- section content start -->
      <section class="px-[40px] pb-5 pt-[132px] sm:pt-[142px] lg:py-[20px] grid grid-cols-1 gap-5">
        <div class="w-full px-5 py-5 bg-white rounded-[16px] shadow-sm flex items-center justify-between">
          <div class="flex flex-col gap-[10px]">
              <div class="flex items-center gap-[10px]">
              <i id="" class="fa-solid fa-triangle-exclamation font-bold text-2xl text-danger"></i>
              <p class="font-medium text-sm sm:text-[16px]">Suhu terlalu rendah.</p>
            </div>
            <span>12:00</span>
          </div>
          <i class="fa-solid fa-trash font-bold text-lg text-white cursor-pointer p-[10px] bg-logo-color rounded-[8px] hover:bg-light-yellow hover:text-primary"></i>
        </div>
      </section>
      <!-- section content end -->
    </main>
    <!-- main end -->

    <script src="../assets/js/script.js"></script>
  </body>
</html>
