const $Btn = document.querySelector(".submitBtn");
const $requiredMsg = document.querySelectorAll(".requiredMsg");
const $required = document.querySelectorAll(".required");

//Hide all error messages
$requiredMsg.forEach((errorMsg) => {
  errorMsg.style.display = "none";
});

$Btn.addEventListener("click", (e) => {
  e.preventDefault();

  $required.forEach((element) => {
    const inputParent = element.parentNode; //Get parent element
    const errorMsg = inputParent.querySelector(".requiredMsg");
    if (element.value === "") {
      errorMsg.style.display = "block";
    } else {
      errorMsg.style.display = "none";
    }
  });

  const allInputsFilled = Array.from($required).every(
    (element) => element.value !== ""
  );
  if (allInputsFilled) {
    $Btn.closest("form").submit();
  }
});

$required.forEach((element) => {
  element.addEventListener("input", () => {
    const inputParent = element.parentNode;
    const errorMsg = inputParent.querySelector(".requiredMsg");
    errorMsg.style.display = element.value === "" ? "block" : "none";
  });
});

//Keep values in form after search

let $guestsInput = document.querySelector("#guests");
if ($guestsInput) {
  $guestsInput.value = $guests;
}

let $room_typeInput = document.querySelector("#room_type");
if ($room_typeInput) {
  $room_typeInput.value = $roomtype;
}

let $cityInput = document.querySelector("#city");
if ($cityInput) {
  $cityInput.value = $city;
}

let $checkinInput = document.querySelector("#checkin");
if ($checkinInput) {
  $checkinInput.value = $checkin;
}
let $checkoutInput = document.querySelector("#checkout");
if ($checkoutInput) {
  $checkoutInput.value = $checkout;
}
