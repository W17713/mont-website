$(document).ready(function () {
    $("form").submit(function (event) {
    var formData = {
        description: $("#description").val(),
        valuation: $("#Valuation-type").val(),
        beds: $("#Number-of-beds").val(),
        baths: $("#Number-of-baths").val(),
        address: $("#address").val(),
        city: $("#city").val(),
        state: $("#State").val(),
        zipcode: $("#zipcode").val(),
        name: $("#name").val(),
        email: $("#email").val(),
        };
        
        console.log(formData);
    
        $.ajax({
        type: "POST",
        url: "postsellform.php",
        data: formData,
        dataType: "json",
        encode: true,
        }).done(function (data) {
        console.log(data);
        if (!data.success) {
            if (data.errors.valuationErr) {
              //$("#name-group").addClass("has-error");
              $("#valuationsts").append(
                '<div class="help-block">' + data.errors.valuationErr + "</div>"
              );
            }

            if (data.errors.desctiprionErr) {
                //$("#name-group").addClass("has-error");
                $("#descriptionsts").append(
                  '<div class="help-block">' + data.errors.descriptionErr + "</div>"
                );
              }
    
            if (data.errors.bedErr) {
              //$("#name-group").addClass("has-error");
              $("#bednbathsts").append(
                '<div class="help-block">' + data.errors.numberErr + "</div>"
              );
            }
      
    
            if (data.errors.nameErr) {
              $("#namests").append(
                '<div class="help-block">' + data.errors.nameErr + "</div>"
              );
            }
    
            if (data.errors.cityErr) {
              $("#citysts").append(
                '<div class="help-block">' + data.errors.cityErr + "</div>"
              );
            }
      
            if (data.errors.addressErr) {
              $("#addresssts").append(
                '<div class="help-block">' + data.errors.addressErr + "</div>"
              );
            }

            if (data.errors.stateErr) {
                $("#statests").append(
                  '<div class="help-block">' + data.errors.stateErr + "</div>"
                );
              }

            if (data.errors.zipErr) {
                $("#zipcodests").append(
                  '<div class="help-block">' + data.errors.zipErr + "</div>"
                );
              }

            if (data.errors.emailErr) {
                $("#emailsts").append(
                  '<div class="help-block">' + data.errors.emailErr + "</div>"
                );
              }
          } else {
            $("#response").empty().append(
              '<span style=" font-size: 2em;text-align:center;">' + data.message + "</span>"
            );
            $("#description").val('');
            $("#Valuation-type").val('');
            $("#Number-of-beds").val('');
            $("#Number-of-baths").val('');
            $("#address").val('');
            $("#city").val('');
            $("#State").val('');
            $("#zipcode").val('');
            $("#name").val('');
            $("#email").val('');

          }
        }).fail(function (data) {
          console.log(data);
          $("#response").empty().append(
            '<span style=" font-size: 2em;">Could not reach server, please try again later.</span>'
          );
        });
    
        event.preventDefault();
    
    })
    });
    
    