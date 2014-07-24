<h3>Search Result</h3>
<?php

/**
 * @author easyvn.net
 * @copyright 2014
 */
 echo "<table border='1' cellpadding='0' cellspacing='0'>";
 echo "<tr>";
 echo "<td> Brand ID </td>";
 echo "<td> Brand Name </td>";
 echo "</tr>";
 if(isset($result) && $result != null){ 
    foreach($result as $list){
        echo "<tr>";
        echo "<td>".$list['bran_id']."</td>";
        echo "<td>".$list['bran_name']."</td>";
        echo "</tr>";
}
} else {
    echo "<td colspan='2'>Khong co ban ghi nao </td>";
}
echo "</table>";


?>