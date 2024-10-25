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
      <aside id="sidebar" class="w-56 h-screen bg-primary fixed top-[113px] sm:top-[127px] -right-[250px] z-[999] lg:block lg:left-0 lg:top-0 dark:bg-dark-five transition-all duration-150 ease-in-out">
        <div class="w-full lg:flex lg:items-center lg:px-[40px] lg:py-[20px] hidden">
          <img src="../assets/images/logo.png" alt="logo" class="mr-[10px] w-[40px] h-[25px] sm:w-[40px] sm:h-[35px]"/>
          <p class="text-md text-white font-normal sm:text-lg">smart<span class="font-bold text-logo-color">quarium</span></p>
        </div>
        <div class="w-full h-3/4 flex flex-col justify-between px-[20px] sm:h-[75%] lg:h-[80%]">
          <ul class="w-full mt-5 grid grid-cols-1 gap-5">
            <li class="w-full bg-color-hover rounded-[4px] dark:bg-color-hover">
              <a href="#" class="flex items-center gap-[20px] text-[14px] font-normal text-white py-2 px-3">
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
        <header class="flex w-full items-center justify-between px-[40px] py-[10px] z-[999] fixed bg-white shadow-sm lg:relative transition-all duration-150 ease-in-out dark:bg-dark-primary">
          <div class="w-[150px] sm:w-[250px]">
            <h1 class="font-semibold text-2xl text-primary sm:text-3xl lg:text-4xl dark:text-slate-200">
              Dashboard
            </h1>
            <p class="font-normal text-[12px] text-primary sm:text-md lg:text-[14px] dark:text-dark-fourth">
              Smartquarium.
            </p>
          </div>
          <div class="">
            <a href="https://www.itenas.ac.id" target="_blank">
              <img id="logoItenas"
                src="../assets/images/itenas-logo-full.png"
                alt="itenas logo"
                class="w-[80px] sm:w-[100px] block"
              />
            </a>
          </div>
        </header>
        <!-- header end -->

        <!-- navbar start -->
        <nav class="w-full flex items-center justify-between px-[40px] py-[10px] bg-primary fixed mt-[67px] lg:hidden z-[999] dark:bg-dark-five">
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
          <div class="w-full grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <div class="p-5 rounded-[16px] bg-white border-b-4 border-logo-color dark:bg-dark-primary">
              <h3 class="font-medium text-lg text-primary dark:text-dark-fourth">Temperature</h3>
              <div id="temp" class="h-[180px] text-lg z-0"></div>
              <p id="infoTemp" class="text-center text-[14px] font-medium dark:text-dark-fourth"></p>
            </div>
            <div class="p-5 rounded-[16px] bg-white border-b-4 border-light-yellow dark:bg-dark-primary">
              <h3 class="font-medium text-lg text-primary dark:text-dark-fourth">Clarity</h3>
              <div id="clarity" class="h-[180px] text-lg z-0"></div>
              <p id="infoClarity" class="text-center text-[14px] font-medium dark:text-dark-fourth"></p>
            </div>
            <div class="p-5 rounded-[16px] bg-white border-b-4 border-light-red dark:bg-dark-primary">
              <h3 class="font-medium text-lg text-primary dark:text-dark-fourth">Water level</h3>
              <div id="distance" class="h-[180px] text-lg z-0"></div>
              <p id="infoDistance" class="text-center text-[14px] font-medium dark:text-dark-fourth"></p>
            </div>
          </div>
          <div class="p-5 bg-white rounded-[16px] border-b-4 border-light-yellow flex flex-col justify-between gap-5 dark:bg-dark-primary">
            <div class="">  
              <label for="yearSelector" class="text-primary text-md font-medium dark:text-dark-fourth">Select Years</label>
              <select id="yearSelector" class="focus:outline-none dark:bg-dark-primary dark:text-dark-fourth">
              <?php
                include '../config/connection.php';

                $databaseConnection = new DatabaseConnection();
                $connection = $databaseConnection->getConnection();

                // Prepared statement untuk mengambil tahun
                $query = "SELECT DISTINCT EXTRACT(YEAR FROM timestamp) AS year FROM data_sensor ORDER BY year DESC";
                $stmt = $connection->prepare($query);

                // Eksekusi prepared statement
                $stmt->execute();

                // Binding result variables
                $stmt->bind_result($year);

                // Fetching hasil query dan menambahkan ke opsi dropdown
                while ($stmt->fetch()) {
                  // Menggunakan htmlspecialchars() untuk menghindari XSS attacks
                  $escapedYear = htmlspecialchars($year, ENT_QUOTES, 'UTF-8');
                  echo "<option value=\"$escapedYear\">$escapedYear</option>";
                }

                // Tutup prepared statement dan koneksi database
                $stmt->close();
                $connection->close();
              ?>
              </select>
            </div>
            <p id="notFoundData" class="text-[12px] text-slate-500 font-Poppins hidden md:text-[14px] md:font-medium lg:text-[16px]">No data available for the selected year</p>
            <div id="chartDiv" class="">
              <canvas id="chartTemp" height="188" class=""></canvas>
            </div>
          </div>
        </section>
        <!-- section content end -->
      </main>
      <!-- main end -->

      <!-- connected notif start -->
      <div id="notifConnected" class="w-[250px] h-14 fixed bottom-5 -right-[100%] transition-all ease-in-out duration-200">
        <div class="w-full h-full bg-green-500 shadow-md flex items-center justify-center gap-5 rounded-[8px]">
          <i class="fa-solid fa-circle-check text-xl text-white"></i>
          <p class="text-xl text-white">Connected</p>
        </div>
      </div>
      <!-- connected notif end -->

      <!-- connected failed notif start -->
      <div id="notifConnectedFailed" class="w-[250px] h-14 fixed bottom-5 -right-[100%] transition-all ease-in-out duration-200">
        <div class="w-full h-full bg-light-red shadow-md flex items-center justify-center gap-5 rounded-[8px]">
          <i class="fa-solid fa-circle-xmark text-xl text-white"></i>
          <p class="text-xl text-white">Failed to connect</p>
        </div>
      </div>
      <!-- connected failed notif end -->

      <!-- Reconnect notif start -->
      <div id="notifReconnect" class="w-[250px] h-14 fixed bottom-5 -right-[100%] transition-all ease-in-out duration-200">
        <div class="w-full h-full bg-light-yellow shadow-md flex items-center justify-center gap-5 rounded-[8px]">
          <i class="fa-solid fa-arrow-rotate-right text-xl text-white"></i>
          <p class="text-xl text-white">Reconnecting</p>
        </div>
      </div>
      <!-- Reconnect notif end -->

      <!-- button dark mode start -->
      <div id="btnDarkMode" class="w-[35px] h-[35px] bg-dark-primary flex items-center justify-center rounded-l-[50px] fixed right-0 bottom-5 cursor-pointer ">
        <i id="iconDarkMode" class="fa-solid fa-moon text-white text-lg transition-all ease-in-out duration-150"></i>
      </div>
      <!-- button dark mode end -->

      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
      <script src="https://code.jscharting.com/latest/jscharting.js"></script>
      <script src="https://code.jscharting.com/latest/jscharting-widgets.js"></script>
      <script src="../assets/js/script.js"></script>
      <script src="../assets/js/chartTemp.js"></script>
      <script src="../assets/js/mqttws31.js"></script>
      <script src="../assets/js/mqtt-subs.js"></script>
    </body>
  </html>
