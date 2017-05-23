'use strict';

document.addEventListener('DOMContentLoaded', function (event) {
  if (document.getElementById('moreButton')) {
    document.getElementById('moreButton').addEventListener('click', function () {
      Pagination.loadMore();
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
      if (data == '<div class="posts container"></div>') {
        document.getElementById('moreButton').className = "btn btn-primary btn-block disabled";
        document.getElementById('moreButton').innerHTML = "No more posts to load";
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