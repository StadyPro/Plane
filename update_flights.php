<?php
	include 'connect.php';
	if (isset($_POST['Destination'])) {
	if (isset($_GET['red_id'])) {
		$sql_update = "UPDATE flights SET Destination = '{$_POST['Destination']}' WHERE ID_Flights = {$_GET['red_id']}";
		$result_update = mysqli_query($link, $sql_update);
	}
	if ($result_update) {
		echo "Успешно";
	} else {
		echo "Произошла ошибка:". mysqli_error($link);
	}
}


if(isset($_GET['redakt']))
{
    $id = mysql_real_escape_string($_GET['redakt'], $link);


    $query ="SELECT Destination,Departure_Time,Type FROM flights, aircraft WHERE ID_Plane=ID_Aircraft AND ID_Flights = '".$id."'";

    $result = mysql_query($query, $link) or die("Ошибка " . mysql_error($link));

    if($result && mysql_num_rows($result)>0)
    {
        $row = mysql_fetch_row($result);
        $Destination = $row[0];
        $Departure_Time = $row[1];
        $Type = $row[2];

        echo "<center><h2>Изменить информацию о рейсе</h2>
            <form method='POST'>
            <input type='hidden' name='ID_Flights' value='$ID_Flights' />
            <p>Место назначения<br>
            <input type='text' name='Destination' maxlength='50' value='$Destination' /></p>
						<p>Время отправления<br>
            <input type='time' name='Departure_Time' maxlength='50' value='$Departure_Time' /></p>
            <p>Должность:
            <select name='Type'>";
                        $query1='SELECT Type, ID_Aircraft FROM aircraft';
                        $ID_Aircraft = $row['ID_Aircraft'];
                        $res = mysql_query($query1);
                        while($row = mysql_fetch_assoc($res)){
        echo '<option value="'.$row['ID_Aircraft'].'"'.($row['ID_Aircraft']==$ID_Aircraft?' selected':'').'>'.$row['Type'].'</option>;';
                        }

            echo "</select><br>

            <input type='submit' name='submit3' value='Сохранить'>
            </form></center>";
?>
