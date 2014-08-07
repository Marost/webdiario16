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
								rciud_email: {
										required: true,
										email: true
								},
								securitycode:{
										required:true	
								}
						},
						
						/* @validation error messages 
						---------------------------------------------- */
						messages:{
								rciud_email: {
										required: 'Ingresa tu email',
										email: 'Debe introducir un email válido.'
								},
                                securitycode:{
										required: 'Debe introducir el código de seguridad'
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
    