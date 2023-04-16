//Autocomplete Check-in and Check-out dates in room page
const checkInDate = document.querySelector(".checkInDate");
const checkOutDate = document.querySelector(".checkOutDate");

checkInDate.value = checkin;
checkOutDate.value = checkout;

//Display calculation of total
const total = document.querySelector(".calculateTotal");
const totalInput = document.querySelector(".total");

let date1 = new Date(checkInDate.value);
let date2 = new Date(checkOutDate.value);
let difference = date2.getTime() - date1.getTime();
let TotalDays = Math.ceil(difference / (1000 * 3600 * 24));

const totalPrice = TotalDays * price;
totalInput.value = totalPrice;
const CalcText = (TotalDays, price, totalPrice) => {
  return `<div class="col-12 row text-center">
  <h5 class="col-3">Count of days</h5>
  <h5 class="col-1"></h5>
  <h5 class="col-3">Price per day</h5>
  <h5 class="col-2"></h5>
  <h5 class="col-3">Total Price</h5>
</div>
<div class="col-12 row text-center">
  <h5 class="col-3">${TotalDays}</h5>
  <h5 class="col-1"></h5>
  <h5 class="col-3">${price}€</h5>
  <h5 class="col-2"></h5>
  <h5 class="col-3">${totalPrice}€</h5>
</div>`;
};
if (checkInDate.value) {
  total.innerHTML = CalcText(TotalDays, price, totalPrice);
}

checkInDate.addEventListener("input", (e) => {
  function formatDate(date = new Date()) {
    const year = date.toLocaleString("default", { year: "numeric" });
    const month = date.toLocaleString("default", { month: "2-digit" });
    const day = date.toLocaleString("default", { day: "2-digit" });

    return [year, month, day].join("-");
  }

  function addDays(date, days) {
    let result = new Date(date);
    result.setDate(result.getDate() + days);
    return result;
  }
  date1 = new Date(e.target.value);
  let dateplus1 = addDays(date1, 1);

  checkOutDate.min = formatDate((date = new Date(dateplus1)));
  if (date1 > new Date(checkOutDate.value) || !checkOutDate.value) {
    checkOutDate.value = formatDate((date = new Date(dateplus1)));
  }
  let date2 = new Date(checkOutDate.value);
  let difference = date2.getTime() - date1.getTime();

  let TotalDays = Math.ceil(difference / (1000 * 3600 * 24));

  const totalPrice = TotalDays * price;
  totalInput.value = totalPrice;
  total.innerHTML = CalcText(TotalDays, price, totalPrice);
});

checkOutDate.addEventListener("input", (e) => {
  date1 = new Date(checkInDate.value);
  date2 = new Date(e.target.value);
  let difference = date2.getTime() - date1.getTime();

  let TotalDays = Math.ceil(difference / (1000 * 3600 * 24));

  const totalPrice = TotalDays * price;
  totalInput.value = totalPrice;
  total.innerHTML = CalcText(TotalDays, price, totalPrice);
});

//Activates modal on click of reserve button
const myModal = document.getElementById("myModal");
const myInput = document.getElementById("myInput");
const BtnSubmit = document.getElementById(".btnSubmit");

if (myModal) {
  myModal.addEventListener("shown.bs.modal", function () {
    myInput.focus();
  });
}

//Review section
addEventListener("input", (e) => {});
