	$(function() {
			   
				var bar = $('.bar');
				var percent = $('.percent');
				
				/* @reload captcha
				------------------------------------------- */			   
				function reloadCaptcha(){
					$("#captcha").attr("src","php/captcha.php?r=" + Math.random());
				}
				
				$('.captcode').click(function(e){
					e.preventDefault();
					reloadCaptcha();
				});
				
				/* @custom validator method | check filesize | modern browsers only  
				--------------------------------------------------------------------- */
				$.validator.addMethod('filesize', function(value, element, param) {
					return this.optional(element) || (element.files[0].size <= param) 
				});	
						
				$( "#smart-form" ).validate({
				
						/* @validation states + elements 
						------------------------------------------- */
						errorClass: "state-error",
						validClass: "state-success",
						errorElement: "em",
						onkeyup: false,
						onclick: false,						
						
						/* @validation rules 
						------------------------------------------ */
						rules: {
								rciud_nombre: {
										required: true,
										minlength: 2
								},
								rciud_apellidos: {
										required: true,
										minlength: 2
								},
								rciud_email: {
										required: true,
										email: true
								},
								rciud_documentonumero: {
										required: true,
                                        minlength: 8,
                                        maxlength: 8
								},
								securitycode:{
										required:true	
								},
								password:{
										required: true,
										minlength: 6,
										maxlength: 16						
								},
								repeatPassword:{
										required: true,
										minlength: 6,
										maxlength: 16,						
										equalTo: '#password'
								}
						},
						
						/* @validation error messages 
						---------------------------------------------- */
						messages:{
								rciud_nombre: {
										required: 'Ingresa tu nombre',
										minlength: 'El nombre debe tener al menos 2 caracteres.'
								},
								rciud_apellidos: {
										required: 'Ingresa tus apellidos',
										minlength: 'El apellido debe tener al menos 2 caracteres.'
								},
								rciud_email: {
										required: 'Ingresa tu email',
										email: 'Debe introducir un email válido.'
								},
								rciud_documentonumero: {
										required: 'Ingresa el número del documento',
                                        minlength: 'El DNI debe contener 8 caracteres.',
                                        maxlength: 'El DNI debe contener 8 caracteres.'
								},
								securitycode:{
										required: 'Debe introducir el código de seguridad'
								},
								password:{
										required: 'Ingresa tu contraseña',
										minlength: 'Ingrese como mínimo 6 caracteres.'
								},
								repeatPassword:{
										required: 'Repite tu contraseña',
										minlength: 'Ingrese como mínimo 6 caracteres.',
										equalTo: 'Las contraseñas no son iguales'
								}
						},

						/* @validation highlighting + error placement  
						---------------------------------------------------- */	
						highlight: function(element, errorClass, validClass) {
								$(element).closest('.field').addClass(errorClass).removeClass(validClass);
						},
						unhighlight: function(element, errorClass, validClass) {
								$(element).closest('.field').removeClass(errorClass).addClass(validClass);
						},
						errorPlacement: function(error, element) {
						   if (element.is(":radio") || element.is(":checkbox")) {
									element.closest('.option-group').after(error);
						   } else {
									error.insertAfter(element.parent());
						   }
						},
						
						/* @ajax form submition 
						---------------------------------------------------- */						
						submitHandler:function(form) {
							$(form).ajaxSubmit({
									target:'.result',			   
									beforeSubmit:function(){
										var percentVal = '0%';
										bar.width(percentVal);
										percent.html(percentVal);
										$( ".progress-section" ).show();
										$('.form-footer').addClass('progress');
									},
									uploadProgress: function(event, position, total, percentComplete) {
										var percentVal = percentComplete + '%';
										bar.width(percentVal);
										percent.html(percentVal);
									},								
									error:function(){
										$( ".progress-section" ).hide(500);
										$('.form-footer').removeClass('progress');
									},
									 success:function(){
										var percentVal = '100%';
										bar.width(percentVal);
										percent.html(percentVal);
										$('.progress-section').show().delay(5000).fadeOut();											
										$('.form-footer').removeClass('progress');
										//$('.alert-success').show().delay(7000).fadeOut();
										$('.field').removeClass("state-error, state-success");
										if( $('.alert-error').length == 0){
											$('#smart-form').resetForm();
											reloadCaptcha();
										}
											
									 }
							  });
						}
						
				});		
		
	});				
    