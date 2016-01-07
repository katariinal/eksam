<?php require_once("functions.php"); 

require_once("Table.class.php");
	

	if(!isset($_SESSION['logged_in_user_id'])){
    header("Location: login.php");
    }
	
	if(isset($_GET["logout"])){
	//kustutame sessiooni muutujad
	session_destroy();
	header("Location: login.php");
    }

	$Table = new Table($mysqli);
	

	$car_array = getAllData();
?>


<br><br>

<h1>Tabel</h1>
<table border=1>
<tr>
    <th>id</th>
    <th>Kasutaja id</th>
    <th>Auto numbri märk</th>
    <th>Mark</th>
    <th>Väljalaskeaasta</th>
	<th>Isikukood</th>

</tr>
<?php
    //autod ükshaaval läbi käia
    for($i = 0; $i < count($car_array); $i++){
        
        //kasutaja tahab rida muuta
        if($car_array[$i]->user_id == $_GET["id"]){

            echo "<tr>";
            echo "<td>".$car_array[$i]->id."</td>";
            echo "<td>".$car_array[$i]->user_id."</td>";
            echo "<td>".$car_array[$i]->number_plate."</td>";
            echo "<td>".$car_array[$i]->mark."</td>";
			echo "<td>".$car_array[$i]->year."</td>";
			echo "<td>".$car_array[$i]->person_id."</td>";
            echo "</tr>";
            
        }
        
        
    }
    
?>
</table>



