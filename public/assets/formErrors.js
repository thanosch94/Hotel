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
