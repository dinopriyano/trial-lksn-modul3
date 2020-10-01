<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){

        include 'koneksi.php';

        if($_POST == null)
        {
            $content = json_decode(trim(file_get_contents("php://input",false)));
            if(!is_array($content))
            {
                $firstname = $content->firstname;
                $lastname = $content->lastname;
                $username = $content->username;
                $password = $content->password;
            }
        }
        else
        {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
        }
        
        if(!ctype_alpha($firstname) || strlen($firstname) < 2 || strlen($firstname) > 20)
        {
            encodeJson(422,"First Name must be alphabet only and length between 2 – 20");
        }
        else if(!ctype_alpha($lastname) || strlen($lastname) < 2 || strlen($lastname) > 20)
        {
            encodeJson(422,"Last name must be alphabet only, length between 2 – 20");
        }
        else if(!isValidFormat($username))
        {
            encodeJson(422,"Username only consist of alphanumeric, underscore ‘_’, or dot ‘.’, and the length must be between 5 – 12");
        }
        else if(strlen($password) < 5 || strlen($password) > 12)
        {
            encodeJson(422,"Password length must between 5 - 12");
        }
        else
        {
            $queryCheck = "SELECT * FROM users WHERE username='$username' LIMIT 1;";
            $checkExc = mysqli_query($con,$queryCheck);
            $rowsCount = mysqli_num_rows($checkExc);

            if($rowsCount == 0)
            {
                $password = password_hash($password,PASSWORD_BCRYPT);
                $query = "INSERT INTO users VALUES (NULL,'$firstname', '$lastname', '$username', '$password', current_timestamp());";
                if(mysqli_query($con,$query))
                {
                    $id = "";
                    $queryDua = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                    $queryExc = mysqli_query($con,$queryDua);
                    while($row = mysqli_fetch_array($queryExc))
                    {
                        $id = $row['id'];
                    }
                    encodeJson(201,null,$id);
                }
                else
                {
                    encodeJson(422,"Some error!");
                }
            }
            else{
                encodeJson(422,"Username already exist!");
            }

            mysqli_close($con);
            
        }
    }

    function isValidFormat($val = "")
    {
        for($i = 0;$i<strlen($val);$i++)
        {
            $ch = $val[$i];
            if(!ctype_alpha($ch) && !ctype_digit($ch) && $ch != "_" && $ch != ".")
            {
                return false;
            }
        }

        if(strlen($val) < 5 || strlen($val) > 12)
        {
            return false;
        }

        return true;
    }

    function encodeJson($code = 201, $message = null, $id =null)
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