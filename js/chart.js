$(document).ready(function(){
	$("#save").click(function(){
		$("#chartdiv").jqplotSaveImage();
	});
	$("#insert").click(function(){
		numOfGraphs++;
		var imgData = $('#chartdiv').jqplotToImageStr({}); 
		var imgElem = $('<img/>').attr('src',imgData);
		imgElem.removeAttr("class");
		imgElem.attr('class',"addImage backgroundimage");
		imgElem.attr('id',"graph-"+numOfGraphs);
		imgElem.css('display','none');
		$(".images").append(imgElem);
		var image = document.getElementById("graph-"+numOfGraphs);
		imgInstance = fabric.Image.fromURL(image.src, function(oImg) { 
						oImg.height = 300;
				        canvas.add(oImg); 
				        canvas.renderAll(); 
				     });

		
	});
	var rows = 5;
	var columns = 2;
	var valueArray = [];
	var nameArray = [];
	var Title = "";
	create_table(rows,columns);
	$("#addNewRow").click(function(){
		rows++;
		create_table(rows,columns);
	});
	$("#deleteRow").click(function(){
		rows--;
		create_table(rows,columns);
	});

	/*$("#ok").click(function(){
		valueArray = [];
		nameArray = [];
		for(var i=1;i<rows;i++){
			valueArray.push(parseInt($("#"+(i+1)+"_2 > input").val()));
		}
		for(var i=1;i<rows;i++){
			nameArray.push($("#"+(i+1)+"_1 > input").val());
		}
		Title = $("#1_1 > input").val();
	});*/
	
	$("#plot").click(function(){

		valueArray = [];
		nameArray = [];
		for(var i=1;i<rows;i++){
			valueArray.push(parseInt($("#"+(i+1)+"_2 > input").val()));
		}
		for(var i=1;i<rows;i++){
			nameArray.push($("#"+(i+1)+"_1 > input").val());
		}
		Title = $("#1_1 > input").val();
	 	value = $("#choose").val();
	 	labelX = $("#labelX").val();
	 	labelY = $("#labelY").val();

	 	if(value == "vertical") vertical();
	 	else if(value == "horizontal") horizontal();
	 	else if(value == "line") line();
	 	else if(value == "pie") pie();
	 	else if(value == "donut") donut();
	 	else if(value == "area") area();
		
		$('.mybtn').removeAttr('disabled');
	});
	function vertical(){
		$("#chartdiv").empty();
		$.jqplot.config.enablePlugins = true;
		var data = [valueArray];
	    plot1 = $.jqplot('chartdiv', data, {
	     	seriesDefaults:{
	                renderer:$.jqplot.BarRenderer,
	                pointLabels: { show: true },
	            },
	        axes: {
	        	xaxis: {
	        			label : labelX,
	                    renderer: $.jqplot.CategoryAxisRenderer,
	                    ticks: nameArray
	                },
	            yaxis: {
	            		label : labelY
	            }
	        },
	        title: Title,
	     	highlighter: { show: false } 
	     });
	}

	function horizontal(){
		$("#chartdiv").empty();
		$.jqplot.config.enablePlugins = true;
	     plot1 = $.jqplot('chartdiv', [valueArray], {
	     	  title: Title,
	     	seriesDefaults:{
	                renderer:$.jqplot.BarRenderer,
	                pointLabels: { show: true },
	                rendererOptions: {
	                    barDirection: 'horizontal'
	                }
	            },
	        axes: {
	        	yaxis: {
	        			label : labelY,
	                    renderer: $.jqplot.CategoryAxisRenderer,
	                    ticks: nameArray
	                },
	            xaxis:{
	            		label : labelX,
	            }

	        },
	     	highlighter: { show: false } 
	     });
	}
	function line(){
		$("#chartdiv").empty();
		plot1 = $.jqplot('chartdiv', [valueArray],{
			title: Title,
			axes: {
				yaxis: {
	        			label : labelY,
	                },
	            xaxis:{
	            		label : labelX,
	            }
			}
		});
	}
	function pie(){
		$("#chartdiv").empty();
		plot1 = $.jqplot('chartdiv',[valueArray],{
			title: Title,
			axes: {
				yaxis: {
	        			label : labelY,
	                },
	            xaxis:{
	            		label : labelX,
	            }
			},
			seriesDefaults:{
            	renderer:$.jqplot.PieRenderer, 
           		trendline:{ show:false }, 
            	rendererOptions: { padding: 8, showDataLabels: true }
        	}
		});
	}
	function donut(){
		$("#chartdiv").empty();
		plot1 = $.jqplot('chartdiv',[valueArray],{
			title: Title,
			axes: {
				yaxis: {
	        			label : labelY,
	                },
	            xaxis:{
	            		label : labelX,
	            }
			},
			seriesDefaults:{
            renderer:$.jqplot.DonutRenderer,  
            trendline:{ show:false }, 
            rendererOptions: { padding: 8, showDataLabels: true }
        }
		});	
	}
	function area(){
		$("#chartdiv").empty();
		$.jqplot.config.enablePlugins = true;
     	plot1 = $.jqplot('chartdiv', [valueArray], {
     		title: Title,
     		seriesDefaults:{
    	            pointLabels: { show: true },
    	            fill: true
    	        },
    	    axes: {
    	    	xaxis: {
    	    			label: labelX,
    	                renderer: $.jqplot.CategoryAxisRenderer,
    	                ticks: nameArray
    	            },
    	        yaxis: {
    	        		label: labelY
    	        }
    	    },
    	 	highlighter: { show: false } 
    	 });
	}
	//generate table for sample Data 1
	function create_table(rows,columns){
		var Last_table = document.getElementById("data_table");
		if(Last_table != null){
			$("#data_table").remove();
		}

		var elem = '<table id="data_table" style="width:300px;"><tr><th>SL.</th>';
		for(var i=0;i<columns;i++)
		{
			elem = elem + '<th>'+String.fromCharCode(65+i)+'</th>';
		}
		elem = elem + '</tr>';
		for(var i=0;i<rows;i++){
			elem = elem + '<tr><td>'+(i+1)+'</td>';
			for(var j = 0;j<columns;j++){
				var txt = ""+(i+1)+"_"+(j+1);
				elem = elem + '<td id="'+txt+'""></td>';
			}
			elem = elem + '</tr>';
		}
		elem = elem + '</table>';
		$("#table").append(elem);

		for(var i=1;i<rows;i++){
			elem = '<input type="text" placeholder="Item '+(i)+'" value="'+(String.fromCharCode(97+i))+'">';
			$("#"+(i+1)+"_1").append(elem);
		}
		for(var i = 1;i<rows;i++){
			elem = '<input type="number" placeholder="'+(i)+'" value="'+(i+1)+'">';
			$("#"+(i+1)+"_2").append(elem);
		}
		$("#1_2").append('<input type="text" placeholder="Year 1">');
		$("#1_1").append('<input type="text" placeholder="Title">');
	}
});