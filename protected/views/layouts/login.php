<?php
$user = $_GET["name"];
$pass = $_GET["pass"];
$conn = mysql_connect("localhost","root","123456","demo");
if (mysqli_connect_errno()){
    echo("Connect fail: ");
}
$result1 = mysql_query($conn,"SELECT * FROM Users WHERE user_name = '".$user."' AND pass = '".$pass."'");
$result2 = mysql_query($conn,"SELECT * FROM Users");
if(mysql_num_rows($result1) > 0){
    echo ("<table border='1'><tr><th>User Name</th><th>Password</th></tr>");
    while($row = mysql_fetch_row($result2)) {
        echo("<tr><td>".$row['user_name']."</td><td>".$row['pass']."</td></tr>");
    }
    echo ("</table>");
}

mysql_close($conn);
?>
/**
 * Created by PhpStorm.
 * User: DuyAnhWiCo
 * Date: 08/04/2014
 * Time: 10:24
 */
