$(document).ready(function(){
	$("#sticker").click(function(){
		var id = "stickerImage";
		image = document.getElementById(id);
		var imgInstance = new fabric.Image(image,{
			top: 40,
			left: 30,
			width: 250,
			height: 235,
		});
		// canvas.add(imgInstance);
		var text = new fabric.Text('write here',
			{ 
				left: 50 , 
			  	top :50, 
			  	width:250,
			  	height: 200
			});
		canvas.add(text);
		canvas.setActiveObject(text);
		// text.enterEditing();
		// text.selectAll();

		var group = new fabric.Group([ imgInstance, text ], {
  			left: 150,
  			top: 100,
  			// angle: -10
		});
		canvas.add(group);
		if(canvas.getActiveGroup()){
		for(var i in canvas.getActiveGroup().objects){
			var obj = canvas.getActiveGroup().item[i];
			if(obj.type == 'i-text'){
				console.log("i-text");
				group.setActiveObject(obj);
				obj.selectAll();
				obj.enterEditing();
			}
		}}
	});
});