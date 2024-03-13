

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                           
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="<?php echo base_url('login');?>" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

         </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function(){
        // Custom method to check if the string contains a special character
        $.validator.addMethod("specialChars", function(value, element) {
            return /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/.test(value);
        }, "Password must contain at least one special character.");

        $('#register-form').validate({
            rules:{
                name:{
                    required: true,
                    minlength: 8,
                    specialChars: true
                },
                email:{
                    required: true,
                    email: true,
                    remote:{
                        url:"<?php echo base_url('check_email');?>",
                        type:"POST",
                        data:{
                            email:function (){
                                return $("#email").val();
                            }
                        }

                    }
                },
                pass:{
                    required: true,
                    minlength: 6,
                    specialChars: true,
                    // digits: true 
                },
                re_pass:{
                    required: true,
                    equalTo: "#pass" // Compares the value to the #pass field
                },
            },
            messages:{
                name: {
                    required: 'Enter username',
                    minlength: 'Username must be at least 8 characters long',
                    specialChars: 'Username must contain at least one special character'
                },
                email: {
                    required: 'Enter your Email',
                    email: 'Enter a valid email address',
                    remote:'Email is already taken'
                },
                pass: {
                    required: 'Enter Password',
                    minlength: 'Password must be at least 6 characters long',
                    specialChars: 'Password must contain at least one special character',
                    // digits: 'Password must contain at least one digit'
                },
                re_pass: {
                    required: 'Enter re-enter password',
                    equalTo: 'Passwords do not match'
                }
            },
            submitHandler: function(form) {
                if($(form).valid()) {
                    

                    var formData = $(form).serialize();

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('login_register');?>",
                        data: formData,
                        success: function(response) {
                        
                            if (response=='success') {
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: "Register successful",
                                    showConfirmButton: false,
                                    timer: 5000
                                });
                                
                                    // Redirect to login page after the timer finishes
                                    window.location.href = "<?php echo base_url('login');?>";
                                 
                                } else {
                                Swal.fire({
                                    position: "top-end",
                                    icon: "error", // Use "error" instead of "failed"
                                    title: "Register Failed",
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                                window.location.href = "<?php echo base_url('register');?>";
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });


                } else {
                    console.log('Form validation failed');
                }
            }
        });
    });
</script>

<style>
    .error {
        color: red;
    }
</style>