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
//Review section
let selected = 0;
let stars = [];
let review = 0;
const starReview = document.querySelector("#stars");

const $reviewBtn = document.querySelector(".reviewBtn");
const $reviewMsg = document.querySelector(".reviewMsg");

for (let i = 1; i <= 5; i++) {
  stars[i] = document.querySelector(`.star${i}`);

  stars[i].addEventListener("click", (e) => {
    selected = i;
    review = i;
    starReview.value = review;

    $reviewMsg.style.display = "none";
    for (let j = 1; j <= i; j++) {
      stars[j].style.color = "orange";
      stars[j].classList.remove("fa-star-o");
      stars[j].classList.add("fa-star");
    }
  });

  stars[i].addEventListener("mouseover", (e) => {
    for (let j = 1; j <= i; j++) {
      stars[j].style.color = "orange";
      stars[j].classList.remove("fa-star-o");
      stars[j].classList.add("fa-star");
    }
    for (let j = i + 1; j <= 5; j++) {
      stars[j].style.color = "";
      stars[j].classList.remove("fa-star");
      stars[j].classList.add("fa-star-o");
    }
  });

  stars[i].addEventListener("mouseout", (e) => {
    for (let j = 1; j <= 5; j++) {
      if (j > selected) {
        stars[j].style.color = "";
        stars[j].classList.remove("fa-star");
        stars[j].classList.add("fa-star-o");
      } else if (j < selected) {
        stars[j + 1].style.color = "orange";
        stars[j + 1].classList.remove("fa-star-o");
        stars[j + 1].classList.add("fa-star");
      }
    }
  });
}

$reviewBtn.addEventListener("click", (e) => {
  if (!starReview.value) {
    e.preventDefault();
    $reviewMsg.style.display = "block";
  }
});

//Favorite
$favorite = document.querySelector(".favorite");
$favorite.addEventListener("click", (e) => {
  if ($favorite.style.color == "") {
    $favorite.style.color = "red";
  } else {
    $favorite.style.color = "";
  }
});
