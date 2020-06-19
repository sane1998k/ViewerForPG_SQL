<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="css/jquery.dataTables.min.css">
      <script src="js/jquery.min.js"></script>
      <script src="js/jquery.dataTables.min.js"></script>
      <script>
         $(document).ready( function () {
           $('#myTable').DataTable();
         } );
         
      </script>
   </head>
   <body>
      <table id="myTable" class="display" style="width:100%">
         <thead>
            <tr>
               <th>ИД</th>
               <th>Первый</th>
               <th>Второй</th>
               <th>Третий</th>
               <th>Четвертый</th>
               <th>Пятый</th>
            </tr>
         </thead>
         <tbody>
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
               echo "<tr><td>" 
               . $row["id"]. "</td><td>" 
               . $row["First"] . "</td><td>"
               . $row["Second"]. "</td><td>" 
               . $row["Third"]. "</td><td>" 
               . $row["Fourth"]. "</td><td>" 
               . $row["Fifth"]. "</td></tr>";
               }
               } else { echo "Нет результатов"; }
               pg_close($conn);
               ?>
         </tbody>
         <tfoot>
            <tr>
               <th>ИД</th>
               <th>Первый</th>
               <th>Второй</th>
               <th>Третий</th>
               <th>Четвертый</th>
               <th>Пятый</th>
            </tr>
         </tfoot>
      </table>
   </body>
</html>