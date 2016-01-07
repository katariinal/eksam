<?php 
	require_once("functions.php");
    require_once("Table.class.php");
	
	$Table = new Table($mysqli);
    
    
    //kasutaja muudab andmeid
    if(isset($_GET["update"])){
        $Table->updateCarData($_GET["car_id"], $_GET["number_plate"], $_GET["mark"], $_GET["year"], $_GET["person_id"]);
    }
	
    $car_array = getAllData();
    
    $keyword = "";
	
    if(isset($_GET["keyword"])){
        $keyword = $_GET["keyword"];
        //otsime
        $contest_array = getAllData($keyword);
    }else{
        //näitame kõik tulemused
        $contest_array = getAllData();
    }

    
?>

<h1>Tabel</h1>
<table border=1>
<tr>
    <th>id</th>
    <th>Kasutaja id</th>
    <th>Auto numbri märk</th>
    <th>Mark</th>
    <th>Väljalaskeaasta</th>
	<th>Isikukood</th>
    <th>Muuda</th>
</tr>
<?php
    //autod ükshaaval läbi käia
    for($i = 0; $i < count($car_array); $i++){
        
        //kasutaja tahab rida muuta
        if(isset($_GET["edit"]) && $_GET["edit"] == $car_array[$i]->id){
            echo "<tr>";
            echo "<form action='table.php' method='get'>";
            // input mida välja ei näidata
            echo "<input type='hidden' name='car_id' value='".$car_array[$i]->id."'>";
            echo "<td>".$car_array[$i]->id."</td>";
            echo "<td>".$car_array[$i]->user_id."</td>";
            echo "<td><input name='number_plate' value='".$car_array[$i]->number_plate."'></td>";
            echo "<td><input name='mark' value='".$car_array[$i]->mark."'></td>";
			echo "<td><input name='year' value='".$car_array[$i]->year."'></td>";
			echo "<td>".$car_array[$i]->person_id."</td>";            
            echo "<td><a href='?table.php=".$car_array[$i]->id."'>Katkesta</a></td>";
            echo "<td><input name='update' type='submit'></td>";
            echo "</form>";
            echo "</tr>";
        }else{
            //lihtne vaade
            echo "<tr>";
            echo "<td>".$car_array[$i]->id."</td>";
            echo "<td>".$car_array[$i]->user_id."</td>";
            echo "<td>".$car_array[$i]->number_plate."</td>";
            echo "<td>".$car_array[$i]->mark."</td>";
			echo "<td>".$car_array[$i]->year."</td>";
			echo "<td><a href='user.php?id=".$car_array[$i]->user_id."'>".$car_array[$i]->person_id."</a></td>";
            echo "<td><a href='?delete=".$car_array[$i]->id."'>X</a></td>";
            echo "<td><a href='?edit=".$car_array[$i]->id."'>Muuda</a></td>";
            echo "</tr>";
            
        }
        
        
    }
    
?>
</table>

<p><a href="data.php">Sisestamine</a></p>