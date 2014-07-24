<h3>Danh sách user</h3>

<body>
    <table border = 1 id = 'listuser'>
        <th>ID</th>
        <th>name</th>
        <th>email</th>
        <th>address</th>
        <th>phone</th>
        <th>gender</th>
        <th>level</th>
        <?php
            foreach ($listuser as $list) {

                # code...
                echo "<tr>";
                    echo "<td>" . $list['usr_id'] . "</td>";
                    echo "<td>" . $list['usr_name'] . "</td>";
                    echo "<td>" . $list['usr_email'] . "</td>";
                    echo "<td>" . $list['usr_address'] . "</td>";
                    echo "<td>" . $list['usr_phone'] . "</td>";
                    echo "<td>" . $list['usr_gender'] . "</td>";
                    echo "<td>" . $list['usr_level'] . "</td>";
                echo "</tr>";

            } // end foreach $listuser
        ?>
    </table>
    <a href="insertuser">Insert User</a>
</body>