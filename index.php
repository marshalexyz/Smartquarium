<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smartquarium</title>
    <link rel="icon" type="image/png" href="../iot-project/assets/images/logo.png">
    <link rel="stylesheet" href="dist/output.css" />
    <script src="https://kit.fontawesome.com/76e513ada2.js" crossorigin="anonymous"></script>
</head>
<body class="font-QuickSand bg-color-bg">
    <header class="w-full px-10 py-5 bg-white shadow-sm flex items-center justify-between fixed">
        <div class="flex items-center gap-[10px]">
            <img class="w-8 h-8w-8" src="../../iot-project/assets/images/logo.png" alt="logo">
            <p class="text-md text-primary font-bold">smart<span class="font-bold text-logo-color">quarium</span></p>
        </div>
        <div class="">
        <a href="https://www.itenas.ac.id" target="_blank">
            <img src="../../iot-project/assets/images/itenas-logo-full.png" alt="itenas logo" class="w-[80px] sm:w-[100px] block"/>
        </a>
        </div>
    </header>
    <main>
        <section class="w-full h-screen flex px-5 items-center justify-center">
            <form action="../../iot-project/controllers/LoginController.php" method="post" class="w-[90%] p-10 bg-white rounded-[16px] shadow-md flex flex-col justify-between gap-5 sm:w-[70%] md:w-[50%] lg:w-[35%]">
                <h1 class="font-bold text-2xl text-center text-primary">LOGIN</h1>
                <div class="w-full">
                    <label class="font-medium text-sm text-primary" for="username">Username</label>
                    <input class="w-full p-3 border-b-[1px] border-slate-200 font-light text-sm focus:outline-none mb-5" type="text" name="username" id="username" placeholder="Enter your username" require>
                    <label class="font-medium text-sm text-primary" for="password">Password</label>
                    <input class="w-full p-3 border-b-[1px] border-slate-200 font-light text-sm focus:outline-none" type="password" name="password" id="password" placeholder="Enter your password" require>
                </div>
                <button class="py-3 bg-green rounded-[4px] font-bold text-lg text-white hover:bg-color-hover" type="submit">LOGIN</button>
            </form>
        </section>
    </main>

    <div class="modalFailed justify-center items-center h-screen w-full px-[40px] py-[20px] bg-black bg-opacity-30 backdrop-blur-[2px] fixed top-0 left-0 hidden">
        <div class="w-[260px] p-[20px] bg-white shadow-md rounded-[8px] flex flex-col items-center justify-between gap-5 lg:w-[300px] animate-scale-in">
            <h1 class="font-bold text-xl text-primary">Login failed</h1>
            <i class="fa-solid fa-circle-xmark text-light-red text-5xl"></i>
            <span class="btnOkFailed w-1/2 px-3 py-2 bg-primary hover:bg-color-hover rounded-md text-white text-center font-bold cursor-pointer">OK</span>
        </div>
    </div>

    <?php
        if (isset($_GET['loginFailed']) && $_GET['loginFailed'] === 'true') {
            echo '<script src="../../iot-project/assets/js/modalfailed.js"></script>';
            echo '<script>showModalFailed();</script>';
        }
    ?>
    
</body>
</html>