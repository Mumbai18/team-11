<?php 
        //getting the database connection
 require_once 'DbConnect.php';
 
 //an array to display response
 header("Content-Type:application/json");
 $response = array();
 
 //if it is an api call 
 //that means a get parameter named api call is set in the URL 
 //and with this parameter we are concluding that it is an api call 
 if(isset($_GET['apicall'])){
 
 switch($_GET['apicall']){
 
 case 'signup':
 //checking the parameters required are available or not 
 if(isTheseParametersAvailable(array('d_id','d_firstname','d_secondname','d_email','d_contact','d_address','d_password'))){
 
 //getting the values
 $d_id = $_POST['d_id'];
 $d_firstname = $_POST['d_firstname'];
 $d_secondname = $_POST['d_secondname'];
 $d_email = $_POST['d_email']; 
 $d_contact = $_POST['d_contact'];
 $d_address = $_POST['d_address'];
 $d_password = md5($_POST['d_password']);
  
 
 //checking if the user is already exist with this username or email
 //as the email and username should be unique for every user 
 // $stmt = $conn->prepare("SELECT d_id FROM donor WHERE d_email = ?");
 // $stmt->bind_param("ss", $d_email);
 // $stmt->execute();
 // $stmt->store_result();
 
 // //if the user already exist in the database 
 // if($stmt->num_rows > 0){
 // $response['error'] = true;
 // $response['message'] = 'User already registered';
 // $stmt->close();
 // }else{
 
 //if user is new creating an insert query 
 $stmt = $conn->prepare("INSERT INTO donor (d_id,d_firstname,d_secondname, d_email, d_contact, d_address, d_password) VALUES (?, ?, ?, ?,?,?,?)");
 $stm = $conn->prepare("INSERT INTO volunteer (v_id,v_firstname,v_secondname, v_email, v_contact, v_address, v_password) VALUES (?, ?, ?, ?,?,?,?)");
 $stmt->bind_param("sssssss", $d_id,$d_firstname,$d_secondname, $d_email, $d_contact, $d_address, $d_password);
 $stm->bind_param("sssssss", $d_id,$d_firstname,$d_secondname, $d_email, $d_contact, $d_address, $d_password);
 //if the user is successfully added to the database 
 if($stmt->execute()){
 
 //fetching the user back 
 // $stmt = $conn->prepare("SELECT id, id, username, email, gender FROM users WHERE username = ?"); 
 // $stmt->bind_param("s",$username);
 // $stmt->execute();
 // $stmt->bind_result($userid, $id, $username, $email, $gender);
 // $stmt->fetch();
 
 // $user = array(
 // 'id'=>$id, 
 // 'username'=>$username, 
 // 'email'=>$email,
 // 'gender'=>$gender
 // );
 // $stm->close();
 $stmt->close();
 
 //adding the user data in response 
 $response['error'] = false; 
 $response['message'] = 'User registered successfully';

 // $response['user'] = $user; 
 }
	 // }
 
 
 }else{
 $response['error'] = true; 
 $response['message'] = 'required parameters are not available'; 
 }
 
 break; 
 
 //in this part we will handle the registration
 
 // break; 
 
 case 'login':
 if(isTheseParametersAvailable(array('email', 'password'))){
 //getting values 
 $email = $_POST['email'];
 $password = md5($_POST['password']); 
 
  //creating the query 
 $stmt = $conn->prepare("SELECT  v_email FROM volunteer WHERE v_email = ? AND v_password = ?");
 $stmt->bind_param("ss",$email, $password);
 
 $stmt->execute();
 
 $stmt->store_result();
 
 //if the user exist with given credentials 
 if($stmt->num_rows > 0){
 
 $stmt->bind_result($email);
 $stmt->fetch();
 
  $user = array(
 
 'email'=>$email,
 );
 
 $response['error'] = false; 
 $response['message'] = 'Login successfull'; 
 $response['user'] = $user; 
 }else{
 //if the user not found 
 $response['error'] = false; 
 $response['message'] = 'Invalid username or password';
 }
 }
 
 //this part will handle the login 
 
 break; 
 case 'demo':
 $response['message'] = 'Login successfull';
 break; 
 
 default: 
 $response['error'] = true; 
 $response['message'] = 'Invalid Operation Called';
 }
 
 }else{
 //if it is not api call 
 //pushing appropriate values to response array 
 $response['error'] = true; 
 $response['message'] = 'Invalid API Call';
 }
 
 //displaying the response in json structure 
 echo json_encode($response);
 function isTheseParametersAvailable($params){
 
 //traversing through all the parameters 
 foreach($params as $param){
 //if the paramter is not available
 if(!isset($_POST[$param])){
 //return false 
 return false; 
 }
 }
 //return true if every param is available 
 return true; 
 }
?>
