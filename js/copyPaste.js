$(document).ready(function(){
	var x,y;
	$("#copy").click(function(){
		copy();
	});
	$("#paste").click(function(){
		paste(x,y);
	});
	$("#cut").click(function(){
		cut();
	});
	function copy(){
	    if(canvas.getActiveGroup()){
	        for(var i in canvas.getActiveGroup().objects){
	            var object = fabric.util.object.clone(canvas.getActiveGroup().objects[i]);
	            object.set("top", object.top+5);
	            object.set("left", object.left+5);
	            copiedObjects[i] = object;   
	        }                    
	    }
	    else if(canvas.getActiveObject()){
	        var object = fabric.util.object.clone(canvas.getActiveObject());
	        object.set("top", object.top+5);
	        object.set("left", object.left+5);
	        copiedObject = object;
	        copiedObjects = new Array();      
	    }
	}

	function cut(){
		if(canvas.getActiveGroup()){
	        for(var i in canvas.getActiveGroup().objects){
	            var object = fabric.util.object.clone(canvas.getActiveGroup().objects[i]);
	            object.set("top", object.top+5);
	            object.set("left", object.left+5);
	            copiedObjects[i] = object;
	            canvas.getActiveGroup().objects[i].remove();
	        }                    
	    }
	    else if(canvas.getActiveObject()){
	        var object = fabric.util.object.clone(canvas.getActiveObject());
	        object.set("top", object.top+5);
	        object.set("left", object.left+5);
	        copiedObject = object;
	        copiedObjects = new Array();
	        canvas.getActiveObject().remove();
	    }
	}

	function paste(x,y){
	    if(copiedObjects.length > 0){
	        for(var i in copiedObjects){
	        	copiedObjects[i].set("top",y);
	        	copiedObjects[i].set("left",x);
	        	// console.log(x+" " +y);
	            canvas.add(copiedObjects[i]);
	            canvas.setActiveGroup(copiedObjects);
	        }                    
	    }
	    else if(copiedObject){
	    	copiedObject.set("top",y);
	        copiedObject.set("left",x);
	        // console.log(x+" " +y);
	        canvas.add(copiedObject);
	        canvas.setActiveObject(copiedObject);
	    }
	    canvas.renderAll();    
	}
	canvas.on('mouse:down', function(options) {
  		x = options.e.clientX - 332;
  		y = options.e.clientY - 168;
  		// console.log(x+" " +y);
	});
});