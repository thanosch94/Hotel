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
