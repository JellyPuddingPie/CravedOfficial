<?php

function getJson(){
    //2237075881.2ce2c5d.d9036515b58f4b2e8791f4591f410daf
    $json = file_get_contents('https://api.instagram.com/v1/users/self/media/recent/?access_token=2237075881.2ce2c5d.d9036515b58f4b2e8791f4591f410daf');
    
        $obj = json_decode($json, true);
    
 return $obj['data'];
}


function seperateInfo(){
    
    $obj = getJson();
    
    $amount = count($obj);
    
   $objectenArray = []; 
     $infoArray = [];
    
    for($i= 0; $i < $amount; ++$i){
             

        $id = $obj[$i]['id'];
     $foto = $obj[$i]['images']['standard_resolution']['url'];

       array_push($infoArray,$id);
       array_push($infoArray, $foto);
        
        array_push($objectenArray, $infoArray);
        
    $infoArray = [];
    }
    
    
    return $objectenArray;
    
}

function getConnection(){
$servername = "46.21.173.249";
$username = "bjorngv155";
$password = "7gc7e3qn";
$dbname = "craved";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
return $conn;    
}

function searchUSer($loginNaam, $wachtwoord){
    
    $conn = getConnection();
    
    $sql = "select * from user_logon where user_login_naam = '". $loginNaam. "'
        AND user_wachtwoord = '". $wachtwoord ."'";
    
    $query = mysqli_query($conn, $sql);
    if ($query) {
    echo "search successfull created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    if(mysqli_num_rows($query) != 0){
        return true;
    }
    return false;
    
}


function addUser($voornaam, $achternaam, $telefoon, $geslacht, $email, $logonNaam, $wachtwoord){
    
    
    $sql = "INSERT INTO users (user_voornaam, user_achternaam, user_telefoon, user_geslacht, user_email)
VALUES (?, ?,?,?,?)";
    

    $sql2 = "INSERT INTO users (user_login_naam, user_wachtwoord)
VALUES (?,?)";
$conn = $getConnection();
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $voornaam);
     $stmt->bind_param('r', $achternaam);
     $stmt->bind_param('t', $telefoon);
     $stmt->bind_param('u', $geslacht);
     $stmt->bind_param('v', $email);
    
    $stmt2 = $conn->prepare($sql2);
    $stmt->bind_param('s', $logonNaam);
     $stmt->bind_param('r', $wachtwoord);
    

    //laten staan voor debugging voor nu
if ($stmt-execute() === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $stmt->error;
}
if ($stmt2-execute() === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $stmt2->error;
}
    
    
$conn->close();
    
}



/*===========================================================
        USER ADMINISTRATION FUNCTIONS
===========================================================*/

function removeUser($uid){
    
    $sql = "DELETE from users where user_id = $uid";
    
    $sql2 = "DELETE from user_logon where user_id = $uid";
    
    if ($conn->query($sql) === TRUE) {
    echo "record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}   
   
    if ($conn->query($sql2) === TRUE) {
    echo "New deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}   
}

function updateUserEmail($uid, $input ){
    
     $sql = "UPDATE users SET user_email = ? WHERE user_id  =?";
    
    $conn = getConnection();
    
    $stmt = $conn->prepare($sql);
$stmt->bind_param('s', $input);
$stmt->bind_param('r', $uid);

    if ($stmt->execute() === TRUE) {
    echo "record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $stmt->error;
}   
}

function updateUserTelefoon($uid, $input ){
    
    $conn = getConnection();
    $sql = "UPDATE users SET user_telefoon = '".$input ."' WHERE user_id  = $uid";
    
    
if ($conn->query($sql) === TRUE) {
    echo "New record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
    
    
}
function updateUserHuisnummer($uid, $input ){
    
    $conn = getConnection();
    $sql = "UPDATE users SET user_huisnummer = '".$input ."' WHERE user_id  = $uid";
    
    
if ($conn->query($sql) === TRUE) {
    echo "New record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}   
}
function updateUserStraat($uid, $input ){
    
    $conn = getConnection();
    $sql = "UPDATE users SET user_straat = '".$input ."' WHERE user_id  = $uid";
    
    
if ($conn->query($sql) === TRUE) {
    echo "New record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}   
}
function updateUserPostcode($uid, $input ){
    
    $conn = getConnection();
    $sql = "UPDATE users SET user_Postcode = '".$input ."' WHERE user_id  = $uid";
    
    
if ($conn->query($sql) === TRUE) {
    echo "New record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}   
}
function updateUserVoornaam($uid, $input ){
    
    $conn = getConnection();
    $sql = "UPDATE users SET user_voornaam = '".$input ."' WHERE user_id  = $uid";
    
    
if ($conn->query($sql) === TRUE) {
    echo "New record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}   
}
function updateUserAchternaam($uid, $input ){
    
    $conn = getConnection();
    $sql = "UPDATE users SET user_achternaam = '".$input ."' WHERE user_id  = $uid";
    
    
if ($conn->query($sql) === TRUE) {
    echo "New record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}   
}
function updateUserLogonName($uid, $input ){
    
    $conn = getConnection();
    $sql = "UPDATE user_logon SET user_login_naam= '".$input ."' WHERE user_id  = $uid";
    
    
if ($conn->query($sql) === TRUE) {
    echo "New record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}   
}
function updateUserWachtwoord($uid, $input ){
    
    $conn = getConnection();
    $sql = "UPDATE users SET user_wachtwoord = '".$input ."' WHERE user_id  = $uid";
    
    
if ($conn->query($sql) === TRUE) {
    echo "New record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}   
}
?>