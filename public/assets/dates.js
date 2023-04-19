//Display in check-out input +1 day when user sets the check-in date
const checkInDate = document.querySelector(".checkInDate");
const checkOutDate = document.querySelector(".checkOutDate");
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
});
