<h3>Danh sách các thương hiệu</h3>
<head>
    <style type="text/css">
        label{
            float:left;
            width: 120px;
            font-weight: bold;
        }
        input.txt{
            width: 50px;
        }
    </style>
</head>
<body>
    <form action = '' method = 'post'>
        <label>Số brand/trang: </label>
        <input class = 'txt' type = 'text' name = 'per_page' value = <?php echo isset($per) ? $per : "" ?>>
        <span>Hiện tất cả </span><input type = 'checkbox' name = 'show_all' value = 'show'>
        <br/>
        <label>Sắp xếp:</label>
        <span>Tăng dần</span>
        <input type = 'radio' name = 'sort' value = 'asc' <?php echo isset($sort_type) && $sort_type == 'asc' ? "checked" : "";?>>
        <span>Giảm dần</span>
        <input type = 'radio' name = 'sort' value = 'desc' <?php 
        echo isset($sort_type) && $sort_type == 'desc' ? "checked" : "";?>>
        <span>Không sắp xếp</span>
        <input type = 'radio' name = 'sort' value = 'none' <?php echo isset($sort_type) && $sort_type == 'none' ? "checked" : "";?>>
        <br/>
        <input type = 'submit' name = 'btnok' value = 'Gửi'>
    </form>

    <?php  echo "Trang: ";
            echo isset($link) ? $link : "";  ?>
    <table border = 1 id = 'listbran'>
        <th>ID</th>
        <th>name</th>
            <?php
                foreach ($listbran as $list) {

                    $id = isset($list['bran_id']) ? $list['bran_id'] : "error";
                    $name = isset($list['bran_name']) ? $list['bran_name'] : "error";
                    echo "<tr>";
                        echo "<td>" . $id . "</td>";
                        echo "<td>" . $name . "</td>";
                    echo "</tr>";
                } // end foreach $listbran
            ?>
    </table>
    
    <!-- <a href="insertuser">Insert User</a> -->
</body>