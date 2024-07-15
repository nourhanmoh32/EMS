// alert after press request buttons
function approveVacation() {
    alert("تم قبول طلب الأجازة بنجاح!");
}

function rejectVacation() {
    alert("تم رفض طلب الأجازة.");
}
// ---------------------------------------------------------

// toggle sidebar
const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});