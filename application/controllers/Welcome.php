<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * 
 * 软件界面。
 * 单页。3个按钮：马上玩 排行榜  设置。
 *
 * 核心：
 * php调用exe文件录音。
 *
 * 点击开始就录音。需要传递文件名。
 * 点击结束就结束。使用传递的文件名保存。
 *
 * 保存到指定的目录。
 * 
 *
 * 
 * 
 *
 *
 * 
 * 
 */

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('game_music_model');

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// header("Location")
		redirect("welcome/sing");
		// $this->load->view('welcome_message');
	}

	/**
	 * 排行榜
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function board($value='')
	{
		# code...
	}

	/**
	 * 设置
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function setting($value='')
	{
		# code...
	}

	/**
	 * 立即参与。弹窗需要填写信息
	 * 执行以后，需要等待。这是问题。
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function start($value='')
	{
		//先去目录删除end.txt文件
		if (file_exists(".\\shell\\end.txt")) {
			@unlink(".\\shell\\end.txt");
		}
		


		#获取参数。需要传递设置的录音时间和文件名。
		$save_file = ".\\data\\".time().'.wav';
		$max_time = 30;
		$end_file = ".\shell\end.txt";
		// $output = shell_exec('.\shell\gaozi.exe 10 '.$save_file);
		// echo "<pre>$output</pre>";
		$handle = popen('.\\shell\\gaozi.exe  '.$max_time.'  '.$save_file.' '.$end_file.' 2>&1', 'r');
		// echo "'$handle'; " . gettype($handle) . "\n";
		// $read = fread($handle, 2096);
		// echo $read;
		pclose($handle);
		
		
		$data = array(
			'status'=>200,
			'msg'=>'请求ok'
			// 'msg'=>$output
			// 'msg'=>$read
			);
		echo json_encode($data);
	}

	/**
	 * 录音中。。。
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function doing($value='')
	{
		# code...
	}


	/**
	 * 立即结束
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function end($value='')
	{
		#在目录下创建一个end.txt即可停止录音
		file_put_contents('.\shell\end.txt', '');
		$data = array(
			'status'=>200,
			'msg'=>'请求ok'
			);
		echo json_encode($data);
	}

	/**
	 * 立即提交。保存姓名。电话
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function saveinfo($value='')
	{
		# code...
	}

	
	public function testcmd($value='')
	{
		# code...
		$output = shell_exec('.\shell\gaozi.exe');
		echo "<pre>$output</pre>";
	}
	/**
	 * 显示文件列表。显示声音长度
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function view_files($value='')
	{
		$dir = ".\data\\";
		//获取某目录下所有文件、目录名（不包括子目录下文件、目录名）
		    $handler = opendir($dir);
		    while (($filename = readdir($handler)) !== false) {//务必使用!==，防止目录下出现类似文件名“0”等情况
		        if ($filename != "." && $filename != "..") {
		                // $files[]['filename'] = $filename ;

		                $filelen = $this->view_file_len('.\data\\'.$filename);
		                $files[] = array(
		                	'filename'=>$filename,
		                	'filelen'=>$filelen
		                	);

		                // $files[]['filelen'] = $filelen ;


		           }
		       }
		    
		    closedir($handler);
		     
		//打印所有文件名
		echo '文件名------- 时长(秒)<br />';
		foreach ($files as $value) {
		    echo $value['filename'].'---------'.$value['filelen']."<br />";
		}

		echo '<a href="http://gaozi.cc">返回</a>';


	}

	public function view_file_len($filepath)
	{
		$file = realpath($filepath); 
		$player= new COM("WMPlayer.OCX");
		$media = $player->newMedia($file);
		$time=$media->duration; 
		return $time;
		// echo "总时长:".$time."秒";
		//转换为时分秒
		// $h=floor($time/3600);
		// $m=floor(($time %3600)/60);
		// $s=floor($time-$h*3600-$m*60);
		// echo $h."时".$m."分".$s."秒";
	}

	public function sing(){
		$config_json = file_get_contents('config.txt');//max_time
		$arr = json_decode($config_json,true);
		$this->data['max_time'] = $arr['max_time'];
		$this->load->view('sing',$this->data);
	}

	/**
	 * 判断是否已经
	 * 200表示不存在
	 * 201表示异常。存在。
	 * @return [type] [description]
	 */
	public function  check_join()
	{

		$record = $this->game_music_model->find_entry();

		if (!empty($record)) {
			
			$ajaxdata = array(
				'status' =>201,
				'data'=>$record
				);

			
		}else{

			$ajaxdata = array(
				'status' =>200,
				'data'=>'不存在该手机号码'
				);
		}

		echo json_encode($ajaxdata);
		exit();
	}

	/**
	 * 报名参赛。
	 * 创建记录。
	 * 增加参赛。
	 * 增加一个参数。避免覆盖原有的数据
	 * 
	 */
	public function create_record ()
	{
		//检查参数
		//检查是否存在。如果存在则返回。不存在则插入。
		$record = $this->game_music_model->find_entry();


		if (!empty($record)) {

			$data['name'] = $_POST['name'];
			$data['phone'] = $_POST['phone'];

			//进行更新操作
			$this->game_music_model->update_entry($data);

			$result = array_merge($record,$data);

			$ajaxdata = array(
				'status' =>200,
				'data'=>$result
				);
			
			
		}else{
			//创建记录
			$result = $this->game_music_model->insert_entry();

			$ajaxdata = array(
				'status' =>200,
				'data'=>$result
				);
			
		}



		echo json_encode($ajaxdata);
		exit();
	}
	/**
	 * 调用exe录音.要去更新记录。
	 * @return [type] [description]
	 */
	public function start_video()
	{
		//先去目录删除end.txt文件
		if (file_exists(".\\shell\\end.txt")) {
			unlink(".\\shell\\end.txt");
		}
		// unlink(".\\shell\\end.txt");
		#获取参数。需要传递设置的录音时间和文件名。
		#增加手机号码的保存
		$phone = $_POST['phone'];

		$save_file = ".\\data\\".$phone."_".time().'.wav';
		$data['video_path'] = $save_file;
		$this->game_music_model->update_entry($data);

		// $max_time = 30;
		$config_json = file_get_contents('config.txt');
		$max_time = json_decode($config_json,true)['max_time'];
		$end_file = ".\\shell\\end.txt";
		// $output = shell_exec('.\shell\gaozi.exe  '.$max_time.'  '.$save_file.' '.$end_file);
		$handle = popen('.\\shell\\gaozi.exe  '.$max_time.'  '.$save_file.' '.$end_file.' 2>&1', 'r');
		pclose($handle);
		$data = array(
			'status'=>200,
			'msg'=>'请求ok'
			);
		echo json_encode($data);
		exit();
	}

	/**
	 * 结束录音。
	 * @return [type] [description]
	 */
	public function end_video()
	{
		#在目录下创建一个end.txt即可停止录音
		file_put_contents('.\\shell\\end.txt', 'end');
		$data = array(
			'status'=>200,
			'msg'=>'请求ok'
			);
		echo json_encode($data);
		exit();
	}







	/**
	 * 返回成绩结果。
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function get_record()
	{
		$record = $this->game_music_model->find_entry();

		//先判断文件是否产生。产生了则去计算文件长度
		if (file_exists($record['video_path'])) {
			# code...
			$filelen = $this->view_file_len($record['video_path']);
			// //更新数据库
			$data['video_len'] = $filelen;
			$data['score'] = $data['video_len'] ;
			$this->game_music_model->update_entry($data);

			//重新获取一次信息
			$record = $this->game_music_model->find_entry();


			$data = array(
			'status'=>200,
			'msg'=>$record
			);

		}else{
			$data = array(
			'status'=>201,
			'msg'=>'处理中'
			);

		}
		
		echo json_encode($data);
		exit();

	}

	/**
	 * 排行榜
	 * @return [type] [description]
	 */
	public function rank_list()
	{	
		$result = $this->game_music_model->find_entrys();
		 $ajaxdata = array(
            'status' =>200,
            'msg' =>$result
            );
        echo json_encode($ajaxdata);
        exit();
	}

	/**
	 * 删除记录。需要密码验证。
	 * 密码是gaozi2015
	 * @return [type] [description]
	 */
	public function del_record()
	{	
		$pw = $_POST['pw'];
		// $pw = $_GET['pw'];
		if (!empty($pw) && $pw == 'gaozi2015') {
			$result = $this->game_music_model->del_entry();
			$ajaxdata = array(
            'status' =>200,
            'msg' =>$result
            );
		}else{
			$result = '密码错误';
			$ajaxdata = array(
            'status' =>201,
            'msg' =>$result
            );
		}

		
        echo json_encode($ajaxdata);
        exit();
	}


	/**
	 * 设置。存储到文件里.
	 * 
	 * 
	 */
	public function get_config()
	{
		$config_json = file_get_contents('config.txt');
		echo $config_json;
		exit();
	}

	public function set_config()
	{	
		$config['max_time'] = $_GET['max_time'];
		file_put_contents('config.txt', json_encode($config));
		$result = array('status' => 200);
		echo json_encode($result);
		exit();
	}

	/**
	 * 导出排行榜的表格
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function explode_rank()
	{

		$export_list = $this->game_music_model->find_entrys();

		foreach ($export_list as &$value) {
			$value['dateline'] = date('Y-m-d H:i:s',$value['dateline']);
			
		}
		
		$fields = array(
            'id'=>'编号',
            'name'=>'姓名',
            'phone'=>'手机号码',
            'dateline'=>'参赛时间',
            'vide_path'=>'音频路径',
            'video_len'=>'音频长度',
            'score'=>'得分',
        );
        $this->excel_flush_export( $fields, $export_list,'排行榜');
        exit();
	}

	

    //大数据量的csv导出
    public function excel_flush_export( $fields, $list, $title)
    {
        set_time_limit(0);
        ini_set ('memory_limit', '256M');
        $csv_file = $title.'_'.date('Ymd').'.csv';
        // 输出Excel文件头
        header('Content-Type: application/vnd.ms-excel;charset=gbk');
        header('Content-Disposition: attachment;filename='.$csv_file);
        header('Cache-Control: max-age=0');

        // PHP文件句柄，php://output 表示直接输出到浏览器
        $fp = fopen('php://output', 'a');

        // 输出Excel列头信息
        foreach ($fields as $k => $v) {
            // CSV的Excel支持GBK编码，一定要转换，否则乱码
            $fields[$k] = mb_convert_encoding($v, 'gbk', 'utf-8');    //iconv('utf-8', 'gbk', $v);
        }

        // 写入列头
        fputcsv($fp, $fields);

        // 计数器
        $cnt = 0;
        // 每隔$limit行，刷新一下输出buffer，节约资源
        $limit = 100000;

        // 逐行取出数据，节约内存
        foreach($list as $lv) {
            $cnt ++;
            if ($limit == $cnt) { //刷新一下输出buffer，防止由于数据过多造成问题
                ob_flush();
                flush();
                $cnt = 0;
            }

            foreach ($lv as $ik => $iv) {
                $iv = str_replace("\n", "", str_replace("\r", "", $iv));
                //$iv = htmlspecialchars($iv);
                //$row[$ik] = iconv('utf-8', 'gbk', $iv);
                $row[$ik] = mb_convert_encoding($iv, 'gbk', 'utf-8')."\t";
            }
            fputcsv($fp, $row);
        }
    }


    /**
     * 提示输入密码的界面。输入密码以后显示。列表。可以删除与导出。
     * 输入密码。则可以
     * ajax登录
     * @return [type] [description]
     */
    public function login()
    {	
    	$this->load->library('session');
    	$ajaxdata = array();

    	if ($this->input->post()) {
    		// 判断是否可以登录
    		$username = $this->input->post('username')?$this->input->post('username'):'';
    		$password = $this->input->post('password')?$this->input->post('password'):'';

    		if ($username =='admin' && $password =='gaozi2015') {
    				$this->session->set_userdata('uid','1');
    				$ajaxdata['status'] = 200;
    				$ajaxdata['msg'] = '登录成功';
    		}else{
    			$ajaxdata['status'] = 201;
    			$ajaxdata['msg'] = '账号或密码错误';

    		}

    		echo json_encode($ajaxdata);
    		exit();
    	}else{
    		$this->data = array();
    		$this->load->view('login',$this->data);
    	}
    	
    }

   


    /**
     * 管理界面.
     * 需要查询操作
     * @return [type] [description]
     */
    public function manage2()
    {	
    	//如果uid存在则说明登录了。否则退出。
    	if($this->session->userdata('uid') == 1){

    	}else{
    		die('你无法访问这里。因为你没有登录。');
    	}

    	$this->load->library('pagination');

		$config['base_url'] = 'http://gaozi.cc/index.php/welcome/manage/page/';
		$config['total_rows'] = $this->db->count_all('game_music');
		$config['per_page'] = 20;

		$this->pagination->initialize($config);


		$this->data['pagination'] = $this->pagination->create_links();

    	$result = $this->game_music_model->find_entrys();
    	$this->data['rank_list'] = $result;
    	$this->load->view('manage',$this->data);
    }

    public function manage($value='')
    {
    	$this->load->library('session');
    	if($this->session->userdata('uid') != 1){
    		die('你无法访问这里。因为你没有登录。');
    	}

    	$data = array();

        $this->load->library('pagination');

        $phone = !empty($_GET['phone']) ? $this->input->get('phone') : false;
        #如果存在搜索。则需要增加参数。
        $config['base_url'] = 'http://gaozi.cc/index.php/welcome/manage?';
        if ($phone) {
            $this->db->like('phone', $phone);
            $config['base_url'] .= "&phone=" . $phone; #基础url后添加参数

        }
        // $this->db->where('status =0');
        $config['total_rows'] = $this->db->count_all_results('game_music');
        $config['per_page'] = 20;
        $config['prev_link'] = '上一页';
        $config['next_link'] = '下一页';
        $config['last_link'] = '末页';
        $config['first_link'] = '首页';
        $config['use_page_numbers'] = TRUE; #显示页数
        // $config['cur_tag_open'] = "<b class='current'>";
        // $config['cur_tag_close'] = '</b>';
        $config['page_query_string'] = TRUE; #为了支持其他的url参数，分页参数会自动在后面追加。

        $config['full_tag_open'] = '<ul class="pagination">';

        $config['full_tag_close'] = '</ul>';

        $config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li><a href="#" style="color:red;background-color:#efefef;">';
		$config['cur_tag_close'] = '</a></li>';





        $p = is_numeric($this->input->get('per_page')) ? $this->input->get('per_page') : 1;


        $start = $config['per_page'] * ($p - 1);

        if ($phone) {
           $this->db->like('phone', $phone);
        }
        $this->db->order_by('score','desc');
        $list = $this->db->get('game_music',$config['per_page'],$start)->result_array();

        $this->pagination->initialize($config);
        //计算总的分页数。
        $allpage = ceil(($config['total_rows'] / $config['per_page']));

        $this->data['tongji'] = '当前第'.$p.'/'.$allpage.'页,共计'.$config['total_rows'].'记录';

        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['rank_list'] = $list;
        if($phone){
	        $this->data['phone'] = $phone;
        }
    	$this->load->view('manage',$this->data);
        
    }

   	public function loginout(){
   		$this->load->library('session');
   		$this->session->unset_userdata('uid');
   		header("Location:".base_url('index.php/welcome/login'));
   	}









}
