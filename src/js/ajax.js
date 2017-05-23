document.addEventListener('DOMContentLoaded', function(event) {
  if(document.getElementById('moreButton')){
    document.getElementById('moreButton').addEventListener('click', function(){
      Pagination.loadMore();
      console.log("Button clicked");
    })
  }
});

const Pagination  = (function() {

var counter = 1;

  function countClicks(){
    counter = counter + 1;
    return counter;
  }

  function loadMore(){
    
    var init = {
      method: "POST",
      headers: {"Content-Type": "application/x-www-form-urlencoded" },
    }
    
    var url = "ajax_loadmore.php?id=" + Pagination.countClicks();

    fetch(url, init)
      .then(data => data.text())
      .then(text => {return text;})
      .catch(error => {console.log(error);})
      .then(data => {
        if(data == ''){
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
})(); // end of Model


