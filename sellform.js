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
              $("#Valuation-type").append(
                '<div class="help-block">' + data.errors.valuationErr + "</div>"
              );
            }

            if (data.errors.desctiprionErr) {
                //$("#name-group").addClass("has-error");
                $("#description").append(
                  '<div class="help-block">' + data.errors.descriptionErr + "</div>"
                );
              }
    
            if (data.errors.bedErr) {
              //$("#name-group").addClass("has-error");
              $("#Number-of-beds").append(
                '<div class="help-block">' + data.errors.numberErr + "</div>"
              );
            }
      
            if (data.errors.bathErr) {
              $("#Number-of-baths").append(
                '<div class="help-block">' + data.errors.emailErr + "</div>"
              );
            }
    
            if (data.errors.nameErr) {
              $("#name").append(
                '<div class="help-block">' + data.errors.nameErr + "</div>"
              );
            }
    
            if (data.errors.cityErr) {
              $("#city").append(
                '<div class="help-block">' + data.errors.cityErr + "</div>"
              );
            }
      
            if (data.errors.addressErr) {
              $("#address").append(
                '<div class="help-block">' + data.errors.addressErr + "</div>"
              );
            }

            if (data.errors.stateErr) {
                $("#State").append(
                  '<div class="help-block">' + data.errors.stateErr + "</div>"
                );
              }

            if (data.errors.zipErr) {
                $("#zipcode").append(
                  '<div class="help-block">' + data.errors.zipErr + "</div>"
                );
              }

            if (data.errors.emailErr) {
                $("#email").append(
                  '<div class="help-block">' + data.errors.emailErr + "</div>"
                );
              }
          } else {
            $("form").html(
              '<div class="alert alert-success">' + data.message + "</div>"
            );
          }
        }).fail(function (data) {
          console.log(data);
          $("form").html(
            '<div class="alert alert-danger">Could not reach server, please try again later.</div>'
          );
        });
    
        event.preventDefault();
    
    })
    });
    
    