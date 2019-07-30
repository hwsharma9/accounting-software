<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends MY_Controller {
	
	public function getAjaxCity()
	{
		$city = $this->common->getData("cities",array('state_id'=>$_POST['sid']),array('city_id','city_name'))->getResult();
		$html = '';
		$html .= '<option value="">Select City</option>';
		if(!empty($city))
		{
			foreach($city as $key => $value):
				$html .= '<option value="'.$value['city_id'].'">'.$value['city_name'].'</option>';
			endforeach;
		}
		echo $html;die;
	}

	public function deleteAjax()
	{
		$this->common->deleteData($_POST['table'],$_POST['where']);
		if (isset($_POST['image']) && !empty($_POST['image'])) {
			if (file_exists($_POST['image'])) {
				$pathinfo = pathinfo($_POST['image']);
				unlink($_POST['image']);
				rmdir($pathinfo['dirname']);
			}
		}
		echo $this->db->affected_rows();die;
		// echo 1;die;
	}

	public function updateStatusAction(){
		$where = $_POST['where'];
		$setfield = $_POST['setfield'];
		$table = $_POST['table'];
		$setvalue = $_POST['value'];
		$this->common->updateData($_POST['table'],array($setfield=>$setvalue),$_POST['where']);
		echo $this->db->affected_rows();die;
	}

	public function test()
	{
		$data = $this->db->query("SELECT member_id,sum(amount) as sumamount FROM `member_account` where fee_submission_type = 2 GROUP BY member_id")->result_array();
		echo "<pre>";
		print_r ($data);
		echo "</pre>";
	}

	public function getQuery()
	{
		$tables = $this->db->list_tables();

		foreach ($tables as $table)
		{
			echo '<a href="'.base_url(uri_string()."?status=show&table=".$table).'">'.$table."</a><br>";
		}
		$procedure = $this->db->query("SHOW PROCEDURE STATUS WHERE `Db` = '".$this->db->database."'")->row_array();
		if ($procedure) {
			echo "<pre><h1>Procedures</h1>";
			print_r ($procedure);
			echo "</pre>";
		}
		if (isset($_GET['status']) && !empty($_GET['status'])) {
			$table = (isset($_GET['table']) && !empty($_GET['table']))?$_GET['table']:"";
			if ($this->db->table_exists($table))
			{
				$result = $this->db->query("show create table ".$table)->row_array();
				if ($result) {
					echo "<pre><h1>Create Table Query</h1>";
					echo $this->db->last_query()."<br>";
					print_r ($result);
					echo "</pre>";
					$table_data = $this->db->query("select * from ".$table)->result_array();
					if ($table_data) {
						$query = "";
						foreach ($table_data as $key => $value) {
							if ($key%100 == 0) {
								$query .= ($key!=0?';<br>':'');
								$query .= ($key%100 == 0)?"<br>INSERT INTO ".$table." (`".implode("`,`", array_keys($table_data[0]))."`) VALUES <br>":"";
							}
							$query .= ($key%100 != 0?',<br>':'')."('".implode("','", array_map( 'addslashes', $value ))."')";
						}
						echo $query.";";
					}
				}
				if (isset($result['Table'])) {

					$triggers = $this->db->query("show triggers from ".$this->db->database." WHERE `Table` = '".$table."'")->result_array();
					if ($triggers) {
						echo "<pre><h1>Triggers</h1>";
						print_r ($triggers);
						echo "</pre>";
					}
				}
			}else{
				echo "Table not found!";
			}
		}
	}

	public function makeATree()
	{
		$members = $this->common->getData("member_details",array(),array("member_id","member_name","parent"))->orderBy("parent desc")->getResult();
    	/*if ($members) {
    		foreach ($members as $key => $value) {
    			$this->common->updateData("members",array("parent"=>rand(1,10)),array("member_id"=>$value['member_id']));
    		}
    	}*/
    	$data['tree'] = json_encode($this->buildTree($members));
    	$this->load->view("loan/tree-view",$data);
    }

    function buildTree($items) {
    	$childs = array();
    	foreach($items as &$item) $childs[$item['parent']][] = &$item;
    	unset($item);
    	foreach($items as &$item) if (isset($childs[$item['member_id']]))
    		$item['children'] = $childs[$item['member_id']];
    	return $childs[0];
    }

}

/* End of file common.php */
/* Location: ./application/controllers/common.php */