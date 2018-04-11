<?php
error_reporting(E_ALL ^ E_DEPRECATED);
/**
 * File to handle all API requests
 * Accepts GET and POST
 * 
 * Each request will be identified by TAG
 * Response will be JSON data

  /**
 * check for POST request 
 */
if (isset($_POST['tag']) && $_POST['tag'] != '') {
    // get tag
    $tag = $_POST['tag'];
 
    // include DB_function
    require_once 'DB_Functions.php';

	$db = new DB_Functions();
	//echo 'i m here'; exit;

    // response Array
    $response = array("tag" => $tag, "error" => FALSE);
    // checking tag
if ($tag == 'loadStudent')
	 {
          // Request type is load student
       
        $std = $_POST['std'];
        


        
				// store user
            $user = $db->loadStudent($std);
            if ($user)
			{
                // user stored successfully
                $response["error"] = FALSE;
                $response["uid"] = $user["id"];
                $response["user"]["std"] = $user["std"];
                $response["user"]["name"] = $user["name"];
                echo json_encode($response);
			}
    }else if ($tag == 'addAttendance')
	 {
          // Request type is Register new user
        $date = $_POST['date'];
        $time = $_POST['time'];
        $sub = $_POST['sub'];
        $std = $_POST['std'];
        $name= $_POST['name'];
        $status= $_POST['status'];


        
				// store user
            $user = $db->addAttendance($date, $time, $sub, $std,$name,$status);
            if ($user)
			{
                // user stored successfully
                $response["error"] = FALSE;
                $response["uid"] = $user["id"];
                 $response["user"]["date"] = $user["att_date"];
                $response["user"]["time"] = $user["att_time"];
                $response["user"]["sub"] = $user["sub"];
                $response["user"]["std"] = $user["std"];
                $response["user"]["name"] = $user["name"];
                $response["user"]["status"] = $user["status"];

               

                echo json_encode($response);
			}
    }else if ($tag == 'login') {
        // Request type is check Login
        $email = $_POST['email'];
        $password = $_POST['password'];
        // check for user
        $user = $db->getUserByEmailAndPassword($email, $password);
        if ($user != false) {
            // user found
            $response["error"] = FALSE;
			 $response["uid"] = $user["id"];
            $response["user"]["email"] = $user["email"];
          

            echo json_encode($response);
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = TRUE;
            $response["error_msg"] = "Incorrect email or password!";
            echo json_encode($response);
        }
    } else if ($tag == 'register') {
        // Request type is Register new user
        $mobile = $_POST['mobileno'];
        $email = $_POST['email'];
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $password = $_POST['password'];
        $profile= $_POST['profile'];
       $rollno= $_POST['rollno'];
        $std= $_POST['std'];


        // check if user is already existed
        if ($db->isUserExisted($email)) {
            // user is already existed - error response
            $response["error"] = TRUE;
            $response["error_msg"] = "User already existed";
            echo json_encode($response);
        } else {
            // store user
            $user = $db->storeUser($mobile, $email, $firstname, $lastname, $password, $profile,$std ,$rollno);
            if ($user) {
                // user stored successfully
                $response["error"] = FALSE;
                $response["uid"] = $user["user_id"];
                $response["user"]["mobile"] = $user["mobile_no"];
                $response["user"]["email"] = $user["user_email"];
                $response["user"]["firstname"] = $user["first_name"];
                $response["user"]["lastname"] = $user["last_name"];
                $response["user"]["profile"] = $user["profile"];
                $response["user"]["rollno"] = $user["rollno"];
                $response["user"]["std"] = $user["std"];


                echo json_encode($response);
            } else {
                // user failed to store
                $response["error"] = TRUE;
                $response["error_msg"] = "Error occured in Registartion";
                echo json_encode($response);
            }
        }
    } else {
        // user failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown 'tag' value. It should be either 'login' or 'register'";
        echo json_encode($response);
    }
} else {
   }
?>