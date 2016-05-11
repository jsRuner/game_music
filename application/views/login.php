<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>高姿游戏管理系统</title>
		<meta name="keywords" content="高姿游戏管理系统" />
		<meta name="description" content="高姿游戏管理系统" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="<?php echo base_url('static/assets/css/reset.css'); ?>  ">
        <link rel="stylesheet" href="<?php echo base_url('static/assets/css/supersized.css'); ?> ">
        <link rel="stylesheet" href="<?php echo base_url('static/assets/css/style.css'); ?>">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="page-container">
            <h1>登录</h1>
            <form onsubmit="return false;">
                <input type="text" name="username" class="username" placeholder="用户名">
                <input type="password" name="password" class="password" placeholder="密码">
                <button type="submit" id="loginbtn">提交</button>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
                <p>联系电话:021-33674211</p>
                <!-- <p>
                    <a class="facebook" href=""></a>
                    <a class="twitter" href=""></a>
                </p> -->
            </div>
        </div>
		
        <!-- Javascript -->
        <script src="<?php echo base_url('static/assets/js/jquery-1.8.2.min.js');?>"></script>
        <script src="<?php echo base_url('static/assets/js/supersized.3.2.7.min.js');?>"></script>
        <script src="<?php echo base_url('static/assets/js/supersized-init.js');?>"></script>
        <script src="<?php echo base_url('static/assets/js/scripts.js');?>"></script>

    </body>

    <script type="text/javascript">

    $("#loginbtn").bind('click',function(){
          var  username = $('.username').val();
           var  password = $('.password').val();

           if (username == '' || password == '') {
            return false;
           }

              $.ajax({
                url: "<?php echo base_url('index.php/welcome/login');?>",
                data: {'username':username,'password':password},
                dataType: 'json',
                type: 'post',
                success: function(res){
                    if(res.status == 200){
                        //登录成功
                        alert('登录成功');
                        window.location.href = "<?php echo base_url('index.php/welcome/manage');?>";
                    }else{
                        //登录失败
                        alert('登录失败');
                    }
                },
                error: function(e){
                    console.log(e);
                }
            });

    });
        

      
    </script>

</html>


