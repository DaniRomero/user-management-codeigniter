			<hr/>
			<div class="container">
				<div class="row">
					<div class="row-lg-12 row-md-12 row-sm-12">
						<p class="text-center"><em><strong>Author:</strong> Daniel Romero | <strong>Linkedin profile:</strong> https://www.linkedin.com/in/daniel-romero-230a1464/ | <strong>Github:</strong> https://github.com/DaniRomero | <strong> Copyright © 2017</strong></em></p>
					</div>
				</div>
			</div>

			<script type="text/javascript">

				$(function () {
					$('#email').focusin(function(event) {
						$('#msgEmail').html("<span style='color:#f00'></span>");
					});
					$('#email').focusout(function(event) {
						var emailReg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
						if ( $('#email').val()=="" || !emailReg.test($('#email').val())){
							$('#msgEmail').html("<span style='color:#f00'>Ingrese un correo valido</span>");
						}else{
							$.ajax({
								url: '/test/index.php/users/check_email_ajax',
								type: 'POST',
								data: "email="+$('#email').val()
							})
							.done(function(response) {
								if (response.length == 4)
									$('#msgEmail').html("<span style='color:#f00'>Email disponible</span>");
								else
									$('#msgEmail').html("<span style='color:#f00'>Email no disponible</span>");
							})
							.fail(function(e) {
								console.log(e);
								console.log("error");
							})
							.always(function(response) {
								if (response.length == 4)
									$('#msgEmail').html("<span style='color:#f00'>Email disponible</span>");
								else
									$('#msgEmail').html("<span style='color:#f00'>Email no disponible</span>");
							});
							
						}
					});

					$("form[name='user']").validate({
					    // Specify validation rules
					    rules: {
					      // The key name on the left side is the name attribute
					      // of an input field. Validation rules are defined
					      // on the right side
					      name: "required",
					      phone: "required",
					      email: {
					        required: true,
					        // Specify that email should be validated
					        // by the built-in "email" rule
					        email: true
					      },
					      age: {
					        required: true
					      },
					      role: "required"
					    },
					    // Specify validation error messages
					    messages: {
					      name: "Please enter a name",
					      phone: "Please enter a valid 12-digits phone",
					      age: "Please enter an age",
					      role: "Please select a role",
					      email: "Please enter a valid email address"
					    },
					    // Make sure the form is submitted to the destination defined
					    // in the "action" attribute of the form when valid
					    submitHandler: function(form) {
					      form.submit();
					    }
					});

					$("form[name='role']").validate({
					    // Specify validation rules
					    rules: {
					      // The key name on the left side is the name attribute
					      // of an input field. Validation rules are defined
					      // on the right side
					      name: "required"
					    },
					    // Specify validation error messages
					    messages: {
					      name: "Please enter the role name"
					    },
					    // Make sure the form is submitted to the destination defined
					    // in the "action" attribute of the form when valid
					    submitHandler: function(form) {
					      form.submit();
					    }
					});
				})

			</script>
        </body>
</html>