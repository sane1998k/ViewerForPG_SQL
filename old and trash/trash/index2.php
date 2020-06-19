<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Id</th>
<th>Login</th>
<th>Password</th>
</tr>
<?php

$conn = pg_connect("host=192.168.1.54 dbname=test user=postgres password=123")
    or die('Не удалось соединиться: ' . pg_last_error());

// Выполнение SQL-запроса
$query = 'SELECT * FROM useri';
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM useri";
$result = pg_query($conn, $sql);
$rows = pg_num_rows($result);
if ($rows > 0) {
// output data of each row
while($row = pg_fetch_assoc($result)) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["Login"] . "</td><td>"
. $row["Password"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
pg_close($conn);
?>
</table>
</body>
</html>