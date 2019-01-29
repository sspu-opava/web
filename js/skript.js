$(function(){
	var barva = $("h2").css("color");
	var pozadi = $("h2").css("background-color");

	function casovac() {
		var cas = new Date();
		$("#cas").text(cas.toLocaleTimeString());
	}

	window.setInterval(casovac,500);

	$("h2").click(function(event){
		$(this).nextAll().toggle(500);
	})

	$("h2").mouseenter(function(event) {
		$(this).css("color",pozadi);
		$(this).css("background-color", barva);
		$(this).css("border","1px solid " + pozadi);
	});

	$("h2").mouseleave(function(event) {
		$(this).css({"color":barva,"background-color":pozadi,"border":"none"});
	});

	$("#ajax button").click(function(){
		$.get("data.php?x=5&y=8", function(data, status){
        	alert("Data: " + data + "\nStatus: " + status);
	        $("#ajax div").text(data);
    	});
    });

	$("blockquote").dblclick(function(event) {
		var objekt = $(this);
		var textarea = $("#dialog textarea");
		$("#dialog textarea").val($(this).text());
		$("#dialog").dialog({
/*		  	buttons: [
				    {	
				      text: "OK",
				      click: function() {
				        $(this).dialog( "close" );
				      }
				    }
				  ],*/
			close: function( event, ui ) {
				objekt.text(textarea.val());
			},			  
			resize: function( event, ui ) {
				$(this).find("textarea").css({"width":ui.size.width-50,"height":ui.size.height-150})
				console.log(ui.size);
			}
		});
	});

})