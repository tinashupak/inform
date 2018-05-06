 <?php
   require_once 'connection.php'; // подключаем скрипт
 
    $link = mysqli_connect($host, $user, $password, $database) 
    or die ("Нет подключения" . mysqli_error());
    $breed_name = strtr(trim($_GET['breed_name']),'*','%');
    $passport_data = strtr(trim($_GET['passport_data']),'*','%');
    echo "<form method='GET' action='search.php'>
    <p>Введите часть от названия породы куры: <input type='text' name='breed_name' value='$breed_name'></p>
    <p>Введите часть от фамилии работника: <input type='text' name='passport_data' value='$passport_data'></p>
    <p><input type='submit' name='enter' value='Search'></p>
    </form>";
    if (isset($_GET['enter']))
    {
      $sql="SELECT hen.breed_name, worker.passport_data
    FROM hen, breed, worker, contract
    WHERE hen.breed=breed.id_breed
    AND
    worker.id_worker=contract.worker
    AND breed_name LIKE '%$breed_name%' AND passport_data LIKE '%$passport_data%'";
$result = mysqli_query($link, $sql);
echo "<table border='1'>
<tr> 
<th>breed_name</th>
<th>passport_data</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['breed_name'] . "</td>";
echo "<td>" . $row['passport_data'] . "</td>";
echo "</tr>";
}
echo "</table>"; 
}
mysqli_close($link);
?>
