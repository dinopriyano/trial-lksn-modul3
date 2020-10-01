<?php
    if($_SERVER['REQUEST_METHOD']=='GET'){

        include 'koneksi.php';

        if($_GET == null)
        {
            $content = json_decode(trim(file_get_contents("php://input")),false);
            if(!is_array($content))
            {
                $token = $content->token;
            }
        }
        else{
            $token = $_GET['token'];
        }

        $query = "SELECT * FROM users";
        $queryExc = mysqli_query($con,$query);
        $rows = mysqli_num_rows($queryExc);
        if($rows > 0)
        {
            $id = "";
            $isValid = false;
            while($row = mysqli_fetch_array($queryExc))
            {
                $id = $row['id'];
                if(password_verify($id,$token) == true)
                {
                    encodeJson(200,"logout success");
                    $isValid = true;
                    break;
                }
            }

            if($isValid == false)
            {
                encodeJson(401,"Unauthorized user");
            }
        }
        else
        {
            encodeJson(401,"unauthorized user");
        }
        
        mysqli_close($con);
    }

    function encodeJson($code = 200, $message = null, $id = null)
    {
        $result = array();
        header_remove();
        header("Content-type: application/json");
        if($message == null)
        {
            http_response_code($code);
            array_push($result,array(
                "token"=>password_hash($id,PASSWORD_BCRYPT)
            ));
        }
        else
        {
            http_response_code($code);
            array_push($result,array(
                "message"=>$message
            ));

        }

        echo json_encode($result);
        
    }
?>