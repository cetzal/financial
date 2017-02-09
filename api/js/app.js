var $appfinancial = new Object;
//console.log(window.location.href );

(function(){
	this.HOST  = "http://api.proyecto.mipc";

	this.init = function() {

		$(document).delegate("#login-form","submit",function(e){
			e.preventDefault();
			var formData = $("#login-form").serialize();
			var LoginResponse = $appfinancial.Event.gJSON("/login/Make",formData,"POST",false);

			console.log(LoginResponse);

			if (LoginResponse.response == "Success") {
				window.location=LoginResponse.redirect;
			}
		});
	};

	this.Event = new Object;
	this.Event.gJSON = function(url, data, type, cache){
		if(typeof(cache) != "undefined"){
			cache = cache;
		}else{
			cache = false;
		}
		if(typeof(type) != "undefined"){
			type = type;
		}else{
			type = "GET";
		}
		
		if(typeof(url) == "undefined"){
			url = "/cpp/test";	
		}
		
		//extras = {codigo: $.cookie('codigo'), lang:$.cookie('lang'), user_id : $.cookie("user")};
		
		
		//$.extend(true, data, extras);
		
		$.ajax({
			type: type,
			url: $appfinancial.HOST + url,
			dataType: 'json',
			data: data,
			async: false,		
			cache: cache,				
		}).done(function( json ) {
			rValue = json;			
		});		
		return rValue;
	};

	this.init();


}).apply($appfinancial);