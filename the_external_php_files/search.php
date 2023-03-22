<?php   
    $filename = "users.json";
    if(file_exists($filename)){
        $users = json_decode(file_get_contents($filename), true);
        if($_SERVER["REQUEST_METHOD"] === "GET"){   
            if(array_key_exists("search", $_GET)){
                
                    $data_for_emails_json = [];
                    foreach($users as $user){
                        if($_GET["search"] === $user["first_name"]){
                            $data_for_emails_json[] = $user;
                        }
                    }
                    header("Content-Type: application/json");
                    echo json_encode($data_for_emails_json, true);
            }
        }
    }
?>