//Autocomplete Check-in and Check-out dates in room page
const checkInDate = document.querySelector(".checkInDate");
const checkOutDate = document.querySelector(".checkOutDate");

checkInDate.value = checkin;
checkOutDate.value = checkout;

//Display calculation of total
let date1 = new Date(checkin);
let date2 = new Date(checkout);
const total = document.querySelector(".calculateTotal");
const totalInput = document.querySelector(".total");
checkInDate.addEventListener("input", (e) => {
  date1 = new Date(e.target.value);
  let difference = date2.getTime() - date1.getTime();

  let TotalDays = Math.ceil(difference / (1000 * 3600 * 24));
  console.log(TotalDays);

  const totalPrice = TotalDays * price;
  totalInput.value = totalPrice;
  total.innerHTML = `<div class="col-12 row text-center">
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
});

checkOutDate.addEventListener("input", (e) => {
  date2 = new Date(e.target.value);
  let difference = date2.getTime() - date1.getTime();

  let TotalDays = Math.ceil(difference / (1000 * 3600 * 24));
  console.log(TotalDays);

  const totalPrice = TotalDays * price;
  totalInput.value = totalPrice;

  total.innerHTML = `<div class="col-12 row text-center">
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
});
const myModal = document.getElementById("myModal");
const myInput = document.getElementById("myInput");
const BtnSubmit = document.getElementById(".btnSubmit");

myModal.addEventListener("shown.bs.modal", function () {
  myInput.focus();
});
