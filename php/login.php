<?php
 require_once 'DbConnect.php';
 
 $response = array()
if(isTheseParametersAvailable(array('d_firstname', 'd_password')))
{
 
 $d_firstname = $_POST['d_firstname'];
 $d_password = md5($_POST['d_password']); 
 
 $stmt = $conn->prepare("SELECT d_id, d_firstname, d_secondname, d_email FROM donor WHERE d_firstname = ? AND d_password = ?");
 $stmt->bind_param("ss",$d_firstname, $d_password);
 
 $stmt->execute();
 
 $stmt->store_result();
 
 if($stmt->num_rows > 0)
 {
 
 $stmt->bind_result($d_id, $d_firstname, $d_secondname, $d_email, $d_contact);
 $stmt->fetch();
 
 $user = array(
 'd_id'=>$d_id, 
 'd_firstname'=>$d_firstname, 
 'd_email'=>$d_email
 );
 
 $response['error'] = false; 
 $response['message'] = 'Login successfull'; 
 $response['donor'] = $donor; 
 }else
 {
 $response['error'] = false; 
 $response['message'] = 'Invalid username or password';
 }
 }
}
?>