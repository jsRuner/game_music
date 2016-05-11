<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" id="viewport" content="width = device-width, initial-scale = 1, minimum-scale = 1, maximum-scale = 1, user-scalable=no">
<title>唱歌</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/bootstrap.min.css'); ?>" />
<script type="text/javascript" src="<?php echo base_url('static/jquery-1.12.3.min.js'); ?>"></script>
<style type="text/css">
/*----- reset css -----*/
body,dl,dd,ul,ol,h1,h2,h3,h4,h5,h6,pre,p,fieldset,input,textarea,blockquote{margin: 0;}
ul,ol,input,textarea,fieldset,th,td{padding: 0;}
fieldset,img,abbr,acronym{border: 0;}
ol,ul{list-style: none;}
input,textarea{border-width: 1px;}
address,caption,cite,code,dfn,em,strong,th,var{font-weight: normal;font-style: normal;}
table{border-collapse: collapse;border-spacing: 0;}
h1,h2,h3,h4,h5,h6{font-weight: normal;font-size: 100%;}
q:before,q:after{content:'';}
img{vertical-align: top;}
caption,th{text-align: left;}
a{color: #000; text-decoration: none; cursor: pointer;}
/* reset css end */
body.ovh{overflow: hidden;}
body{background: #000; overflow: hidden;}
img{width: 100%;}
#fwrap{left: 0; top: 0; right: 0; bottom: 0; z-index: 9; background: rgba(0,0,0,0.6);}
/*弹窗*/
.error-tips{background-color: rgba(0, 0, 0, 0.75); border-radius: 5px; color: #fff; height: 100px; left: 50%; line-height: 100px; margin-left: -100px; margin-top: -50px; position: fixed; text-align: center; top: 50%; width: 200px;}
.show-loading{height: 100%; width: 100%; background: url("<?php echo base_url('static/images/loading.gif'); ?>") no-repeat center center;}
.fos36{font-size: 36px;}
.fos72{font-size: 72px;}
.fos16{font-size: 16px;}
.fos20{font-size: 20px;}
.fow600{font-weight: 600;}
.w44{width: 44%;}
.w100{width: 100%;}
.new_rel{position: relative;}
.new_abs{position: absolute;}
.new_fix{position: fixed;}
.hide{display: none!important;}
.no-display{display: none;}
.page-index{height: 100%; width: 100%;}

/* 显示隐藏 */
body.a .unit-a,
body.b .unit-b,
body.c1 .unit-c1,
body.c2 .unit-c2,
body.c3 .unit-c3,
body.e .unit-e,
body.g .unit-g,
body.i .unit-i{display: block;}

/* 对应的模块 */
.unit-abs{left: 0; top: 0; right: 0; bottom: 0; z-index: 2;}
.unit-a-a{width: 25%; left: 53%; top: 64.42%;}
.unit-a-b{width: 8.5%; right: 14.7%; bottom: 10%;}
.unit-a-c{left: 6%; bottom: 10%; color: #000; font-size: 18px;}
.unit-b-a{width: 40.2%; height: 31.4%; left: 32%; top: 41.4%;}
.unit-c-a,
.unit-c-b,
.unit-c-d{width: 25%; left: 38.8%; top: 77%; z-index: 99;}
.unit-c-c{left: 6%; bottom: 10%; color: #fff; font-size: 18px;}
.unit-e-a{width: 50%; left: 27.5%; top: 46.42%; height: 15%;}
.unit-e-b{height: 5%; left: 79%; top: 37.42%; width: 5%;}
.unit-e-c{height: 5%; left: 61.5%; top: 40%; width: 14.5%; font-size: 67px; line-height: 67px; color: #ffed6e;}
.unit-g-a{height: 51%; left: 21.5%; top: 33%; width: 55%;}
.unit-g-b{height: 5%; left: 76.2%; top: 30%; width: 5%;}
.unit-i-a{height: 14%; left: 18%; top: 44%; width: 58%;}
.unit-i-b{height: 5%; left: 75.5%; top: 35.5%; width: 5%;}

.btn-join,.btn-list{display: block;}
.btn-list{width: 90.4%; margin: 0 auto; display: block;}

.row-group{margin-top: 2%; margin-left: 24%; margin-bottom: 3%; height: 14%; position: relative;}
.row-group1{height: 17.5%; margin-bottom: 2.9%; margin-left: 32.4%; margin-top: 6.7%; width: 39%;}
.row-group2{height: 17.5%; margin-top: 0; margin-left: 32.4%; width: 39%;}
.row-group3{margin-top: 1.5%; height: 27%;}
.row-group4{position: relative; height: 12%;}
.row-group5{position: relative; height: 74%; margin-bottom: 5px;}
.row-group6{position: relative; height: 10%;}
.row-group1 a,.row-group2 a{display: block; height: 100%; width: 100%; position: relative; text-indent: -999px; overflow: hidden;}
.row-group3 .input-group-addon,.row-group4 .input-group-addon,.row-group5 .input-group-addon,.row-group6 .input-group-addon{background: none; border: none;}
.row-group4,.row-group5,.row-group4 .input-group,.row-group5 .input-group{display: block; margin-top: 5px;}
.row-group4 .input-group-addon,.row-group5 .input-group-addon{width: 20%; display: inline-block; vertical-align: middle;}
.row-group3.user-score{width: 100%; display: block;}
.row-group3.user-score .input-group-addon{width: 33.3333%; display: inline-block; vertical-align: middle;}
.row-group5 .play img{width: 30px;}
.row-group6 .input-group-addon{text-align: right;}
.list-ova{overflow-y: auto; overflow-x: hidden;}
.btn-label{background: none; border: none; font-size: 20px;}
.btn-input{background: rgba(255,255,255,0.15); border: none; font-size: 20px; height: 100%; position: relative;}
.form-control.btn-input{height: 50px; line-height: 50px;}
.tshadow1{text-shadow: 0 1px 0 rgba(0,0,0,0.9);}
.tshadow2{text-shadow: 0 2px 0 rgba(0,0,0,0.9);}
.cfff{color: #fff;}
.cfff:hover,.cfff:focus{color: #fff; text-decoration: none;}
.bora5{border-radius: 5px!important;}
.pad8_50{padding: 8px 50px;}
.dlb{display: inline-block;}
.bg909090.input-group-addon,.bg909090{background: #909090;}
a:focus{outline: none; outline-offset: none;}
.mar-8b{margin-right: -8%;}

.countdown{color: #ffe046; text-shadow: 0 7px 0 rgba(0,0,0,0.72); left: 7%; width: 90%; top: 39%; font-size: 255px; line-height: 255px;}
.music_flash{left: 0; top: 0; width: 50%; height: 34%; z-index: 3;}
.text_flash{left: 0; top: 33%; height: 33%; width: 100%; z-index: 2; background: url("<?php echo base_url('static/images/sing_text.png'); ?>") repeat 0 0;}
.sing_img{left: 43.2475%;top: 13%; width: 21.5%; z-index: 100;}
.people{height: 29.928%; left: 0; top: 48%; width: 100%; z-index: 3;}
.people_l{left: -100%; top: 0; height: 100%; width: 41.5%;}
.people_r{right: -100%; top: 0; height: 100%; width: 36.7%;}
.people img{height: 100%; width: auto;}
.scaleRun{
	display: block;
	-ms-animation: 0.6s linear 0s normal both infinite running scaleMe;
    -webkit-animation: 0.6s linear 0s normal both infinite running scaleMe;
    -moz-animation: 0.6s linear 0s normal both infinite running scaleMe;
    -o-animation: 0.6s linear 0s normal both infinite running scaleMe;
    animation: 0.6s linear 0s normal both infinite running scaleMe;
}
@-ms-keyframes scaleMe{
	0%{
		-ms-transform: scale(1);
	}
	40%{
		-ms-transform: scale(1.1);
	}
	100%{
		-ms-transform: scale(1);
	}
}
@-webkit-keyframes scaleMe{
	0%{
		-webkit-transform: scale(1);
	}
	40%{
		-webkit-transform: scale(1.1);
	}
	100%{
		-webkit-transform: scale(1);
	}
}
@-moz-keyframes scaleMe{
	0%{
		-moz-transform: scale(1);
	}
	40%{
		-moz-transform: scale(1.1);
	}
	100%{
		-moz-transform: scale(1);
	}
}
@-o-keyframes scaleMe{
	0%{
		-o-transform: scale(1);
	}
	40%{
		-o-transform: scale(1.1);
	}
	100%{
		-o-transform: scale(1);
	}
}
@keyframes scaleMe{
	0%{
		transform: scale(1);
	}
	40%{
		transform: scale(1.1);
	}
	100%{
		transform: scale(1);
	}
}


.music_flash img{
	-ms-animation: 2s linear 0s normal both infinite running rotateMe;
    -webkit-animation: 2s linear 0s normal both infinite running rotateMe;
    -moz-animation: 2s linear 0s normal both infinite running rotateMe;
    -o-animation: 2s linear 0s normal both infinite running rotateMe;
    animation: 2s linear 0s normal both infinite running rotateMe;
}
@-webkit-keyframes rotateMe{
	0%{
		-webkit-transform: rotate(0deg);
		transform: rotate(0deg);
	}
	100%{
		-webkit-transform: rotate(360deg);
		transform: rotate(360deg);
	}
}
@-moz-keyframes rotateMe{
	0%{
		-moz-transform: rotate(0deg);
		transform: rotate(0deg);
	}
	100%{
		-moz-transform: rotate(360deg);
		transform: rotate(360deg);
	}
}
@-o-keyframes rotateMe{
	0%{
		-o-transform: rotate(0deg);
		transform: rotate(0deg);
	}
	100%{
		-o-transform: rotate(360deg);
		transform: rotate(360deg);
	}
}
@-ms-keyframes rotateMe{
	0%{
		-ms-transform: rotate(0deg);
		transform: rotate(0deg);
	}
	100%{
		-ms-transform: rotate(360deg);
		transform: rotate(360deg);
	}
}
@keyframes rotateMe{
	0%{
		transform: rotate(0deg);
	}
	100%{
		transform: rotate(360deg);
	}
}
</style>
</head>
<body class="a">
	<!-- 所有页面 -->
	<div id="wrap">
		<!-- 首页 -->
		<div class="page-index new_rel">
			<img class="unit-a no-display" src="<?php echo base_url('static/images/a.jpg'); ?>" />
			<img class="unit-b no-display" src="<?php echo base_url('static/images/b.jpg'); ?>" />
			<img class="unit-c1 no-display" src="<?php echo base_url('static/images/c1.jpg'); ?>" />
			<img class="unit-c2 no-display" src="<?php echo base_url('static/images/c2.jpg'); ?>" />
			<img class="unit-e no-display" src="<?php echo base_url('static/images/e.jpg'); ?>" />
			<img class="unit-g no-display" src="<?php echo base_url('static/images/g.jpg'); ?>" />
			<img class="unit-i no-display" src="<?php echo base_url('static/images/i.jpg'); ?>" />
			<div class="new_abs unit-abs unit-a no-display">
				<div class="new_abs unit-a-a">
					<a class="btn-join" href="#"><img src="<?php echo base_url('static/images/join.png'); ?>"></a>
					<a class="btn-list" href="#"><img src="<?php echo base_url('static/images/list.png'); ?>"></a>
				</div>
				<div class="new_abs unit-a-b">
					<a class="btn-set" href="#"><img src="<?php echo base_url('static/images/set.png'); ?>"></a>
				</div>
				<div class="new_abs unit-a-c">
					<div class="">本活动解释权归高姿化妆品有限公司所有</div>
				</div>
			</div>
			<div class="new_abs unit-abs unit-b no-display">
				<div class="new_abs unit-b-a">
					<div class="row-group">
						<input class="form-control btn-input cfff" name="name" />
					</div>
					<div class="row-group">
						<input class="form-control btn-input cfff" name="phone" />
					</div>
					<div class="row-group text-center row-group1">
						<a class="btn-b-confirm" href="#">确认</a>
					</div>
					<div class="row-group text-center row-group2">
						<a class="btn-b-cancel" href="#">取消</a>
					</div>
				</div>
			</div>
			<div class="new_abs unit-abs unit-c1 no-display">
				<div class="new_abs unit-c-a">
					<a class="btn-start" href="#"><img src="<?php echo base_url('static/images/start.png'); ?>"></a>
				</div>
				<div class="new_abs countdown hide text-center">5</div>
				<div class="new_abs unit-c-c">
					<div class="">本活动解释权归高姿化妆品有限公司所有</div>
				</div>
			</div>
			<div class="new_abs unit-abs unit-c2 no-display">
				<div class="new_abs unit-c-a">
					<a class="btn-end" href="#"><img src="<?php echo base_url('static/images/end.png'); ?>"></a>
				</div>
				<div class="new_abs unit-c-b hide">
					<a class="btn-reset" href="#"><img src="<?php echo base_url('static/images/reset.png'); ?>"></a>
				</div>
				<div class="new_abs unit-c-d hide">
					<a href="#"><img src="<?php echo base_url('static/images/loading.png'); ?>"></a>
				</div>
				<div class="new_abs unit-c-c">
					<div class="">本活动解释权归高姿化妆品有限公司所有</div>
				</div>
				<div class="new_abs music_flash"></div>
				<div class="new_abs text_flash"></div>
				<div class="new_abs sing_img"><img src="<?php echo base_url('static/images/sing.png'); ?>"></div>
				<div class="new_abs people">
					<div class="new_abs people_l">
						<img src="<?php echo base_url('static/images/people_l.png'); ?>">
					</div>
					<div class="new_abs people_r">
						<img src="<?php echo base_url('static/images/people_r.png'); ?>">
					</div>
				</div>
			</div>
			<div class="new_abs unit-abs unit-e no-display">
				<div class="new_abs unit-e-a">
					<div class="input-group row-group3">
						<span class="input-group-addon fos20 tshadow1 cfff">姓名</span>
						<span class="input-group-addon fos20 tshadow1 cfff">手机</span>
						<span class="input-group-addon fos20 tshadow1 cfff">分数</span>
					</div>
					<div class="input-group row-group3 user-score">
						<span class="input-group-addon fos20 tshadow1 cfff">吃枣药丸</span><span class="input-group-addon fos20 tshadow1 cfff">13686787879</span><span class="input-group-addon fos20 tshadow1 cfff">36.9s</span>
					</div>
					<div class="input-group row-group3">
						<div class="input-group-addon">
							<a class="btn-return cfff tshadow1 btn-input pad8_50 bora5" href="#">返回首页</a>
						</div>
					</div>
				</div>
				<a class="new_abs unit-e-b close-return" href="#close"></a>
				<div class="new_abs unit-e-c text-center tshadow2">1</div>
			</div>
			<div class="new_abs unit-abs unit-g no-display">
				<div class="new_abs unit-g-a">
					<div class="input-group row-group4">
						<span class="input-group-addon fos36 fow600 tshadow2 cfff">排名</span><span class="input-group-addon fos36 fow600 tshadow2 cfff">姓名</span><span class="input-group-addon fos36 fow600 tshadow2 cfff">手机</span><span class="input-group-addon fos36 fow600 tshadow2 cfff">分数</span><span class="input-group-addon fos36 fow600 tshadow2 cfff">播放</span>
					</div>
					<div class="list-ova row-group5"></div>
					<div class="input-group row-group6">
						<div class="input-group-addon">
							<a class="btn-return cfff tshadow1 btn-input pad8_50 bora5 mar-8b" href="#">返回首页</a>
						</div>
					</div>
				</div>
				<a class="new_abs unit-g-b close-return" href="#close"></a>
			</div>
			<div class="new_abs unit-abs unit-i no-display">
				<div class="new_abs unit-i-a">
					<div class="input-group row-group3">
						<span class="input-group-addon fos20 tshadow1 cfff">最大录音时长 ： </span>
						<input class="form-control btn-input cfff" name="set_time" value="<?php echo  $max_time;?>" />
						<span class="input-group-addon fos20 bg909090 tshadow1 cfff">秒</span>
					</div>
					<div class="input-group row-group3">
						<div class="input-group-addon">
							<a class="btn-set-confirm cfff tshadow1 btn-input pad8_50 bora5" href="#">确认</a>
						</div>
					</div>
				</div>
				<a class="new_abs unit-i-b close-return" href="#close"></a>
			</div>
		</div>
	</div>

	<!-- 弹窗 -->
	<div id="fwrap" class="new_fix hide">
		<div class="show-loading new_abs">
		</div>
	</div>

	<!-- 隐藏的元素 -->
	<div id="hwrap" class="hide">
		<video src="<?php echo base_url('data/play.mp3'); ?>" id="play_video"></video>
	</div>
<script type="text/javascript">
$(document).ready(function(){
	//屏幕响应
	function resizeWindow(){
		var width = $(window).width();
		var height = $(window).height();
		if(width / height < 20 / 14){
			var _height = height;
			var _width = _height / 14 * 20 >> 0;
			$('#wrap').css({
				margin: '0px 0 0 ' + (width - (height / 14 * 20 >> 0)) / 2 + 'px'
			});
			$('.unit-a, .unit-b, .unit-c1, .unit-c2, .unit-c3, .unit-e, .unit-g, .unit-i').css({
				width: _width,
				height: _height
			});
		}else{
			var _width = width;
			var _height = _width / 20 * 14 >> 0;
			$('#wrap').css({
				margin: (height - (width / 20 * 14 >> 0)) / 2 + 'px auto 0'
			});
			$('.unit-a, .unit-b, .unit-c1, .unit-c2, .unit-c3, .unit-e, .unit-g, .unit-i').css({
				width: _width,
				height: _height
			});
		}
	};
	resizeWindow();
	$(window).resize(function(){
		resizeWindow();
	});

	var Flash = function(){
		this.status = false;
		this.len = 5;
		this.speed = 400;
		this.path = "<?php echo base_url('static/images/music/music_'); ?>";
	};

	Flash.prototype = {
		_init: function(obj,text){
			var that = this;
			that.$el = $(obj);
			that.status = true;
			that._run();
		},
		_run: function(){
			var that = this;
			function run(){
				if(that.status == false){
					return false;
				}
				var i = Math.random() * that.len >> 0;
				var img = new Image();
				img.src = that.path + i + '.png';
				img.style.right = 0;
				img.style.bottom = 0;
				img.style.width = '10px';
				img.style.height = '10px';
				img.className = 'new_abs';
				img.onload = function(){
					var width = this.width;
					var height = this.height;
					that.$el.append(this);
					var time = (Math.random() * 3000 >> 0) + 2000;
					$(this).animate({
						right: '100%',
						bottom: '100%',
						width: width,
						height: height
					}, time, function(){
						$(this).remove();
					});
				};
				setTimeout(run,that.speed);
			}
			run();
		},
		_end: function(){
			var that = this;
			that.status = false;
		}
	};
	var flash = new Flash();

	//js页面逻辑
	//设置
	$('.btn-set').click(function(e){
		e.preventDefault();
		$('body')[0].className = 'i';
	});
	//确定设置
	$('.btn-set-confirm').click(function(e){
		e.preventDefault();
		set_config();
		//$('body')[0].className = 'a';
	});
	//排行榜
	$('.btn-list').click(function(e){
		e.preventDefault();
		rank_list();
		//$('body')[0].className = 'g';
	});
	//立即参加
	$('.btn-join').click(function(e){
		e.preventDefault();
		$('body')[0].className = 'b';
	});
	//立刻参加确认
	$('.btn-b-confirm').click(function(e){
		e.preventDefault();
		check_join();
		//$('body')[0].className = 'c1';
	});
	//立刻参加取消
	$('.btn-b-cancel').click(function(e){
		e.preventDefault();
		$('body')[0].className = 'a';
	});
	//返回首页 & 关闭当前界面
	$('.btn-return,.close-return').click(function(e){
		e.preventDefault();
		$('body')[0].className = 'a';
		var wav = $('#play_video')[0];
		wav.pause();
	});
	//开始录音
	$('.btn-start').click(function(e){
		e.preventDefault();
		if($(this).hasClass('on')){
			return false;
		}
		$(this).addClass('on');
		countdown();
		//$('body')[0].className = 'c2';
		//flash._init('.music_flash');
		//$('.sing_img img').addClass('scaleRun');
	});
	//结束录音
	$('.btn-end').click(function(e){
		e.preventDefault();
		end_video();
		$('.unit-c2 .unit-c-a').addClass('hide');
		$('.unit-c2 .unit-c-d').removeClass('hide');
		if(text_flash_timer){
			clearTimeout(text_flash_timer);
			text_flash_timer = null;
		}
		$('.sing_img img').removeClass('scaleRun');
		flash._end();
	});
	//再来一次
	$('.btn-reset').click(function(e){
		e.preventDefault();
		$('.unit-c-a').removeClass('hide');
		$('.unit-c-b').addClass('hide');
		$('body')[0].className = 'a';
	});
	//播放录音
	$(document).on('click','.play',function(e){
		e.preventDefault();
		var src = $(this).data('wav');
		var wav = $('#play_video')[0];
		wav.src = src;
		wav.play();
	});


//////////////////////////////////////////////////////////
	//存储用户数据
	var User = {};

	//配置
	function set_config(){
		var singtime = $('input[name="set_time"]').val();
		var rex = /\d+/;
		if(!rex.test(singtime) || singtime <= 0){
			message_model('请输入整数');
			return false;
		}
		$('#fwrap').removeClass('hide');
		//提交配置
		$.ajax({
			url: 'set_config',
			data: {max_time: singtime},
			dataType: 'json',
			type: 'get',
			success: function(res){
				if(res.status == 200){
					//console.log('设置成功');
					setTimeout(function(){
						$('#fwrap').addClass('hide');
						message_model('设置成功');
						$('body')[0].className = 'a';
					},200);
				}
			},
			error: function(e){
				console.log(e);
			}
		});
	};

	//报名
	function check_join(){
		var bool = true;
		$('.unit-b-a input').each(function(){
			if($(this).val().length == 0){
				bool = false;
			}
		});
		if(!bool){
			message_model('输入不能为空');
			return false;
		}
		var name = $('.unit-b-a input[name="name"]').val();
		var phone = $('.unit-b-a input[name="phone"]').val();
		var rex = /1\d{10}/;
		if(!rex.test(phone)){
			message_model('手机号码无效');
			return false;
		}

		User.name = name;
		User.phone = phone;

		// console.log(User);

		//提交用户数据。先创建记录。
		$('#fwrap').removeClass('hide');
		$.ajax({
			url: "<?php echo base_url('index.php/welcome/check_join');?>",
			data: User,
			dataType: 'json',
			type: 'post',
			success: function(res){
				if(res.status != 200){
					if(!confirm('用户已经存在，是否再次参加?')){
						$('#fwrap').addClass('hide');
						return false;
					}
				}
				$.ajax({
					url: "<?php echo base_url('index.php/welcome/create_record');?>",
					data: User,
					dataType: 'json',
					type: 'post',
					success: function(res){
						setTimeout(function(){
							$('.unit-b-a input').val('');
							$('#fwrap').addClass('hide');
							$('body')[0].className = 'c1';
						},200);
					},
					error: function(e){
						// setTimeout(postRecord,5000);
						//console.log(e);
					}
				});
			},
			error: function(e){
				// setTimeout(postRecord,5000);
				console.log(e);
			}
		});
	}

	//存储排行榜数据
	var Ranking = {};
	//排行榜
	function rank_list(){
		$.ajax({
			url: 'rank_list',
			data: User,
			dataType: 'json',
			type: 'post',
			success: function(res){
				if(res.status == 200){
					if(JSON.stringify(Ranking) == JSON.stringify(res.msg)){
						//一样的json
					}else{
						Ranking = res.msg;
						create_ranking(res.msg);
					}
					$('body')[0].className = 'g';
				}
			},
			error: function(e){
				console.log(e);
			}
		});
	}
	

	//构造排行榜
	function create_ranking(data){
		var str = '';
		$.each(data,function(i){
			var j = i+1;
			str += '<div class="input-group">'
					+'<span class="input-group-addon fos20 tshadow1 cfff">'+j+'</span>'
					+'<span class="input-group-addon fos20 tshadow1 cfff">'+this.name+'</span>'
					+'<span class="input-group-addon fos20 tshadow1 cfff">'+this.phone+'</span>'
					+'<span class="input-group-addon fos20 tshadow1 cfff">'+this.score+'</span>'
					+'<span class="input-group-addon fos20 tshadow1 cfff"><a href="#" data-wav="'+create_link(this.video_path)+'" class="play"><img src="<?php echo base_url("static/images/play.png"); ?>"></a></span>'
				+'</div>';
		});
		$('.list-ova').html(str);
	}

	//构造录音路径
	function create_link(link){
		var rex = /\.\\data\\/;
		var host = "<?php echo base_url();?>data/";
		return link.replace(rex,host);
	}

	//文字效果
	var text_flash_timer = null;
	function text_flash(){
		var i = 0, j = 0;
		var temp = 0;
		function text_run(){
			i++;
			if(i % 100 == 0){
				temp ++;
			}
			if(temp % 2 == 1){
				j++;
			}else{
				j--;
			}
			$('.text_flash').css('background-position', i + 'px ' + j + 'px');
			text_flash_timer = setTimeout(text_run,10);
		}
		text_run();
	}
	
	//倒计时
	var counttime = 5;
	function countdown(){
		//console.log(counttime);
		var time = counttime;
		$('.countdown').html(time).removeClass('hide');
		setTimeout(run,1000);
		function run(){
			time --;
			if(time ==1){
				recording();
			}
			if(time <= 0){
				$('.unit-c2 .unit-c-a').removeClass('hide');
				$('.unit-c2 .unit-c-d').addClass('hide');
				$('.btn-start').removeClass('on');
				$('.countdown').addClass('hide');
				$('body')[0].className = 'c2';
				flash._init('.music_flash');
				$('.sing_img img').addClass('scaleRun');
				$('.people_l').stop().animate({left: 0},2200);
				$('.people_r').stop().animate({right: 0},1800);
				text_flash();
				// recording();
				return false;
			}
			$('.countdown').html(time);
			setTimeout(run,1000);
		}
	}

	//录音开始
	function recording(){
		//开启录音
		$.ajax({
			url: "<?php echo base_url('index.php/welcome/start_video');?>",
			data: User,
			dataType: 'json',
			type: 'post',
			success: function(res){
				// setTimeout(postRecord,5000);
			},
			error: function(e){
				// setTimeout(postRecord,5000);
				//console.log(e);
			}
		});
		
	}

	//录音结束
	function end_video(){
		$('#fwrap').removeClass('hide');
		setTimeout(postRecord,500);
		$.ajax({
			url: "<?php echo base_url('index.php/welcome/end_video');?>",
			data: User,
			dataType: 'json',
			type: 'post',
			success: function(res){
				//setTimeout(postRecord,500);
			},
			error: function(e){
				//setTimeout(postRecord,500);
				//console.log(e);
			}
		});
	}

	//提取录音文件
	function postRecord(){
		//这里需要发送请求。
		$.ajax({
			url: "<?php echo base_url('index.php/welcome/get_record');?>",
			data: User,
			dataType: 'json',
			type: 'post',
			success: function(res){
				if(res.status == 201){
					setTimeout(postRecord,1000);
				}else if(res.status == 200){
					setTimeout(function(){
						$('#fwrap').addClass('hide');
						message_model('录音成功!');
						$('body')[0].className = 'e';
						var height = $('.unit-e-c').height();
						$('.unit-e-c').css({
							'font-size': height + 'px',
							'line-height': height + 'px'
						});
						$('.unit-e-c').html(res.msg.rank);
						$('.unit-e-a .user-score span:eq(0)').html(User.name);
						$('.unit-e-a .user-score span:eq(1)').html(User.phone);
						$('.unit-e-a .user-score span:eq(2)').html(res.msg.score + 's');
					},500);
				}
			},
			error: function(e){
				// setTimeout(postRecord,5000);
				//console.log(e);
			}
		});
	}

	//弹窗效果
    function message_model(mes){
    	$('.error-tips').remove();
        var htmls = '<div class="error-tips" style="z-index:999;width:400px;margin-left:-200px; font-size: 20px;">'+mes+'</div>';
        $('body').append(htmls);
        $('.error-tips').animate({'opacity': 0}, {duration: 3000, complete: function () {
            $(this).remove();
        }});
    }

});
</script>
</body>
</html>
