<?php
class cate_model extends CI_Model{

    protected $_table = 'tbl_category';
    protected $_primary = 'cate_id';


    public function __construct(){
        parent::__construct();
        $this->load->database();

    } // end __construct()

    public function count_all(){
        $this->db->from($this->_table);
        return $this->db->count_all_results();
        // return $this->db->get($this->_table)->result_array();
    }

    public function get_order($type = '', $limit = '', $start = ''){
        // $this->db->select("*");
        // $this->db->from($this->_table);
        // $this->db->order_by("cate_name");
        // return $this->db->get($this->_table);
        $sql = "SELECT * FROM {$this->_table}";
        if($type) $sql .=" ORDER BY cate_name {$type}";
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

    /*
    * Huandt lam Function delete category
    */
    // start function delete category

            // $this->db->where("cate_id = $cate_id");
            // $this->db->delete($this->_table);

    public function update($data, $cate_id){
        $this->db->where('cate_id', $cate_id);
        $this->db->update($this->_table, $data);
    }

        public function delete($cate_id)
    {           
        //delete cate
            $this->db->where("cate_id = $cate_id");
            $this->db->delete($this->_table); 
    } // end function delete category

    public function getOnce($id){
        $this->db->where("cate_id = $id");
        return $this->db->get($this->_table)->row_array(); 
    } // end getOnce

    public function get_page($limit, $start){
        $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->result_array();
    } // end get_page()
}
// end class cate_model
// end file model/cate_model.php