$(document).ready(function () {
  $("#staff_id").hide();
  $("#student_id").hide();
  $("#other").hide();

  $("#form input[type='radio']").on("change", function () {
    var userType = $("input[name=userType]:checked", "#form").val();
    if (userType == "staff") {
      $("#staff_id").show();
      hide(["#student_id"]);
    } else if (userType == "student") {
      $("#student_id").show();
      hide(["#staff_id"]);
    } else {
      hide(["#staff_id", "#student_id"]);
    }
    $("#other").show();
  });

  function hide(arr) {
    arr.forEach((e) => {
      $(e).find("input").val("");
      $(e).hide();
    });
  }

  $("select[name='branch']").on("change", function () {
    $.ajax({
      type: "GET",
      url: "/aduan",
      data: { branch: $(this).val() },
      dataType: "text",
    }).done(function (e) {
      $(e).replaceAll("#location");
    });
  });
});
