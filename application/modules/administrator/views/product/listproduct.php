<?php $this->load->view('main/mainhead')?>
<div id = 'center'>
    <h3>List Product </h3>

    <div id = 'modlistbran'>
        <form action = '' method = 'post'>
            <label>Product per page: </label>
            <input class = 'txt' type = 'text' name = 'per_page' value = <?php echo isset($per) ? $per : "" ?>>
            <span>Show all</span><input type = 'checkbox' name = 'show_all' value = 'show'>
            <br/>
            <input type = 'submit' name = 'btnSubmit' value = 'Submit'>
        </form>
    </div>

    <a  href='<?php echo base_url("administrator/product/insertProduct");?>'>
                <button style = "style=background-color:green;float:right;">Insert Product</button></a>

    <div id = 'listbran'>
      <?php  echo "Trang: ";
                echo isset($link) ? $link : "";  ?>
    <?php
    echo "<table border='1' cellpadding='0' cellspacing='0'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Price</th>";
        echo "<th>Price Sale</th>";
        echo "<th>Image</th>";
        echo "<th>Description</th>";
        echo "<th>Infomation</th>";
        echo "<th>Status</th>";
        echo "<th>Brand</th>";
        echo "<th>Country</th>";
        echo "<th>Edit</th>";
        echo "<th>Delete</th>";

        echo "</tr>";
        if(isset($listproduct) && $listproduct !=null){
        foreach($listproduct as $list){
            echo "<tr>";
            echo "<td>".$list['pro_id']."</td>";
            echo "<td>".$list['pro_name']."</td>";
            echo "<td>".$list['pro_price']."</td>";
            echo "<td>".$list['pro_price_sale']."</td>";
            echo "<td>".$list['pro_images']."</td>";
            echo "<td>".$list['pro_desc']."</td>";
            echo "<td>".$list['pro_info']."</td>";
            echo "<td>".$list['pro_status']."</td>";
            echo "<td>".$list['pro_bran']."</td>";
            echo "<td>".$list['pro_country']."</td>";
            echo "<td><a href = '" . base_url("/administrator/product/update/") . "/" . $list['pro_id'] . "'>Edit</a></td>";
            echo "<td><a href = '" . base_url("/administrator/product/delete/") . "/" . $list['pro_id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
    }
    echo "</table>";

    ?>
    </div>
</div> <!-- end div center -->

<?php $this->load->view('main/mainfoot')?>