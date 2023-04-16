(function ($) {
  $(document).on("input", ".checkInDate, .checkOutDate", function (e) {
    const checkInDate = document.querySelector(".checkInDate");
    const checkOutDate = document.querySelector(".checkOutDate");
    const changeDates = document.querySelector(".changeDates");
    const element = document.querySelector(`.Btnajax`);
    $.ajax("actions/reserved.php", {
      type: "POST",
      dataType: "html",
      data: { checkin: checkInDate.value, checkout: checkOutDate.value },
    }).done(function (result) {
      console.log(result);
      element.outerHTML = result;

      if (
        result ==
        '<button class="Btnajax col-2 btn btn-warning" type="button" >Reserved</button>'
      ) {
        changeDates.innerHTML =
          '<p class="text-center" style="color:red">*Please change dates</p>';
      } else {
        changeDates.innerHTML = "";
      }
    });
  });
})(jQuery);
