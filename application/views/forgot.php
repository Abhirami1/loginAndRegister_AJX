<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="forgotform">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>

<style>
  .form-gap {
    padding-top: 70px;
}

.error{
  color:red;

}
</style>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>

<script>

$(document).ready(function(){


  $('#forgotform').validate({

    rules:{
      email:{
        required:true,
        email:true,
        remote:{
                  url:"<?php echo base_url('check_email_exist');?>",
                  type:"POST",
                  data:{
                      email:function (){
                          return $("#email").val();
                      }
                    }

                }
          }
    },
    messages:{
      email : {
        requierd:'Enter Your Email',
        email:'Enter Valid Email ',
        remote:'Email is not exist'
      }
      
    },

    submitHandler : function(form){
      if($(form).valid()){
        var formData = $(form).serialize();

        $.ajax({
          method:"POST",
          url:"<?php echo base_url('forgot_password');?>",
          data:formData,
          success:function(response){
            alert('hg')

          }

        })
      }
    }







  })


})




</script>