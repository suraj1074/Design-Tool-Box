$(document).ready(function(){
	$(".myarrange").on('click',function(){
		var val = $(this).attr('id');
		//alert(val);
		if(canvas.getActiveObject()){
			var obj = canvas.getActiveObject();
			if(val == "sendBackwards")
				canvas.sendBackwards(obj);
			else if(val == "sendToBack")
				canvas.sendToBack(obj);
			else if(val == "bringForward")
				canvas.bringForward(obj);
			else if(val == "bringToFront")
				canvas.bringToFront(obj);
		}
	});
});