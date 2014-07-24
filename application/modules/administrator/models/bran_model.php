<?php
class bran_model extends CI_Model{

    protected $_table = 'tbl_bran';
    protected $_primary = 'bran_id';


    public function __construct(){
        parent::__construct();
        $this->load->database();

    } // end __construct()

    public function count_all(){
        $this->db->from($this->_table);
        return $this->db->count_all_results();
        // return $this->db->get($this->_table)->result_array();
    }

    public function get_order($column,$type = '', $limit = '', $start = ''){
        // $this->db->select("*");
        // $this->db->from($this->_table);
        // $this->db->order_by("bran_name");
        // return $this->db->get($this->_table);
        $sql = "SELECT * FROM {$this->_table}";
        if($type) $sql .=" ORDER BY {$column} {$type}";
        $sql .= " LIMIT {$limit},{$start}";
        
        // echo $sql;
        $result = mysql_query($sql);
        $data = array();
        while($row = mysql_fetch_assoc($result)){
            $data[] = $row; 
        }
        // echo "<pre>";
        // print_r($data);
        return $data;
    }
    public function getAll(){
        return $this->db->get($this->_table)->result_array();
    } // end listUser();
    public function insert($data){
        $this->db->insert($this->_table,$data);
    } // end insert()

    public function getOnce($id){
        $this->db->where("bran_id = $id");
        return $this->db->get($this->_table)->row_array(); 
    } // end getOnce

    public function get_page($limit, $start){
        $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->result_array();
    } // end get_page()

    // writen by VIetdq
    public function update($data,$id)
    {
        $this->db->where("bran_id = $id");
        $this->db->update($this->_table,$data);
    } // end update()

    public function detail($id)
    {
        $this->db->where("bran_id = $id");
        return $this->db->get($this->_table)->row_array();
    }

    // Huan
    // delete model
    public function delete($bran_id){
            $this->db->where("bran_id = $bran_id");
            $this->db->delete($this->_table);
    } // end delete()

    // DucTM
    public function get_results($search_term){
     
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->like('bran_name',$search_term);

        // Execute the query.
        $query = $this->db->get();
        return $query->result_array();
    }
}
// end class bran_model
// end file model/bran_model.php