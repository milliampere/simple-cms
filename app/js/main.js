"use strict";

var password = document.getElementById("password"),
    confirm_password = document.getElementById("password2");

function validatePassword() {
  if (password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

// password.onchange = validatePassword;
// confirm_password.onkeyup = validatePassword;

$('.likePost').click(function () {
  if ($(this).hasClass('likePost')) {
    $(this).html('Remove like').toggleClass('dislikePost').removeClass('likePost');
  } else if ($(this).hasClass('dislikePost')) {
    $(this).html('Like').toggleClass('likePost').removeClass('dislikePost');
  }
  //   $.ajax({		
  //    type: 'POST',		
  //    url: "classes/Likes.php",		
  //    data: { name: "John" }		
  //  }).done(function( msg ) {		
  //  //   alert( "Data Saved: " + msg );		

  //  });			
});