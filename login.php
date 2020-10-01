<?php
    include 'koneksi.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        if($_POST == null)
        {
            $content = json_decode(trim(file_get_contents("php://input",false)));
            if(!is_array($content))
            {
                $username = $content->username;
                $password = $content->password;
            }
        }
        else
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
        }

        $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $queryExc = mysqli_query($con,$query);
        $rows = mysqli_num_rows($queryExc);
        if($rows > 0)
        {
            $id = "";
            $isMatch = false;
            while($row = mysqli_fetch_array($queryExc))
            {
                $id = $row['id'];
                $isMatch = password_verify($password,$row['password']);

            }

            if($isMatch == true)
            {
                encodeJson(200,null,$id);
            }
            else
            {
                encodeJson(401,"Invalid login");
            }
                    
        }
        else
        {
            encodeJson(401,"Invalid login");
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