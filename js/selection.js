$(document).ready(function(){
	var loadedImages = [];
	var category1 = "category1-all",category2 = "category2-all";
	getImages(category1,category2);
	/*$(".category1").css("background-color","rgb(233, 160, 160)");
	$(".category1").css("color","rgb(17, 9, 2)");
	$(".category2").css("background-color","rgb(233, 160, 160)");
	$(".category2").css("color","rgb(17, 9, 2)");
	$("#"+category1).css("background-color", "rgb(26, 26, 6)");
	$("#"+category1).css("color","azure");
	$("#"+category2).css("background-color", "rgb(26, 26, 6)");
	$("#"+category2).css("color","azure");*/
	function loadImageForNextPage(id){
		var x = id.split("-").pop();
		var y = "image-"+x+"";
		var src = document.getElementById(y).getAttribute('src');
		if($.inArray(src, loadedImages) != -1){
			loadedImages.splice($.inArray(src,loadedImages),1);
			// alert(loadedImages);
		}
		else{
			loadedImages.push(src);
			// alert(loadedImages);
		}
	}
	function getImages(category1,category2){
		var val1 = category1.split('-').pop();
		var val2 = category2.split('-').pop();
		$.ajax({
	        type: 'POST',
	        url: 'getImages.php',
	        data: { category1: val1, category2: val2 },
	        success: function(response) {
	            $('#result').html(response);
	            $('input[type=checkbox]').click(function(){
	            	loadImageForNextPage($(this).attr('id'));
	            });
	        }
	    });
	}
	
	$(".category1").click(function(){
		var id = $(this).attr('id');
		category1 = id;
		
		$(this).removeClass('myds');
		$('.category1').removeClass('active');
		$(this).addClass('active');
		
		getImages(category1,category2);
	});
	$(".category2").click(function(){
		var id = $(this).attr('id');
		category2 = id;
		
		$(this).removeClass('myds2');
		$('.category2').removeClass('active');
		$(this).addClass('active');
		
		getImages(category1,category2);
	});
});