'use strict';

//VARIABLES
var checkbox = $("#checkbox");
var password = $("#password");


//FONCTION
  $(document).ready(function() {
      checkbox.click(function() {
          if(checkbox.prop("checked")) {
              password.attr("type", "text");
          } else {
              password.attr("type", "password");
          }
      });
  });
