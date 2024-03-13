
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" id="loginpage">
					<span class="login100-form-title">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" id="email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password" id="pass">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="<?php echo base_url('forgot');?>">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="<?php echo base_url('register');?>">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
	$(document).ready(function(){
		$('#loginpage').validate({
			rules:{
				email:{
					required:true,
					email:true
				},
				pass:{
					required:true,
				}
			},
			messages : {

				email:{
					required:'enter Your Email',
					email:'Email not valid'
				},
				pass:{
					required:'Enter Your Psaaword',
				}

			},
			submitHandler:function(form){
				if($(form).valid())
				{
					var FormData =$(form).serialize();
					$.ajax({
						type:"POST",
						url:"<?php echo base_url('login_check');?>",
						data:FormData,
						success:function(response)
						{
							if(response=='success')
							{
								Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: "Login successful",
                                    showConfirmButton: false,
                                    timer: 5000
                                });
								window.location.href = "<?php echo base_url('homepage');?>";
							}
							else{

								Swal.fire({
                                    position: "top-end",
                                    icon: "failed",
                                    title: "Login Failed ...USER NOT EXIST",
                                    showConfirmButton: false,
                                    timer: 5000
                                });
								window.location.href = "<?php echo base_url('login');?>";

							}

						},
						error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
					})

				}
				else {
                    console.log('Form validation failed');
                }
			}
		});
	});
</script>


<style>
	.error{
		color:red
	}
</style>

