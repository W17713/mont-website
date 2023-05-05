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
    console.log(formData);
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
          $("#namestatus").empty().append(
            '<div class="help-block">' + data.errors.NameErr + "</div>"
          );
        }

        if (data.errors.numberErr) {
          //$("#name-group").addClass("has-error");
          $("#numstatus").empty().append(
            '<div class="help-block">' + data.errors.numberErr + "</div>"
          );
        }
  
        if (data.errors.emailErr) {
          $("#emailstatus").empty().append(
            '<div class="help-block">' + data.errors.emailErr + "</div>"
          );
        }

        if (data.errors.interestErr) {
          $("#intstatus").empty().append(
            '<div class="help-block">' + data.errors.interestErr + "</div>"
          );
        }

        if (data.errors.locationErr) {
          $("#locstatus").empty().append(
            '<div class="help-block">' + data.errors.locationErr + "</div>"
          );
        }
  
        if (data.errors.msgErr) {
          $("#msgstatus").empty().append(
            '<div class="help-block">' + data.errors.msgErr + "</div>"
          );
        }
      } else {
        $("#response").empty().append(
          '<span style=" font-size: 2em;text-align:center;color:white;">' + data.message + "</span>"
        );
        $("#Name").val('');
        $("#number").val('');
        $("#email").val('');
        $("#interest").val('');
        $("#location").val('');
        $("#Message").val('');
        $("#namestatus").val('');
        $("#numstatus").val('');
        $("#emailstatus").val('');
        $("#intstatus").val('');
        $("#locstatus").val('');
        $("#msgstatus").val('');
      }
    }).fail(function (data) {
      console.log(data);
      $("#response").empty().append(
        '<span style=" font-size: 2em;text-align:center;">Could not reach server, please try again later.</span>'
      );
    });

    event.preventDefault();

})
});

