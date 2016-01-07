<?php
    //loome AB ühenduse
    /* 
        //config_global.php
        $servername = "";
        $server_username = "";
        $server_password = "";
    */   
    
    require_once("../../config_global.php");

    $database = "if15_klinde";
    
    //paneme sessiooni serveris tööle, saame kasutada SESSION[]
    session_start();
    
    $mysqli = new mysqli($servername, $server_username, $server_password, $database);
    
    
    function createCarPlate($car_number, $car_mark, $car_year, $car_person_id){
        
        $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
        $stmt = $mysqli->prepare("INSERT INTO car_plates (user_id, number_plate, mark, year, person_id) VALUES (?,?,?,?,?)");
        //i - iser_id INT
        $stmt->bind_param("issis",  $_SESSION['logged_in_user_id'], $car_number, $car_mark, $car_year, $car_person_id);
        
        $message = "";
        
        //kuiõnnestub, siis tõene, kui viga, siis else
        if($stmt->execute()){
            //õnnestus
            $message = "Edukalt andmebaasi salvestatud!";
        }


        $stmt->close();
		
        
        $mysqli->close();
        //saadan sõnumi tagasi 
        return $message;
       
    }
    
    function getAllData($keyword=""){
        $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
        $stmt = $mysqli->prepare("SELECT id, user_id, number_plate, mark, year, person_id FROM car_plates");
        $stmt->bind_result($id_from_db, $user_id_from_db, $number_plate_from_db, $mark_from_db, $year_from_db, $person_id_from_db);
        $stmt->execute();
        //iga rea kohta, mis on andmebaasis, teeme midagi 
        while($stmt->fetch()){
            //saime andmed kätte
            //echo($number_plate_from_db);
            
        }
                $search = "";
        if($keyword == ""){
            //ei otsi
            $search = "%%";
        }else{
            //otsime
            $search = "%".$keyword."%"; 
        }
        
        $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
        //deleted IS NULL ehk kustutab ära 
        $stmt = $mysqli->prepare("SELECT id, user_id, number_plate, mark, year, person_id FROM car_plates WHERE deleted IS NULL AND (number_plate LIKE ? OR mark LIKE ?)");
        $stmt->bind_param("ss", $search, $search);
        $stmt->bind_result($id_from_db, $user_id_from_db, $number_plate_from_db, $mark_from_db, $year_from_db, $person_id_from_db);
        $stmt->execute();
  
        // iga rea kohta mis on ab'is teeme midagi
        
        $array = array(); 
        
        while($stmt->fetch()){
            
            //tühi objekt, kus hoiame väärtuseid
            $car = new StdClass();
            $car->id = $id_from_db;
			$car->user_id = $user_id_from_db;
            $car->number_plate = $number_plate_from_db;
            $car->mark = $mark_from_db;
            $car->year = $year_from_db;
			$car->person_id = $person_id_from_db;
            
            array_push($array, $car);

            
        }
        //saadan tagasi
        return $array;
        
        $stmt->close();
        $mysqli->close();

    }
    
 ?>