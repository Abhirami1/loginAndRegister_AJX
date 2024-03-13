<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $loginid= $this->session->userdata('logged_in');
        $name= $this->session->userdata('username');
    ?>
    <h1>WELCOME <?php echo $name;?></h1>


    <button id="button">LOGOUT</button>
</body>
</html>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>

    $(document).ready(function()
    {
        $('#button').click(function(){
            $.ajax({
                method:"POST",
                url:"<?php echo base_url('logout');?>",
                data:{id:<?php echo $this->session->userdata('logged_in');?>},
                success:function(response)
                {
                    if(response=='success')
                    {
                      window.location.href = "<?php echo base_url('login');?>";
                    }
                }


            })
        })
    })

</script>