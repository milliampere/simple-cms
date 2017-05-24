'use strict';

$(document).ready(function () {

  // Like and dislike when button is clicked
  $('.likeButton').click(function (e) {

    $this = $(this);
    $postId = $this.attr('data-postid');
    $userId = $this.attr('data-userid');

    $.post("../like_execute.php", { postid: $postId, userid: $userId }, function (data) {

      //Change to like/dislike
      if ($this.val() == "Like") {
        $this.val('Dislike');
      } else {
        $this.val('Like');
      }
      return false;
    });
    countLikes();
  });

  // Check if liked
  function checkIfLiked() {
    $(function () {

      $('.likeButton').each(function (index) {
        var $this = $(this);
        $postId = $this.attr('data-postid');
        $userId = $this.attr('data-userid');

        $.post("../like_check.php", { postid: $postId, userid: $userId }, function (data) {
          $this.val(data);
        });
      });
    });
  }
  checkIfLiked();

  // Show number of likes
  function countLikes() {
    $(function () {

      $('.likeCount').each(function (index) {
        var $this = $(this);
        $postId = $this.attr('data-postid');
        $likeId = $this.attr('data-userid');

        $.post("../like_count.php", { postid: $postId, userid: $userId }, function (data) {
          $this.val(data);
          $this.next().text(data);
        });
      });
    });
  }
  countLikes();
}); // $(document).ready


document.addEventListener('DOMContentLoaded', function (event) {
  if (document.getElementById('moreButton')) {
    document.getElementById('moreButton').addEventListener('click', function () {
      Pagination.loadMore();
      console.log("Button clicked");
    });
  }
});

var Pagination = function () {

  var counter = 1;

  function countClicks() {
    counter = counter + 1;
    return counter;
  }

  function loadMore() {

    var init = {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" }
    };

    var url = "ajax_loadmore.php?id=" + Pagination.countClicks();

    fetch(url, init).then(function (data) {
      return data.text();
    }).then(function (text) {
      return text;
    }).catch(function (error) {
      console.log(error);
    }).then(function (data) {
      if (data == '') {
        document.getElementById('moreButton').className = "btn btn-primary btn-block disabled";
        document.getElementById('moreButton').innerHTML = "Sorry, no more posts to load";
      }
      console.log(data);
      var content = document.getElementById('content');
      content.innerHTML += data;
    });
  }

  return {
    countClicks: countClicks,
    loadMore: loadMore
  }; // end of return
}(); // end of Model