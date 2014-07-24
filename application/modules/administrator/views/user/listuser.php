<?php
$this->load->view ( 'main/mainhead' );
echo "<div id='center'>";
echo heading ( 'Danh sách User!', 2 );
echo "<div id='modlistbran'>";
echo form_fieldset ( "Tuỳ chọn" );
echo form_open ();
echo form_label ( 'Số brand/trang:' );
$data = array (
		'class' => 'txt',
		'type' => 'text',
		'name' => 'per_page',
		'value' => isset ( $per ) ? $per : "" 
);
echo form_input ( $data );
echo "<span>Hiện tất cả</span>";
echo form_checkbox ( 'show_all', 'show', FALSE );
echo form_submit ( 'btnok', 'Gửi' );
echo form_close ();
echo form_fieldset_close ();
echo "</div>";
echo "<a href='" . base_url ( "administrator/user/insertuser" );
echo "' ><button ></button style='background-color:green; float:right'>Thêm User</a>";
echo "Trang: ";
echo isset ( $link ) ? $link : "";
echo "<table border='1' id='listuser'>";
if ($sortType == 'asc') {
	$newSort = 'desc';
	$imageName = "up-arrow-sort.png";
} else {
	$newSort = 'asc';
	$imageName = "down-arrow-sort.png";
}
echo "<th>";
echo "<a href='" . base_url ( "administrator/user/listuser/usr_id/$newSort/1" ) . "'>ID</a>";
if ($column == 'usr_id')
	echo "<img src = '" . base_url ( "public/images" ) . "/" . $imageName . "'>";
echo "</th>";

echo "<th>";
echo "<a href='" . base_url ( "administrator/user/listuser/usr_id/$newSort/1" ) . "'>Name</a>";
if ($column == 'usr_name')
	echo "<img src = '";
base_url ( "public/images" ) . "/" . $imageName . "'>";
echo "</th>";

echo "<th>";
echo "<a href='" . base_url ( "administrator/user/listuser/usr_password/$newSort/1" ) . "'>Password</a>";
if ($column == 'usr_password')
	echo "<img src = '" . base_url ( "public/images" ) . "/" . $imageName . "'>";
echo "</th>";

echo "<th>";
echo "<a href='" . base_url ( "administrator/user/listuser/usr_email/$newSort/1" ) . "'>Email</a>";
if ($column == 'usr_email')
	echo "<img src = '" . base_url ( "public/images" ) . "/" . $imageName . "'>";
echo "</th>";

echo "<th>";
echo "<a href='" . base_url ( "administrator/user/listuser/usr_address/$newSort/1" ) . "'>Address</a>";
if ($column == 'usr_address')
	echo "<img src = '" . base_url ( "public/images" ) . "/" . $imageName . "'>";
echo "</th>";

echo "<th>";
echo "<a href='" . base_url ( "administrator/user/listuser/usr_phone/$newSort/1" ) . "'>Phone</a>";
if ($column == 'usr_phone')
	echo "<img src = '" . base_url ( "public/images" ) . "/" . $imageName . "'>";
echo "</th>";

echo "<th>";
echo "<a href='" . base_url ( "administrator/user/listuser/usr_gender/$newSort/1" ) . "'>Gender</a>";
if ($column == 'usr_gender')
	echo "<img src = '" . base_url ( "public/images" ) . "/" . $imageName . "'>";
echo "</th>";

echo "<th>";
echo "<a href='" . base_url ( "administrator/user/listuser/usr_level/$newSort/1" ) . "'>Level</a>";
if ($column == 'usr_level')
	echo "<img src = '" . base_url ( "public/images" ) . "/" . $imageName . "'>";
echo "</th>";
echo "<th>Edit</th>";
echo "<th>Delete</th>";

foreach ( $listuser as $list ) {
	echo "<tr>";
	echo "<td>" . $list ['usr_id'] . "</td>";
	echo "<td>" . $list ['usr_name'] . "</td>";
	echo "<td>" . $list ['usr_password'] . "</td>";
	echo "<td>" . $list ['usr_email'] . "</td>";
	echo "<td>" . $list ['usr_address'] . "</td>";
	echo "<td>" . $list ['usr_phone'] . "</td>";
	echo "<td>" . $list ['usr_gender'] . "</td>";
	echo "<td>" . $list ['usr_level'] . "</td>";
	echo "<td>" . "<a href = '" . base_url ( "administrator/user/update" ) . "/" . $list ['usr_id'] . "'>Edit</a>" . "</td>";
	echo "<td>" . "<a href = '" . base_url ( "administrator/user/delete" ) . "/" . $list ['usr_id'] . "' onclick='if(CheckDelete() == false) return false'>Delete</a></td>";
	
	echo "</tr>";
}

echo "</table>";

echo "</div>";
?>
<?php $this->load->view('main/mainfoot')?>