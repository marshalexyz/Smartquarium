// sidebar start
const hamburgerID = document.getElementById("hamburger");
const sidebarID = document.getElementById("sidebar");

function sideBarHandler(e) {
  e.stopPropagation();
  sidebarID.classList.toggle("right-0");
  sidebarID.classList.toggle("-right-[250px]");
}

function documentClickHandler(e) {
  if (!sidebarID.contains(e.target) && !hamburgerID.contains(e.target)) {
    sidebarID.classList.remove("right-0");
    sidebarID.classList.add("-right-[250px]");
  }
}

hamburgerID.addEventListener("click", sideBarHandler);
document.addEventListener("click", documentClickHandler);
// sibar end

// dark mode start
const btnDarkMode = document.querySelector("#btnDarkMode");
const iconDarkMode = document.querySelector("#iconDarkMode");
const htmlElement = document.querySelector("html");
const logoItenas = document.querySelector("#logoItenas");

// Mengecek status dark mode di localStorage saat halaman dimuat
const isDarkMode = localStorage.getItem("darkMode") === "true";
if (isDarkMode) {
  iconDarkMode.classList.toggle("fa-moon");
  iconDarkMode.classList.toggle("fa-sun");
  iconDarkMode.classList.toggle("text-white");
  iconDarkMode.classList.toggle("text-dark-primary");
  btnDarkMode.classList.toggle("bg-dark-primary");
  btnDarkMode.classList.toggle("bg-white");
  htmlElement.classList.toggle("dark");
  logoItenas.src = "../assets/images/itenas-logo-full-invert.png";
} else {
  logoItenas.src = "../assets/images/itenas-logo-full.png";
}

btnDarkMode.addEventListener("click", () => {
  // Menyimpan status dark mode ke localStorage
  const currentMode = htmlElement.classList.contains("dark");
  localStorage.setItem("darkMode", !currentMode);

  // Mengganti ikon dan menambah/menghapus kelas "dark" pada elemen HTML
  iconDarkMode.classList.toggle("fa-moon");
  iconDarkMode.classList.toggle("fa-sun");
  iconDarkMode.classList.toggle("text-white");
  iconDarkMode.classList.toggle("text-dark-primary");
  btnDarkMode.classList.toggle("bg-dark-primary");
  btnDarkMode.classList.toggle("bg-white");
  htmlElement.classList.toggle("dark");

  // Mengganti src gambar sesuai dengan mode terang atau gelap
  if (htmlElement.classList.contains("dark")) {
    logoItenas.src = "../assets/images/itenas-logo-full-invert.png";
  } else {
    logoItenas.src = "../assets/images/itenas-logo-full.png";
  }
});
// dark mode end
