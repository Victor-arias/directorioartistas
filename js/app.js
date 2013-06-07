$(function() {
	var PUBLIC_PATH = $("#PUBLIC_PATH").val();
    var directorio = $("#dir").val();

    $('#RegistroForm_username').popover({
        trigger: 'focus'
    });
    $('#RegistroForm_password').popover({
        trigger: 'focus'
    });    
    $('#RegistroForm_nombrePropuesta').popover({
        trigger: 'focus'
    });    
    $('#RegistroForm_representante').popover({
        trigger: 'focus'
    });    
    $('#RegistroForm_cedula').popover({
        trigger: 'focus'
    });    
    $('#RegistroForm_telefono').popover({
        trigger: 'focus'
    });    
    $('#RegistroForm_celular').popover({
        trigger: 'focus'
    });    
    $('#RegistroForm_email').popover({
        trigger: 'focus'
    });    
    $('#RegistroForm_direccion').popover({
        trigger: 'focus'
    });    
    $('#RegistroForm_numeroIntegrantes').popover({
        trigger: 'focus'
    });    
    $('#RegistroForm_resena').popover({
        trigger: 'focus'
    });    
    $('#RegistroForm_video').popover({
        trigger: 'focus'
    });    
    $('#RegistroForm_twitter').popover({
        trigger: 'focus'
    });    
    $('#RegistroForm_fb').popover({
        trigger: 'focus'
    });    
    $('#RegistroForm_web').popover({
        trigger: 'focus'
    });    
    $('#RegistroForm_valor').popover({
        trigger: 'focus'
    });    

    $("#yw0").submit(function(e){
        
        var numAudio = $("#audio .template-download:not('.ui-state-error')").length;
        var numPerfil = $("#fotoPerfil .template-download:not('.ui-state-error')").length;
        var numFotos = $("#fotos .template-download:not('.ui-state-error')").length;
        var numRider = $("#rider .template-download:not('.ui-state-error')").length;
        var error = 0;
        var mensajeError = "";
        if($("#RegistroForm_area_0").is(':checked')){
            if(numAudio < 2){
                mensajeError += "Debes cargar 2 archivos de audio (.mp3)\n";
                error++;
            }
        }

        if(numPerfil < 1){
            mensajeError += "Debes cargar una foto de perfil\n";
            error++;
        }
        
        if(numFotos < 1){
            mensajeError += "Debes cargar una foto adicional\n";
            error++;
        }

        if(numRider < 1){
            mensajeError += "Debes cargar un archivo Rider";
            error++;
        }

        if(error > 0){
            e.preventDefault();
            alert(mensajeError);
        }

    });

	$("#terminos").click(function(e){		
		if(!$("#aceptar").is(':checked')){
			e.preventDefault();
			alert("Debes leer y aceptar las condiciones.");
		}		
	});

    $(".area").click(function(){
        var area = $(this).val();
        switch (area) {
            case "1":
                $("#otrosMusica").attr("disabled","disabled");
                $("#otrosOtro").attr("disabled","disabled");

                $("#areaMusica").fadeIn("slow");
                $("#otrosMusica").removeAttr("disabled");
                $("#otrosOtro").attr("disabled","disabled");
                $("#areaOtros").fadeOut("slow");
            break;
            case "2":
                $("#otrosMusica").attr("disabled","disabled");
                $("#otrosOtro").attr("disabled","disabled");

                $("#areaMusica").fadeOut("slow");
                $("#otrosOtro").attr("disabled","disabled");
                $("#otrosMusica").attr("disabled","disabled");                
                $("#areaOtros").fadeOut("slow");
            break;
            case "3":
                $("#otrosMusica").attr("disabled","disabled");
                $("#otrosOtro").attr("disabled","disabled");

                $("#areaMusica").fadeOut("slow");
                $("#otrosOtro").attr("disabled","disabled");
                $("#otrosMusica").attr("disabled","disabled")
                $("#areaOtros").fadeOut("slow");
            break;
            default:
                $("#otrosMusica").attr("disabled","disabled");
                $("#otrosOtro").attr("disabled","disabled");

                $("#areaMusica").fadeOut("slow");
                $("#otrosOtro").removeAttr("disabled");
                $("#otrosMusica").attr("disabled","disabled"); 
                $("#areaOtros").fadeIn("slow");
            break;
        }
    });

    // Initialize the jQuery File Upload widget:
    $('#fotoPerfil').fileupload({        
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: PUBLIC_PATH + '/convocatoria/fotoPerfil/',
        maxNumberOfFiles: 1,
        previewMaxWidth: 200,
        previewMaxHeight: 200,
        imageCrop: true,     
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        messages: {
            maxNumberOfFiles: 'Solo se permite una foto de perfil',
            acceptFileTypes: 'No se acepta este tipo de archivo',
            maxFileSize: 'El archivo es demsiado pesado',
            minFileSize: 'El archivo no tiene peso sofuciente'
        }
    });

    // Enable iframe cross-domain access via redirect option:
    $('#fotoPerfil').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );

    // Load existing files:
    $('#fotoPerfil').addClass('fileupload-processing');
    
    $.ajax({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: $('#fotoPerfil').fileupload('option', 'url'),
        dataType: 'json',
        context: $('#fotoPerfil')[0]
    }).always(function (result) {
        $(this).removeClass('fileupload-processing');
    }).done(function (result) {
        $(this).fileupload('option', 'done')
            .call(this, null, {result: result}); 
    }); 

    $('#fotos').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: PUBLIC_PATH + '/convocatoria/fotos',
        maxNumberOfFiles: 5,
        previewMaxWidth: 200,
        previewMaxHeight: 200,
        imageCrop: true,   
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,  
        messages: {
            maxNumberOfFiles: 'Solo se permiten 5 fotos adicionales',
            acceptFileTypes: 'No se acepta este tipo de archivo',
            maxFileSize: 'El archivo es demsiado pesado',
            minFileSize: 'El archivo no tiene peso sofuciente'
        }          
    });

    // Enable iframe cross-domain access via redirect option:
    $('#fotos').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );

    // Load existing files:
    $('#fotos').addClass('fileupload-processing');
    $.ajax({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: $('#fotos').fileupload('option', 'url'),
        dataType: 'json',
        context: $('#fotos')[0]
    }).always(function (result) {
        $(this).removeClass('fileupload-processing');
    }).done(function (result) {
        $(this).fileupload('option', 'done')
            .call(this, null, {result: result});
    });    

    $('#audio').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: PUBLIC_PATH + '/convocatoria/audio',
        maxNumberOfFiles: 2,
        previewMaxWidth: 200,
        previewMaxHeight: 200,
        imageCrop: true,
        acceptFileTypes: /(\.|\/)(mp3)$/i,
        messages: {
            maxNumberOfFiles: 'Solo se permiten 2 archivos de audio',
            acceptFileTypes: 'No se acepta este tipo de archivo',
            maxFileSize: 'El archivo es demsiado pesado',
            minFileSize: 'El archivo no tiene peso sofuciente'
        }          
    });

    // Enable iframe cross-domain access via redirect option:
    $('#audio').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );

    // Load existing files:
    $('#audio').addClass('fileupload-processing');
    $.ajax({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: $('#audio').fileupload('option', 'url'),
        dataType: 'json',
        context: $('#audio')[0]
    }).always(function (result) {
        $(this).removeClass('fileupload-processing');
    }).done(function (result) {
        $(this).fileupload('option', 'done')
            .call(this, null, {result: result});
    });    


    $('#rider').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: PUBLIC_PATH + '/convocatoria/rider',
        maxNumberOfFiles: 1,
        previewMaxWidth: 200,
        previewMaxHeight: 200,
        imageCrop: true,   
        acceptFileTypes: /(\.|\/)(pdf)$/i,  
        messages: {
            maxNumberOfFiles: 'Solo se permite un archivo Rider',
            acceptFileTypes: 'No se acepta este tipo de archivo. Solo PDF',
            maxFileSize: 'El archivo es demsiado pesado',
            minFileSize: 'El archivo no tiene peso sofuciente'
        }          
    });

    // Enable iframe cross-domain access via redirect option:
    $('#rider').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );

    // Load existing files:
    $('#rider').addClass('fileupload-processing');
    $.ajax({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: $('#fotos').fileupload('option', 'url'),
        dataType: 'json',
        context: $('#rider')[0]
    }).always(function (result) {
        $(this).removeClass('fileupload-processing');
    }).done(function (result) {
        $(this).fileupload('option', 'done')
            .call(this, null, {result: result});
    });       
 	
});