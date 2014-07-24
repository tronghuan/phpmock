<?php
class comment extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( "product_model" );
		$this->load->model ( "comment_model" );
	}
	public function listComment() {
		/**
		 * 1.
		 * lay duoc toan bo du lieu trong database
		 * 2. dua vao mang
		 * 3. dung foreach de lap du lieu dua ra bang tren view
		 * 4. xu li nut xoa khi xem bang du lieu tren view
		 * == 4.1 neu nut xoa duoc set thi cho comment se hien la comment nay da bi an di
		 * == 4.2 nguoc lai hien thi comment binh thuong
		 */
		
		/**
		 * 1.
		 * Load toan bo comment tu database ra view
		 */
		$data = array ();
		$dataCommentArr = $this->comment_model->getAll ();
		foreach ( $dataCommentArr as $key => $value ) {
			$com_id = $value['com_id'];
			$com_author = $value ['com_author'];
			$com_email = $value ['com_email'];
			$com_content = $value ['com_content'];
			$com_score = $value ['com_score'];
			$com_status = $value ['com_status'];
			$pro_id = $value ['pro_id'];
			$test = array (
					'com_id' => $com_id,
					'com_author' => $com_author,
					'com_email' => $com_email,
					'com_content' => $com_content,
					'com_score' => $com_score,
					'com_status' => $com_status,
					'pro_id' => $pro_id 
			);
			$data [] = $test;
		}
		$data ['info'] = $data;
		$this->load->view ( 'comment/listcomment', $data );
	/**
	 * Xong cong viec thu 1
	 */
	}
	
	
	
	/**
	 * 2.
	 * Xoa comment
	 */
	public function deleteComment() {
	/**
	 * Phan tich
	 * Khi nguoi dung nhap comment vao mot san phan thi ta lay id cua san pham va add vao bang tbl_comment
	 * Khi nguoi admin chon xoa mot comment thi truong status cua bang tbl_comment se duoc set la 0
	 * Khi nguoi dung nhan xem mot san pham thi nhung comment nao co gia tri 0 se khong duoc hien thi
	 * thay vao do mot nhac nho la comment nay da bi an se hien thi thay vao do
	 */
	 $id = $this->uri->segment(4);
	 $this->comment_model->delete($id);
	 redirect(base_url("administrator/comment/listcomment"));
	}
	/**
	 * Xong cong viec thu 2
	 */
}