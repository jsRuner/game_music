<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>高姿管理系统后台</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('static/bootstrap-3.3.5-dist/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <style type="text/css">
  .glyphicon{
    margin-left: 10px;
  }
  </style>

<div class="container">
    <h1>你好,管理员</h1>


    

<div class="row">
  <div class="col-lg-6">
        <form action="<?php echo base_url('index.php/welcome/manage');?>" method="get">
    <div class="input-group">
          
      <input type="text" name="phone" value="<?php if(isset($phone)) echo $phone;?>" class="form-control" placeholder="手机号码">
       
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit" >搜索</button>
      </span>
    

    </div><!-- /input-group -->
 </form>
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
    

    <div>
    <a class="btn btn-default" href="<?php echo base_url('index.php/welcome/explode_rank');?>" target="_blank" role="button" >导出表格</a> 
    <a class="btn btn-default" href="<?php echo base_url('index.php/welcome/loginout');?>" role="button" style="float: right;" >退出系统</a>


</div>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

    


<div class="table-responsive" style="margin-top: 10px;">
  
  <table class="table table-bordered">
        <thead>
          <tr>
            <!-- <th>#</th> -->
            <th>排名</th>
            <th>姓名</th>
            <th>手机</th>
            <th>录音文件</th>
            <th>时长</th>
            <th>得分</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
            
            <?php $i=1; foreach($rank_list as $item){?>
            <tr>
             <!-- <td><?php echo $item['id'];?></td> -->
             <td><?php echo $i;?></td>
             <td><?php echo $item['name'];?></td>
             <td><?php echo $item['phone'];?></td>
             <td><?php echo $item['video_path'];?></td>
             <td><?php echo $item['video_len'];?></td>
             <td><?php echo $item['score'];?></td>
             <td>
               <span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="delitem(this,<?php echo $item['id'];?>)"></span>
               <span src="<?php echo base_url().substr($item['video_path'], 1);?>" class="glyphicon glyphicon-play playbtn" aria-hidden="true"></span>


             </td>
             </tr>
            

            <?php $i++;}?>


        </tbody>
      </table>

      <div><?php echo $tongji; ?></div>

      <nav style="float: right;">

      <?php  echo $pagination; ?>
<!--   <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul> -->
</nav>



</div>


</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="<?php echo base_url('static/assets/js/jquery-1.8.2.min.js');?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
 <!--   <script src="<?php echo base_url('static/bootstrap-3.3.5-dist/js/bootstrap.min.js');?>"></script> -->


    <script type="text/javascript">
      
    //删除逻辑
    function delitem(obj,delete_id) {
      var r=confirm("确定删除该用户,无法恢复")
      if (r==true){
        //删除。发送请求
        $.ajax({
          url: "<?php echo base_url('index.php/welcome/del_record');?>",
          data: {pw: 'gaozi2015', id: delete_id},
          dataType: 'json',
          type: 'post',
          success: function(res){
            if(res.status ='200'){
                //删除tr
                $(obj).parents('tr').remove();
            }
          }
        });
    }
  }

    


    var audio;//音乐对象
    //播放逻辑.点击进行切换
    //第一次点击播放，第二次点击暂停
    function playmusic(obj) {

      //直接播放
      var src = $(obj).attr('src');
      console.log(src);
      audio = new Audio(src);
      audio.play();
      //切换图标。
      //事件切换。
    }

    function stopwav(obj) {
      // body...
      audio.pause();

    }

    var audio;
    $(".playbtn").toggle(
        function(){
          var src = $(this).attr('src');
          console.log(src);
          audio = new Audio(src);
          audio.play();
          //替换class
          $(this).removeClass('glyphicon glyphicon-play').addClass('glyphicon glyphicon-pause');
          
        },
        function(){
           console.log(22);
           audio.pause();
           $(this).removeClass('glyphicon glyphicon-pause').addClass('glyphicon glyphicon-play');
        }
    );





    </script>


  </body>
</html>