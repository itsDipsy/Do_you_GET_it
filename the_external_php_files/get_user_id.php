
<?php
    $filename = "users.json";
    if(file_exists($filename)){
        $users = json_decode(file_get_contents($filename), true);
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            
            if($_GET["id"] !== ""){       
                foreach($users as $user){
                    if($user["id"] == $_GET["id"]){
                        header("Content-Type: application/json");
                        echo json_encode($user, true);
                        exit();
                    }
                    if($user["id"] === null){ // Jag vill fixa så att man skriver ut något om användaren inte finns
                        echo "the user does not exits";
                    }
                }
            }
            else{
                echo "NEIN";
                exit();
            }
        }
        else{
            echo "Wrong request format only execept GET req"; 
            exit();
        }
    }
    else{
        echo "file does not exits";
        exit();
    }
?>
