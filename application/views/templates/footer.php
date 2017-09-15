		</div>

		<div class="modal fade" id="modal-register" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><center>Register</center></h4>
					</div>
					<div class="modal-body">
						<form action="Users/register" method="post" id="register_from" name="register_from">
							<div class="row">
								<div class="form-group col-sm-6" id="reg-firstname">
									<label class="sr-only" for="firstname">Firstname</label>
									<input type="text" class="form-control eraseError" name="firstname" id="firstname" placeholder="Firstname">
								</div>
								<div class="form-group col-sm-6" id="reg-lastname">
									<label class="sr-only" for="lastname">Lastname</label>
									<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname">
								</div>
							</div>
							<div class="form-group row">
								<ul>
									<li>
										<input type="radio" id="m-option" value="M" checked="true" name="gender">
										<label for="m-option">Male</label>
										<div class="check"></div>
									</li>
									<li>
										<input type="radio" id="f-option" value="F" name="gender">
										<label for="f-option">Female</label>
										<div class="check"></div>	
									</li>
								</ul>
					    	</div>
							<div class="form-group" id="reg-address">
								<label class="sr-only" for="address">Address</label>
								<input type="text" class="form-control" name="address" id="address" placeholder="Address">
							</div>
							<div class="form-group" id="reg-username">
								<label class="sr-only" for="username">Username</label>
								<input type="text" class="form-control" name="username" id="username" placeholder="Username">
							</div>
							<div class="form-group" id="reg-password">
								<label class="sr-only" for="password" id="reg-password">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Password">
							</div>
							<div class="form-group" id="reg-confirm_password">
								<label class="sr-only" for="confirm_password">Confirm Password</label>
								<input type="password" class="form-control eraseError" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
							</div>
							<div class="form-group" id="reg-email">
								<label class="sr-only" for="email">Email</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Email">
							</div>
							<input type="submit" class="btn btn-success btn-block" name="submit" id="submit" value="Register">
						</form>
					</div>
					<!-- <div class="modal-footer">
						<p>buttons</p>
					</div> -->
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$('.alert').delay(2500).fadeOut();
		</script>
		
		<script type="text/javascript">

			$(document).ready(function(){

				$("#register_from").submit(function(event){
					
					$('.form-group').removeClass('has-error'); // remove the error class
    				$('.error-msg').remove();

					var formData = {};

					$.each($("#register_from").serializeArray(), function(i, field){
						formData[field.name] = field.value;
					});

					$.ajax({
						type: 'POST',
						url: 'Users/register',
						data: formData,
						dataType: 'json',
						encode: true,
						success: function(res){
							
							if(res.errors)
							{
								for(var key in res["errors"])
								{
									console.log(key + ": " + res["errors"][key]);
									$("#reg-" + key).addClass("has-error");
									$("#reg-" + key).append('<div class="error-msg">'+ res["errors"][key] +'</div>');
								}
							} else {
								window.location = "Home";
							}

						},
						error: function(err) {
							console.log(err);
						}
					});

					event.preventDefault();

				});


			});

			function validateForm() {

				console.log(formData);



				// var toreturn = true;
				// console.log("firstame: " + $('input[name=firstname]').val());
				// if(document.forms["register_from"]["password"].value != document.forms["register_from"]["confirm_password"].value)
				// {
				// 	document.getElementById("error-conpass").innerHTML = "<label>Password and Confirm Password does not match</label>";
				// 	return false;
					
				// }

				// if(document.forms["register_from"]["firstname"].value == "")
				// {
				// 	document.getElementById("error-firstname").innerHTML = "<label>Firstname is required</label>";
				// 	return false;
				// }

				return false;
			}

			// $(document).ready(function(){
			// 	$(".eraseError").keyup(function(){
			// 		if(document.getElementById("error-conpass").innerHTML != "") {
			// 			document.getElementById("error-conpass").innerHTML = "";
			// 		}

			// 		if(document.getElementById("error-firstname").innerHTML != "") {
			// 			document.getElementById("error-firstname").innerHTML = "";
			// 		}
			// 	});
			// });

			// var data = {};
			
			// $(document).ready(function(){
			// 	$("#submit").on('click', function(){
			// 		resetErrors();

			// 		var url = base_url + "Users/register";

			// 		$.each($('form input, form select'), function(i, v) {
			// 			if(v.type !== 'submit')
			// 			{
			// 				data[v.name] = v.value;
			// 			}
			// 		});

			// 		$.ajax({
			// 			dataType: 'json',
			// 			type: 'POST',
			// 			url: url,
			// 			data: data,
			// 			success: function(resp) {
			// 				if(resp === true)
			// 				{
			// 					$('#register_from').submit();
			// 					return false;
			// 				} else {
			// 					var msg = '<label class="error" for="'+i+'">'+v+'</label>';
			// 					$('.to_validate').addClass("has-error").after(msg);
			// 				}

			// 				// var keys = Object.keys(resp);
			// 				return false;
			// 			},
			// 			error: function() {
			// 				console.log("error: failed checking fields");
			// 			}
			// 		});

			// 		return false;

			// 	});
			// });

			// function resetErrors() {
			// 	$('form input, form select').removeClass('has-error');
   //  			$('label.error').remove();
			// }

		</script>

		<style type="text/css">
			div.modal-body{padding:20px 30px 10px 30px !important;}
			div.modal-dialog .radio-inline {font-size:20px;display:inline-block;}
			div.modal-dialog ul{list-style: none;margin: 0;padding: 0;overflow: auto;display:flex;}
			div.modal-dialog ul li{margin-top: -25px;color: #777;display: block;position: relative;float: left;width: 100%;height: 70px;}
			div.modal-dialog ul li input[type=radio]{position: absolute;visibility: hidden;}
			div.modal-dialog ul li label{display: block;position: relative;font-weight: 300;font-size: 25px;padding: 25px 25px 25px 80px;margin: 0 auto;height: 30px;z-index: 9;cursor: pointer;-webkit-transition: all 0.25s linear;}
			div.modal-dialog ul li:hover label{color: #777;}
			div.modal-dialog ul li .check{display: block;position: absolute;border: 5px solid #777;border-radius: 100%;height: 25px;width: 25px;top: 30px;left: 20px;z-index: 5;transition: border .25s linear;-webkit-transition: border .25s linear;}
			div.modal-dialog ul li:hover .check {border: 5px solid #777;}
			div.modal-dialog ul li .check::before {display: block;position: absolute;content: '';border-radius: 100%;height: 11px;width: 11px;top: 2px;left: 2px;margin: auto;transition: background 0.25s linear;-webkit-transition: background 0.25s linear;}
			div.modal-dialog input[type=radio]:checked ~ .check {border: 5px solid #1d9ce5;}
			div.modal-dialog input[type=radio]:checked ~ .check::before{background: #1d9ce5;}
			div.modal-dialog input[type=radio]:checked ~ label{color: #1d9ce5;}
			div.modal-dialog p{margin-bottom: 0px;}
		</style>

	</body>
</html>