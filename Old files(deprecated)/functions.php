<?php
// $servername = "localhost";
// $username   = "root";
// $password   = "";
$servername = "localhost";
$username   = "lorenzot_caffeine";
$password   = "archangel324";
$dbname     = "lorenzot_caffeine";
$conn       = new mysqli($servername, $username, $password, $dbname);

if(isset($_GET['function'])){
    if ($_GET['function'] == 'login'){
        $loggedin=false;
        $sql = "SELECT * FROM `users` WHERE `Email` LIKE '".$_POST['email']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row['password']==$_POST['password']) $loggedin = true;
            }
        }
        if($loggedin){
        echo 'Login Sucessful';
        } else {
        echo 'Invalid login';
        }
        }
    if ($_GET['function'] == 'register'){
        $userName = '';
        $password = '';
        $email = '';
        if(isset($_POST['userName'], $_POST['email'], $_POST['password'])) {
        $userName=$_POST['userName'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        };
        $sql = "INSERT INTO `users` (`id`, `userName`, `password`, `email`) VALUES ( NULL, '".$userName."','".$password."','".$email."');";
    }
    if ($_GET['function'] == 'logout'){
        session_start();
        session_unset();
        session_destroy();
        };

function updatePassword(){
    $userName = '';
    $password = '';
    $email = '';
    if(isset($_POST['userName'], $_POST['email'], $_POST['password'])) {
    $userName=$_POST['userName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    };
    $sql = "UPDATE `users` set `password` ='".$establishmentName."';";
}
function getData()
{
    $sql    = "SELECT * FROM `directory` , `drinks`, `amenities` WHERE `directory`.`id` = `drinks`.`id` and `directory`.`id` = `amenities`.`id`";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        $resp = '[';
        while ($row = $result->fetch_assoc()) {
            $resp .= '{"id" : ' . '"' . $row['id'] . '",';
            $resp .= '"establishmentName" : ' . '"' . $row['establishmentName'] . '",';
            $resp .= '"address" : ' . '"' . $row['address'] . '",';
            $resp .= '"contact" : ' . '"' . $row['contact'] . '",';
            $resp .= '"coffee" : ' . '"' . $row['coffee'] . '",';
            $resp .= '"sweets" : ' . '"' . $row['sweets'] . '",';
            $resp .= '"snacks" : ' . '"' . $row['snacks'] . '",';
            $resp .= '"meals" : ' . '"' . $row['meals'] . '",';
            $resp .= '"other" : ' . '"' . $row['other'] . '",';
            $resp .= '"wifi" : ' . '"' . $row['wifi'] . '",';
            $resp .= '"charging" : ' . '"' . $row['charging'] . '",';
            $resp .= '"parking" : ' . '"' . $row['parking'] . '",';
            $resp .= '"24hours" : ' . '"' . $row['24hours'] . '",';
            $resp .= '"smoking" : ' . '"' . $row['smoking'] . '",';
            $resp .= '"delivery" : ' . '"' . $row['delivery'] . '",';
            $resp .= '"pricepoint" : ' . '"' . $row['pricepoint'] . '"},';
        }
        $resp .= ']';
        $resp = str_replace(',]', ']', $resp);
        echo $resp;
    }
}

function addLocation()
{
    $establishmentName = '';$contact = ''; $address = ''; $coffee = '';$sweets = '';$snacks = '';$meals = '';$other = '';$wifi = '';$charging = '';$parking = ''; $hours = '';$smoking ='';$delivery = '';$pricepoint = '';
     if(isset($_POST['establishmentName'], $_POST['contact'],  $_POST['address'],$_POST['coffee'],$_POST['sweets'],$_POST['snacks'],$_POST['meals'],$_POST['other'],$_POST['wifi'],$_POST['charging'],$_POST['parking'],$_POST['24hours'],$_POST['smoking'],$_POST['delivery'],$_POST['pricepoint'])) {
    $establishmentName = $_POST['establishmentName'];
    $contact = $_POST['contact']; 
    $address = $_POST['address'];
    $coffee = $_POST['coffee'];
    $sweets = $_POST['sweets'];
    $snacks = $_POST['snacks'];
    $meals = $_POST['meals'];
    $other = $_POST['other'];
    $wifi = $_POST['wifi'];
    $charging = $_POST['charging'];
    $parking = $_POST['parking'];
    $hours = $_POST['24hours'];
    $smoking = $_POST['smoking'];
    $delivery = $_POST['delivery'];
    $pricepoint = $_POST['pricepoint'];
    };
    $sql = "INSERT INTO `directory` (`id`, `establishmentName`, `contact`,`address` ) VALUES (NULL, '" . $establishmentName . "', '".$contact."','" . $address . "');";
    $sql .= "INSERT INTO `drinks`(`id`, `coffee`, `sweets`, `snacks`, `meals`, `other`) VALUES (NULL, '" .$coffee."', '".$sweets."','".$snacks."','".$meals."','".$other."');";
    $sql .= "INSERT INTO `amenities`(`id`, `wifi`, `charging`, `parking`, `24hours`, `smoking`, `delivery`, `pricepoint`) VALUES (NULL, '" .$wifi."', '".$charging."','".$parking."','".$hours."','".$smoking."','".$delivery."','".$pricepoint   ."');";
    $result = $GLOBALS['conn']->query($sql);
}

function updateLocation($id){
    
    if(isset($_POST['establishmentName'], $_POST['contact'],  $_POST['address'],$_POST['coffee'],$_POST['sweets'],$_POST['snacks'],$_POST['meals'],$_POST['other'],$_POST['wifi'],$_POST['charging'],$_POST['parking'],$_POST['24hours'],$_POST['smoking'],$_POST['delivery'],$_POST['pricepoint'])) {
    $establishmentName = $_POST['establishmentName'];
    $contact = $_POST['contact']; 
    $address = $_POST['address'];
    $coffee = $_POST['coffee'];
    $sweets = $_POST['sweets'];
    $snacks = $_POST['snacks'];
    $meals = $_POST['meals'];
    $other = $_POST['other'];
    $wifi = $_POST['wifi'];
    $charging = $_POST['charging'];
    $parking = $_POST['parking'];
    $hours = $_POST['24hours'];
    $smoking = $_POST['smoking'];
    $delivery = $_POST['delivery'];
    $pricepoint = $_POST['pricepoint'];
    };
        $sql = "UPDATE `directory` SET `establishmentName` = '".$establishmentName."', `contact` = '".$contact."', `address` = '".$address."', `number` = '".$number."' WHERE `directory`.`id` = ".$_GET['id'];
        $sql .= "UPDATE `drinks` SET `coffee`= '".$coffee."', `sweets` = '".$sweets."', `snacks` = '".$snacks."', `meals` = '".$meals."', `other` = '".$other."' WHERE `drinks`.`id` = ".$_GET['id'];
        $sql .= "UPDATE `amenities` SET `wifi`= '".$wifi."', `charging` = '".$charging."', `parking` = '".$parking."', `24hours` = '".$hours."', `smoking` = '".$smoking."', `delivery` = '".$delivery."', `pricepoint`= '".$pricepoint."' WHERE `drinks`.`id` = ".$_GET['id'];
        $result = $GLOBALS['conn']->query($sql);
}
function deleteLocation($id)
{
    $sql   = "DELETE FROM `directory` WHERE `id` = " . $id . "";
    $sql  .= "DELETE FROM `drinks` WHERE `id` = " . $id . "";
    $sql  .= "DELETE FROM `amenities` WHERE `id` = " . $id . "";
    $resul = $GLOBALS['conn']->query($sql);
}
}