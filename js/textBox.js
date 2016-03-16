$(document).ready(function(){
	$(".addTextbox").click(function(){
		var text = new fabric.IText('write here',{left: 50 , top :50});

		canvas.add(text);
			var scaleX = text.scaleX;
	        var scaleY = text.scaleY;
	        var left = text.left;
	        var top = text.top;
	        
	        var tempScaleX = scaleX * canvasScale;
	        var tempScaleY = scaleY * canvasScale;
	        var tempLeft = left * canvasScale;
	        var tempTop = top * canvasScale;
	        
	        text.scaleX = tempScaleX;
	        text.scaleY = tempScaleY;
	        text.left = tempLeft;
	        text.top = tempTop;
	        
	        text.setCoords();

		
		canvas.setActiveObject(text);
		// text.enterEditing();
		text.selectAll();
		canvas.renderAll();
		$("#forTextBox").show();
		$('#displaypanel').css('padding-top','60px');
	});
	function setStyle(object, styleName, value) {
	  if (object.setSelectionStyles && object.isEditing) {
	    var style = { };
	    style[styleName] = value;
	    object.setSelectionStyles(style);
	  }
	 	else {
	  	 object[styleName] = value;
	  }
	}

	function getStyle(object, styleName) {
	  return (object.getSelectionStyles && object.isEditing)
	    ? object.getSelectionStyles()[styleName]
	    : object[styleName];
	}

	function addHandler(id, fn, eventName) {
	  document.getElementById(id)[eventName || 'onclick'] = function() {
	    var el = this;
	    if (obj = canvas.getActiveObject()) {
	      fn.call(el, obj);
	      canvas.renderAll();
	    }
	  };
	}

	addHandler('underline', function(obj) {
	  var isUnderline = (getStyle(obj, 'textDecoration') || '').indexOf('underline') > -1;
	  setStyle(obj, 'textDecoration', isUnderline ? '' : 'underline');
	});

	addHandler('bold', function(obj) {
 	 	var isBold = getStyle(obj, 'fontWeight') === 'bold';
  		setStyle(obj, 'fontWeight', isBold ? '' : 'bold');
	});
		
	addHandler('italic', function() {
	  var isItalic = getStyle(obj, 'fontStyle') === 'italic';
	  setStyle(obj, 'fontStyle', isItalic ? '' : 'italic');
	});

	addHandler('color', function(obj) {
	  setStyle(obj, 'fill', this.value);
	}, 'onchange');

	addHandler('font-size', function(obj) {
	  setStyle(obj, 'fontSize', parseInt(this.value, 10));
	}, 'onchange');

	addHandler('font-control',function(obj){
		setStyle(obj,'fontFamily',$('#font-control').val());
	},'onchange');

	// showing hiding for textbox options
	canvas.on('mouse:down', function(options) {
 	 	if (options.target) {
    		if(options.target.type == "i-text")
    		{
    			$("#forTextBox").show();
				$('#displaypanel').css('padding-top','60px');
    		}
    		else
    		{
    			$("#forTextBox").hide();
				$('#displaypanel').css('padding-top','0px');
    		}
  		}
  		else
  		{
  			$("#forTextBox").hide();
			$('#displaypanel').css('padding-top','0px');
  		}
	});
});