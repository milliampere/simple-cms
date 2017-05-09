$( document ).ready(function() {
    console.log( "ready!" );
});

$('.likePost').click(function() {
    if ($(this).hasClass('likePost')) {
      $(this).html('Remove like').toggleClass('dislikePost').removeClass('likePost');
  }else if($(this).hasClass('dislikePost')){
      $(this).html('Like').toggleClass('likePost').removeClass('dislikePost');
  }
 $.ajax({
  type: 'POST',
  url: "classes/Likes.php",
  data: { name: "John" }
}).done(function( msg ) {
//   alert( "Data Saved: " + msg );
  
});

    });

   