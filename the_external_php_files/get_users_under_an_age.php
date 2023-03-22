<?php
    $filename2 = "users.json";
    if(file_exists($filename2)){
        
        $users2_php = json_decode(file_get_contents($filename2), true);
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            if(array_key_exists("belowAge", $_GET)){
                $below_age_data_array = []; 
                foreach($users2_php as $users2){
                    if($users2["age"] < intval($_GET["belowAge"])){
                        array_push($below_age_data_array, $users2["age"]);
                    }
                }
                header("Content-Type: application/json");
                echo json_encode($below_age_data_array); 
            }
        }
    }
?>