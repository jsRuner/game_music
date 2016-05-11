<?php 

class Game_music_model extends CI_Model {

    public $name; 
    public $phone;
    public $video_path;
    public $dateline;
    public $video_len;
    public $status;
    public $score;
  


    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();

        if (isset($_POST['phone']) && $_POST['phone'] != '' ) {
            $entry = $this->find_entry();
            if ($entry) {
                # code...
                $this->name = $entry['name'];
                $this->phone = $entry['phone'];
                $this->video_path = $entry['video_path'];
                $this->dateline = $entry['dateline'];
                $this->video_len = $entry['video_len'];
                $this->status = $entry['status'];
                $this->score = $entry['score'];
            }else{
                $this->name = '';
                $this->phone = '';
                $this->video_path = '';
                $this->video_path = '';
                $this->video_len = 0;
                $this->status = 0;
                $this->score = 0;

            }
        }else{

            $this->name = '';
            $this->phone = '';
            $this->video_path = '';
            $this->video_path = '';
            $this->video_len = 0;
            $this->status = 0;
            $this->score = 0;
        }


    }

    public function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    public function insert_entry()
    {
        // $this->name    = $this->input->post['name']; // please read the below note
        // $this->phone  = $this->input->post['phone'];
        // $this->video_path  = $this->input->post['video_path'];
        $this->name    = $_POST['name']; // please read the below note
        $this->phone  = $_POST['phone'];
        // $this->video_path  = $this->input->post['video_path'];
        // 
        
        
        $this->dateline  = time();
        return $this->db->insert('game_music', $this);
    }

    public function update_entry($data)
    {
        // $this->name    = $_POST['name']; // please read the below note
        // $this->phone  = $_POST['phone'];
        
        // $this->video_path = $data['video_path'];


        $this->db->update('game_music', $data, array('phone' => $_POST['phone']));
    }


    public function find_entry()
    {   
        $where['phone'] = $_POST['phone'];
        // $where['video_len >'] = 'video_len';
        $this->db->where($where);
       
        // $query = $this->db->query(" SELECT * FROM  `game_music` WHERE  `phone` =  '".$_POST['phone']."'");
        // return $query
        $query = $this->db->get('game_music');
        $entrys = $query->result_array();
        if(empty($entrys)){
            return '';
        }else{

            //再查询一次排名   
            $where = array();
            $where['video_len >'] = $entrys[0]['video_len'];
            $this->db->where($where);
            $this->db->select('count(*)+1 as rank');
            $query2 = $this->db->get('game_music');
            $result2 = $query2->result_array();
            $entrys[0]['rank'] = $result2[0]['rank'];



            return $entrys[0];
        }
    }

    /**
     * 获取排行榜。
     * @return [type] [description]
     */
    public function find_entrys()
    {   
        $this->db->order_by('score desc');
        $this->db->select('id,name,phone,dateline,video_path,video_len,score');
        $query = $this->db->get('game_music');
        $entrys = $query->result_array();
        return $entrys;

       
    }

    /**
     * 删除记录
     * @return [type] [description]
     */
    public function del_entry()
    {
        $where['id'] = $_POST['id'];
        // $where['id'] = $_POST['id'];
        return $this->db->where($where)->delete('game_music');
    }

    
    

}
 ?>