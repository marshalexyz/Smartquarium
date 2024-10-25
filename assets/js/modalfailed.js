// modal failed start
const modalFailed = document.querySelector(".modalFailed");
const btnOkFailed = document.querySelector(".btnOkFailed");

function showModalFailed() {
  modalFailed.classList.remove("hidden");
  modalFailed.classList.add("flex");
}

btnOkFailed.addEventListener("click", () => {
  modalFailed.classList.remove("flex");
  modalFailed.classList.add("hidden");
  window.location.href = "../iot-project";
});
// modal failed end
