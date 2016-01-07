<?php 

class Table{
	
	private $connection;
	
	function __construct($mysqli){
		$this->connection=$mysqli;
	}
		

    function getAllData(){

        //deleted IS NULL ehk kustutab ära 
        $stmt = $mysqli->prepare("SELECT id, user_id, number_plate, mark, year FROM car_plates WHERE deleted IS NULL");
        $stmt->bind_result($id_from_db, $user_id_from_db, $number_plate_from_db, $mark_from_db, $year_from_db, $person_id_from_db);
        $stmt->execute();
  
        // iga rea kohta mis on ab'is teeme midagi
        
        //massiiv, kus hoiame autosid
        $array = array(); 
        
        while($stmt->fetch()){
            //suvaline muutuja, kus hoida auto andmeid, hetkeni kuni lisame massiivi
            
            //tühi objekt, kus hoiame väärtuseid
            $car = new StdClass();
            $car->id = $id_from_db;
			$car->user_id = $user_id_from_db;
            $car->number_plate = $number_plate_from_db;
            $car->ymark = $mark_from_db;
			$car->year = $year_from_db;
			$car->person_id = $person_id_from_db;
            
            //lisan massiivi - auto lisan massiivi
            array_push($array, $car);
            //echo "<pre>";
            //var_dump($array); 
            //echo "</pre>";
            
        }
        //saadan tagasi
        return $array;
        
        $stmt->close();

    }
        
    function deleteCarData($car_id){
        
        //uuendan välja deleted, lisan praeguse date'i
        $stmt = $this->connection->prepare("UPDATE car_plates SET deleted=NOW() WHERE id=?");
        $stmt->bind_param("i", $car_id);
        $stmt->execute();
        
        //tühjendame aadressirea
        header("Location: table.php");
        
        $stmt->close();

    }
    
    function updateCarData($car_id, $number_plate, $mark, $year, $person_id){

        $stmt = $this->connection->prepare("UPDATE car_plates SET number_plate=?, mark=?, year=?, person_id? WHERE id=?");
        $stmt->bind_param("ssisi", $car_id, $number_plate, $mark, $year, $person_id);
        $stmt->execute();
        header("Location: table.php");
        
        
        $stmt->close();

    }

}
?>