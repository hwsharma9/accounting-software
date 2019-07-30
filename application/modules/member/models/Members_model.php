<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members_model extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 'member_details';//view
        // Set orderable column fields
        $this->column_order = array('member_id', 'member_name','email','mobile_no','address','created_at');
        // Set searchable column fields
        $this->column_search = array('member_name','email','mobile_no','created_at','address');
        // Set default order
        $this->order = array('id' => 'desc');
    }
    
    /*
     * Fetch members data from the database
     * @param $_POST filter data based on the posted parameters
     */
    public function getRows($postData){
        $this->_get_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
    /*
     * Count all records
     */
    public function countAll(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    /*
     * Count records based on the filter params
     * @param $_POST filter data based on the posted parameters
     */
    public function countFiltered($postData){
        $this->_get_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    /*
     * Perform the SQL queries needed for an server-side processing requested
     * @param $_POST filter data based on the posted parameters
     */
    private function _get_datatables_query($postData){
        $this->db->select("id,member_id,member_name,email,mobile_no,state_name,city_name,created_at,address,image_path,member_status");
        $this->db->from($this->table);
        
        if (isset($postData['member_id']) && !empty($postData['member_id']) && is_numeric($postData['member_id'])) {
            $this->db->where("member_id",$postData['member_id']);
        }
        
        if (isset($postData['member_status']) && !empty($postData['member_status']) && is_numeric($postData['member_status'])) {
            $this->db->where("member_status",$postData['member_status']);
        }
        
        if (isset($postData['member_name']) && !empty($postData['member_name'])) {
            $this->db->like("member_name",$postData['member_name']);
        }
        
        if (isset($postData['number']) && !empty($postData['number'])) {
            $this->db->group_start()->like("phone_no",$postData['number'])->or_like("mobile_no",$postData['number'])->group_end();
        }
        // loop searchable columns 
        foreach($this->column_search as $key => $item){
            // if datatable send POST for search
            if($postData['search']['value']){
                // first loop
                if($key===0){
                    // open bracket
                    $this->db->group_start();
                }
                $this->db->or_like($item, $postData['search']['value']);
                
                // last loop
                if(count($this->column_search) - 1 == $key){
                    // close bracket
                    $this->db->group_end();
                }
            }
        }
         
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

}