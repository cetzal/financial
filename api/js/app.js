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
		//
		$(document).delegate('#mostrar-from', 'click', function(event) {
			id = $(this).attr("data-inf");
			$('#nueva-tarea-form-'+id).toggle();
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

		//guardar objetivos de la tarea
		$(document).delegate('#nueva_tarea', 'submit', function(event) {
			event.preventDefault();
			var formData = $("#nueva_tarea").serialize();
			var LoginResponse = $appfinancial.Event.gJSON("/proyectos/todoTareas",formData,"POST",false);
			if (LoginResponse.response == "Success") {
				window.location.reload();
			}
		});

		//btn btnformularioP
		$(document).delegate('.btnformularioP', 'click', function(event) {
			event.preventDefault();
			id = $(this).attr("data-from");
			var formData = $("#nueva_tarea-principal-"+id).serialize();
			var LoginResponse = $appfinancial.Event.gJSON("/proyectos/todoTareas",formData,"POST",false);
			if (LoginResponse.response == "Success") {
				window.location.reload();
			}
		});
		//btn editar toda las tareas
		$(document).delegate('.btnEdtaralltareas', 'click', function(event) {
			event.preventDefault();
			id = $(this).attr("data-from");
			var formData = $("#nueva_tarea-principal-"+id).serialize();
			var LoginResponse = $appfinancial.Event.gJSON("/proyectos/editartodoTareas",formData,"POST",false);
			if (LoginResponse.response == "Success") {
				window.location.reload();
			}
		});

		//btnEditar-abre un pop-up
		$(document).delegate('.btnEditar', 'click', function(event) {
			event.preventDefault();
			var vars = $(this).attr("data-vars");
			var id = $(this).attr("data-id");
			var path = $(this).attr("href");
			vars = $.parseJSON(vars);

			$.magnificPopup.open({
	    		items:{
	    			src: $appfinancial.Event.gVIEWSecure(path,{"idtareaDes":id},"POST",false),
				    type: 'inline'
	    		},
	    		 closeBtnInside: true
    	    });

    	     jQuery(document).ready(function() {
        		$(".chosen-select").chosen({width:"73%"});
    		});
		});
		//delete btn
		$(document).delegate('.btndelete', 'click', function(event) {
			event.preventDefault();
			var vars = $(this).attr("data-vars");
			var id = $(this).attr("data-id");
			var path = $(this).attr("href");
			vars = $.parseJSON(vars);

			var Response = $appfinancial.Event.gJSON(path,{"id":id},"POST",false);

			if (Response.response=="Success") {
				window.location.reload();
			}
			
		});
		
	};

	this.addlist = function(idtarea)
	{
		var view = $appfinancial.Event.gVIEWSecure("/proyectos/viewsList", {"idtarea": idtarea}, true);
		$(".tareas").html(view);
	}

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
	//para peticion de view

	this.Event.gVIEWSecure = function(url, datax, cache,beforeSendFunction,completeFunction){

		//HACER LAS PETICIONES
		if(typeof(cache) != "undefined"){
			cache = cache;
		}else{
			cache = false;
		}
		if(typeof(url) == "undefined"){
			url = "/cpp/test";	
		}
		$.ajax({
			type: "POST",
			url: $appfinancial.HOST + url,
			dataType: 'html',
			data: datax,
			async: false,
			cache: cache,
			beforeSend : beforeSendFunction,
            complete : completeFunction
		}).done(function(html){
			rValue = html;
		}).fail(function (response) {
			rValue = $appfinancial.Core.setLog('view',response.status,response.responseText,url,data);
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