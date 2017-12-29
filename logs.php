<?php

require("db/db.php");

$result = mysqli_query($con, "SELECT * FROM comments ORDER BY id ASC");
while($row=mysqli_fetch_array($result)){
echo "<div class='comments_content'>";
echo "<h1>" . $row['name'] . "</h1>";
$date = strtotime($row['date_publish']);    
echo "<h2>" . date("d/M/Y H:i", $date) . "</h2></br>";
echo "<h3>" . $row['comments'] . "</h3>";
echo "</div>";
}
mysqli_close($con);

?>