$(document).ready(function () {
$("form").submit(function (event) {
var formData = {
    Name: $("#Name").val(),
    phonenumber: $("#number").val(),
    email: $("#email").val(),
    interest: $("#interest").val(),
    location: $("#location").val(),
    Message: $("#Message").val(),
    };

    $.ajax({
    type: "POST",
    url: "postmail.php",
    data: formData,
    dataType: "json",
    encode: true,
    }).done(function (data) {
    console.log(data);
    if (!data.success) {
        if (data.errors.NameErr) {
          //$("#name-group").addClass("has-error");
          $("#Name").append(
            '<div class="help-block">' + data.errors.NameErr + "</div>"
          );
        }

        if (data.errors.numberErr) {
          //$("#name-group").addClass("has-error");
          $("#number").append(
            '<div class="help-block">' + data.errors.numberErr + "</div>"
          );
        }
  
        if (data.errors.emailErr) {
          $("#email").append(
            '<div class="help-block">' + data.errors.emailErr + "</div>"
          );
        }

        if (data.errors.interestErr) {
          $("#interest").append(
            '<div class="help-block">' + data.errors.interestErr + "</div>"
          );
        }

        if (data.errors.locationErr) {
          $("#location").append(
            '<div class="help-block">' + data.errors.locationErr + "</div>"
          );
        }
  
        if (data.errors.msgErr) {
          $("#Message").append(
            '<div class="help-block">' + data.errors.msgErr + "</div>"
          );
        }
      } else {
        $("form").html(
          '<div class="alert alert-success">' + data.message + "</div>"
        );
      }
    }).fail(function (data) {
      $("form").html(
        '<div class="alert alert-danger">Could not reach server, please try again later.</div>'
      );
    });

    event.preventDefault();

})
});

