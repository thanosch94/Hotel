const $email = document.querySelector("#email");
const $emailConf = document.querySelector("#emailConf");
const $password = document.querySelector("#password");
const $passwordConf = document.querySelector("#passwordConf");
const $btnSubmit = document.querySelector(".BtnSubmit");

const $emailMsg = document.querySelector(".emailMsg");
const $passMsg = document.querySelector(".passMsg");
$btnSubmit.addEventListener("click", (e) => {
  if (
    !(
      $email.value == $emailConf.value && $password.value == $passwordConf.value
    )
  ) {
    e.preventDefault();
  } else {
    $btnSubmit.submit();
  }
});

$emailConf.addEventListener("input", (e) => {
  if ($email.value !== $emailConf.value) {
    $emailMsg.style.display = "block";
  } else {
    $emailMsg.style.display = "none";
  }
});

$passwordConf.addEventListener("input", (e) => {
  if ($password.value !== $passwordConf.value) {
    console.log("fgdg");
    $passMsg.style.display = "block";
  } else {
    $passMsg.style.display = "none";

    console.log("fgdg");

    console.log("fgdg");
    console.log("fgdg");
  }
});
