var $appfinancial = new Object;
//console.log(window.location.href );

(function(){
	this.HOST  = "http://api.proyecto.mipc";

	this.init = function() {
		//este es el que  envia el formulario del login
		$(document).delegate("#login-form","submit",function(e){
			e.preventDefault();
			var formData = $("#login-form").serialize();
			var LoginResponse = $appfinancial.Event.gJSON("/login/Make",formData,"POST",false);

			console.log(LoginResponse);

			if (LoginResponse.response == "Success") {
				window.location=$appfinancial.HOST + "/" +LoginResponse.redirect;
			}
		});
		//este es para  los botnes
		$(document).delegate(".btnMenuDelegated","click",function(e){
			e.preventDefault();
			$("#app_messages").html("");
			var vars = $(this).attr("data-vars");
			vars = $.parseJSON(vars);
			var path = $(this).attr("rel");

			$appfinancial.Event.findPath(path,vars);
		});

		//este  es para acceder a cada lista las tarea del tema
		$(document).delegate('', 'click', function(event) {
			
		});

		//este  es que crea un nuevo tema
		$(document).delegate('.btncreartema', 'click', function(event) {
			event.preventDefault();
			$(".content_imput").css("display", "none");
			$(".contener_impor").css("display", "inline-block");
		});	

		$(document).delegate('.btn-calcelar', 'click', function(event) {
			//$(".content_imput").removeAttr('style');
			//$(".contener_impor").css("display","none");
			/*alert("hola");*/
			window.location.reload();
			//$(".contener_impor").html("<div>hola</div>")
			
		});
		//guardar tema
		$(document).delegate('.btnguardart', 'click', function(event) {
			var nombretema = $('#nombret').val();
			var response = $appfinancial.Event.gJSON("/proyectos/guardartema",{"nombre":nombretema},"POST",false);

			if (response.response =="Success") {
				window.location.reload();
			}
			
		});
		//from for crear tareas
		$(document).delegate('#reassign-button', 'click', function(event) {
			$('#cont-reassign-form').toggle();
			$('#cont-email-form').css('display','none');
		return false;
		});
		//este es el que  envia el formulario de tareas
		$(document).delegate("#tareas-form","submit",function(e){
			e.preventDefault();
			var formData = $("#tareas-form").serialize();
			var LoginResponse = $appfinancial.Event.gJSON("/proyectos/Guardartarea",formData,"POST",false);

			console.log(LoginResponse);

			if (LoginResponse.response == "Success") {
				window.location=$appfinancial.HOST +LoginResponse.redirect;
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

	//para redereccionar
	this.Event.findPath = function(path,vars){
		console.log(path);
		window.location = $appfinancial.HOST + path;
	};

	this.init();


}).apply($appfinancial);