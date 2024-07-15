// toggle sidebar
const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
});
// ---------------------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", () => {
    function loadEmployeeCards() {
        const cardsData = JSON.parse(localStorage.getItem("employeeCards")) || [];
        cardsData.forEach((data) => createCard(data));
    }

    function createCard(data) {
        const newCard = document.createElement("div");
        newCard.classList.add("card", "mb-3");
        newCard.innerHTML = `
            <div class="row g-0">
                <div class="emp-img col-md-4">
                    <img src="photos/person new.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title name">${data.name}</h3>
                        <h3 class="card-title department">${data.department}</h3>
                        <h3 class="card-title salary">${data.salary}</h3>
                        <h3 class="card-title phone">${data.phone}</h3>
                    </div>
                </div>
            </div>
            <button class="delete-emp">حذف الموظف</button>
            <button class="edit-emp">تعديل البيانات</button>
        `;
        document.getElementById("container").appendChild(newCard);
        newCard.querySelector(".delete-emp").addEventListener("click", deleteCard);
    }

    function deleteCard(event) {
        const card = event.target.closest(".card");
        card.remove();
        saveEmployeeCards();
    }
    function saveEmployeeCards() {
        const cards = document.querySelectorAll("#container .card");
        const cardsData = Array.from(cards).map((card) => ({
            name: card.querySelector(".name").textContent.trim(),
            middleName: card.querySelector(".middle-name").textContent.trim(),
            lastName: card.querySelector(".last-name").textContent.trim(),
            email: card.querySelector(".email").textContent.trim(),
            department: card.querySelector(".department").textContent.trim(),
            salary: card.querySelector(".salary").textContent.trim(),
            phone: card.querySelector(".phone").textContent.trim(),
        }));
        localStorage.setItem("employeeCards", JSON.stringify(cardsData));
    }
    

    document.getElementById("addDivButton").addEventListener("click", addNewEmployeeCard);
    loadEmployeeCards();

    
function addNewEmployeeCard() {
    window.location.href = "/emp_info";
    
        const data = {
            name: 'الاسم: ',
            department: 'القسم: ',
            salary: 'الراتب: ',
            phone: 'رقم الهاتف: '
        };
        createCard(data);
        saveEmployeeCards();
    
}
});
