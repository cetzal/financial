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
				window.location=$appfinancial.HOST + "/" +LoginResponse.redirect;
			}
		});

		$(document).delegate(".btnMenuDelegated","click",function(e){
			e.preventDefault();
			$("#app_messages").html("");
			var vars = $(this).attr("data-vars");
			vars = $.parseJSON(vars);
			var path = $(this).attr("rel");

			$appfinancial.Event.findPath(path,vars);
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

	//para redereccionar
	this.Event.findPath = function(path,vars){
		console.log(path);
		window.location = $appfinancial.HOST + path;
	};

	this.init();


}).apply($appfinancial);