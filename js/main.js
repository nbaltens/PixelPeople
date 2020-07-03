// LOGIN ANIMATION
const inputs = document.querySelectorAll(".input");

function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}
function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}
inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

// PROFILE GRID FUNCTIONALITY


$(document).ready(function(){


	var visible = true;
	$("#menu-icon").click(function () {
	visible = !visible;
	if (visible)
	{$('#menu').animate({marginLeft:-220},'slow');$('#main').animate({marginLeft:0},'slow');$('#menu-icon').removeClass('active');}
	else
	{$('#menu').animate({marginLeft:0},'slow');$('#main').animate({marginLeft:220},'slow');$('#menu-icon').addClass('active');}
	});

const apiKey = 'FKnlhoQOuU5lqrylt8av1G_ytxCzCUENu7RgagmuzA8';


$('#userSearch').on('keypress',function(e) {
    let searchInput = $('#userSearch').val();
    if(e.which == 13) {
		$('.imageItem').remove();
		getSearch(searchInput);
        $("#userSearch").val("");
    } else {
        return
    }
    
});
$('#userSearchMobile').on('keypress',function(e) {
    let searchInput = $('#userSearchMobile').val();
    if(e.which == 13) {
		$('.imageItem').remove();
		getSearch(searchInput);
        $("#userSearchMobile").val("");
    } else {
        return
    }
    
});

function getSearch(searchVal) {
	$.getJSON('https://api.unsplash.com/search/photos?query=' + searchVal + '&per_page=28&client_id=' + apiKey, function(data) {
		let imageList = data.results;
		makeGrid(imageList);
	})
}

function makeGrid(gridOutput) {
	$.each(gridOutput, function(i, val) {
		let image = val;
		let imageURL = val.urls.regular;
		// let imageWidth = val.width;
		// let imageHeight = val.height;
		
		//  if (imageWidth > imageHeight) {
		  $('.grid').append('<div class="imageItem"><div class="image-thumb" tabindex="1"><img class="gridImg" src="'+ imageURL +'"></div><div class="imageBig"><img class="gridImg" src="'+ imageURL +'"></div></div>');

		// }   
	  });  
}

getSearch('random');


$('#btnPageTwo').click(function() {
	
})

});