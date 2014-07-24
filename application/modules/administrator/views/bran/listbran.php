<?php $this->load->view('main/mainhead')?>
<div id = 'center'>
    <h3>Danh sách các thương hiệu</h3>
    <div id = 'modlistbran'>
        <?php echo form_fieldset("Tuỳ chọn"); ?>
        <form action = '' method = 'post'>
        <label>Số brand/trang: </label>
        <input class = 'txt' type = 'text' name = 'per_page' value = <?php echo isset($per) ? $per : "" ?>>
        <span>Hiện tất cả </span><input type = 'checkbox' name = 'show_all' value = 'show'>
        <br/>
        
        <input type = 'submit' name = 'btnok' value = 'Gửi'>
    </form>
        <?php echo form_fieldset_close();;?>
    </div>

    <div id = 'listbran'>
        <?php  echo "Trang: ";
                echo isset($link) ? $link : "";  ?>
        <table border = '1'>
            <?php
                // print_r($column);
                // echo $_SESSION['per_page'];
                // echo $_SESSION['show_all'];
                if ($sortType == 'asc'){
                    $newSort = 'desc';
                    $imageName = "up-arrow-sort.png";
                }else{
                    $newSort = 'asc';
                    $imageName = "down-arrow-sort.png";
                }
            ?>
            <!-- <th>ID</th>
            <th>name</th> -->

            <th><a href = '<?php echo base_url("administrator/bran/listbran/bran_id/$newSort/1") ?>'>ID</a>
                <?php if ($column == 'bran_id') echo "<img src = '" . base_url("public/images") . "/" . $imageName . "'>";?>
            </th>
            <th><a href = '<?php echo base_url("administrator/bran/listbran/bran_name/$newSort/1") ?>'>Name</a>
                <?php if ($column == 'bran_name') echo "<img src = '" . base_url("public/images") . "/" . $imageName . "'>";?>
            </th>

            <th>Edit</th>
            <th>Delete</th>
                <?php
                    foreach ($listbran as $list) {

                        $id = isset($list['bran_id']) ? $list['bran_id'] : "error";
                        $name = isset($list['bran_name']) ? $list['bran_name'] : "error";
                        echo "<tr>";
                            echo "<td>" . $id . "</td>";
                            echo "<td>" . $name . "</td>";
                            echo "<td>" . "<a href = '" . base_url("administrator/bran/update") . "/" . $id . "'>Edit</a>". "</td>";
                            echo "<td>" . "<a href = '" . base_url("administrator/bran/delete") . "/" . $id . "'>Delete</a>". "</td>";
                        echo "</tr>";
                    } // end foreach $listbran
                ?>
        </table>
    </div>
    
</div> <!-- end div id = center -->
<?php $this->load->view('main/mainfoot')?>