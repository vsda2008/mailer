<?php
/*
1.选择出来所有
2。获得顶级栏目放入显示列表 outcate;

*/
class Model_cate extends Model{
	public $table_name = 'catesys';
	public $outcate;
	public $cate;
	public function Model_cate(){
	    parent::Model();
		$this->load->database();
	}
	function get_cate($applyfor){
		 $sql = 'SELECT * FROM `'.$this->table_name; 
		 $query = $this->db->query($sql);
		 $this->cate = $query->result_array();
		 foreach($this->cate as $k => $v){
		    if($v['pid'] == '0'){
				$this->outcate[] = $v;
				$this->_push_subcate($v['tid'],1,'---|');
		    }
		 }

         return $this->outcate;
	}
/*
	 catid 	upid 	name
	 112 	98 	西南
     110 	98 	西北 
     109 	98 	华南 
     107 	98 	华东
*/
	function _push_subcate($tid,$level,$pre){
	     foreach($this->cate as $k => $v){
			 if($v['pid'] == $tid){
				 $v['pre']=$pre.'---|';
				 $this->outcate[] = $v;
				 $this->_push_subcate($v['tid'],$level,$pre.'---|');
			 
			 }
		
		 }
	}
	function _push_topcate($pid,$level=1,$pre='|---'){
		foreach($this->cate as $k=>$v){
		   if($v['id']==$pid){
			  $v['pre']=str_repeat($pre,$level);
			  $this->outcate[] = $v;
			  $this->_push_topcate($v['pid'],++$level);
		   }
		}
	
	}
	private function push_parentcate($catid)
	{
		foreach ($this->cate as $key=>$value)
		{
			if ($value["id"] == $catid) {
				array_unshift($this->outcate,$value);
				$this->push_parentcate($value["pid"]);
			}
		}
	}
	public function get_sub_cate_by_id($id=0,$level=1){
        return $id;
	}
	public function get_top_cate_by_id($id=0,$level=0){

        $this->_push_topcate($id); 
        return $this->outcate;   
	}
	public function add_one_cate(){
	
	}
	public function del_one_cate(){
	
	}
	public function rename_cate(){
	
	}
	public function move_to_cate(){
	
	}
};





//end of model_cate.php file