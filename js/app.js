$(function() {
	var PUBLIC_PATH = $("#PUBLIC_PATH").val();

	$("#btnParticipar").click(function(e){		
		if(!$("#aceptar").is(':checked')){
			e.preventDefault();
			alert("Debes leer y aceptar las condiciones.");
		}		
	});


    // Initialize the jQuery File Upload widget:
    $('#fotoPerfil').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: PUBLIC_PATH + '/convocatoria/fotoPerfil',
        maxNumberOfFiles: 1,
        previewMaxWidth: 200,
        previewMaxHeight: 200,
        imageCrop: true,     
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
        messages: {
            maxNumberOfFiles: 'Solo se permite una foto de perfil',
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
 	
});