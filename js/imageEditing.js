$(document).ready(function(){
	function add_layer(type,id){
		$("#canvas-"+presentCanvas).append('<p class="hello" id='+noOfObjects+'>'+type+'</p>');
	}
	function zoomAdjust(object){
		var scaleX = object.scaleX;
		var scaleY = object.scaleY;
		var left = object.left;
		var top = object.top;
					        
		var tempScaleX = scaleX * canvasScale;
		var tempScaleY = scaleY * canvasScale;
		var tempLeft = left * canvasScale;
		var tempTop = top * canvasScale;
					        
		object.scaleX = tempScaleX;
		object.scaleY = tempScaleY;
		object.left = tempLeft;
		object.top = tempTop;
					        
		object.setCoords();
	}
	$(".addImage").click(function(){
		var imageId = $(this).attr('id');
		image1 = document.getElementById(imageId); //Jquery selector did not work here
		// console.log(image1.src);
		var ext = image1.src.split('.').pop();
		var imgInstance;
		
		var objectId = "image"+noOfObjects;
		if(ext == 'svg'){
			var src = image1.src;
			fabric.loadSVGFromURL(src,function(objects, options){
				var shape = fabric.util.groupSVGElements(objects, options);
				shape.set({
					left: 10,
					top: 20
				});
				shape.setCoords();
				zoomAdjust(shape);
				canvas.add(shape);
				canvas.setActiveObject(shape);
				canvas.renderAll();
			});
		}
		else{ 
			imgInstance = new fabric.Image(image1,{
				left: 100,
				top: 100,
				width: 250,
				height: 235,
				id: objectId
			});

			zoomAdjust(imgInstance);
			canvas.add(imgInstance);
			canvas.renderAll();
		}
		add_layer("image",objectId);
		noOfObjects ++;
	});

	canvas.on('object:selected',function(e){
		e.target.bringToFront();
	});
	
	// function for image editing camanjs

		$("#filter").click(function(){
			
			$('#mycomponent').css('margin-top','120px');
			
			$("#forfilters").show();
		});

		$('.mytext').change(function(){
			applyFilters();
		});

		function applyFilters() {
			if(canvas.getActiveObject()){
				img.src = canvas.getActiveObject().toDataURL();
			   	img.id = 'target';
			   	img.style.display = 'none';
			   	document.body.appendChild(img);
			    var hue = parseInt($('#hue').val());
			    var cntrst = parseInt($('#contrast').val());
			    var vibr = parseInt($('#vibrance').val());
			    var sep = parseInt($('#sepia').val());

			    Caman('#target',function() {
			      this.revert(false);
			      this.hue(hue).contrast(cntrst).vibrance(vibr).sepia(sep);
			      this.render(function(){
			      	canvas.getActiveObject().setSrc(document.getElementById('target').toDataURL(),function(){
			      		canvas.renderAll();
			      	});
			      });
			    });
			}
	  	}

	  // done is needed to be clicked else the function will not work properly
	  $("#done").click(function(){
			$('#mycomponent').removeAttr('style');
			
	  		$("#forfilters").hide();
	  		if(!!document.getElementById('target')){
	  			document.getElementById('target').remove();
		  	}
	  });

	  $("#vintage").click(function(){
	  	//alert("vintage");
	  	img.src = canvas.getActiveObject().toDataURL();
	   	img.id = 'target';
	   	img.style.display = 'none';
	   	document.body.appendChild(img);
	   	Caman('#target',function(){
			//this.revert();
	   		this.vignette(400);
	   		this.render(function(){
	      	canvas.getActiveObject().setSrc(document.getElementById('target').toDataURL(),function(){
	      		canvas.renderAll();
	      	});
	      });
	   	});
	  });

	  $("#presetFilters > div > div > div > img").click(function(){
	  	var id1 = $(this).attr('id');
	  	// alert(id1);
	  	if(id1 != 'vintage'){
	  		if(canvas.getActiveObject()){
	  		img.src = canvas.getActiveObject().toDataURL();
	   		img.id = 'target';
	   		img.height = canvas.getActiveObject().getHeight();
	   		img.width = canvas.getActiveObject().getWidth();
	   		img.left = canvas.getActiveObject().getLeft();
	   		img.top = canvas.getActiveObject().getTop();
	   		img.style.display = 'none';
	   		$('body').append(img);
	   		Caman('#target',function(){
				//this.revert();
	   			this[id1]();
				
	      		this.render(function(){
	      		canvas.getActiveObject().setSrc(document.getElementById('target').toDataURL(),function(){
	      			canvas.renderAll();
	      		});
	      	});
	   	  });
	  	}
	  }
	  });
});