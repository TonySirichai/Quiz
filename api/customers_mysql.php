<?PHP
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
date_default_timezone_set("Asia/Bangkok");
$servername = "localhost";
$username 	= "root";
$password 	= "Tony@2019";
$database 	= "user_management";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
	mysqli_set_charset($conn,"utf8");
	$result = $conn->query("SELECT * FROM user");
	 if ($result->num_rows > 0) {
		$outp = "";
		$i=1;
		while($rs = $result->fetch_assoc()) {
		  if ($outp != "") {$outp .= ",";}
		  $outp .= '{"id":"'. $i++ . '",';
		  $outp .= '"ID_code":"'. $rs["ID"] . '",';
		  $outp .= '"fName":"'. $rs["Firstname"] . '",';
		  $outp .= '"lName":"'. $rs["Lastname"]. '",';
		  $outp .= '"Gender":"'. $rs["Gender"]. '",';
		  $outp .= '"BirthDate":"'.$rs["Birthdate"].'",';
		  $outp .= '"Email":"'. $rs["Email"]. '",';
		  $outp .= '"PhoneNumber":"'. $rs["Phonenumber"]. '",';
		  $outp .= '"Address":"'. $rs["Address"]. '",';
		  $outp .= '"District":"'. $rs["District"]. '",';
		  $outp .= '"Amphoe":"'. $rs["Amphoe"]. '",';
		  $outp .= '"Province":"'. $rs["Province"]. '",';
		  $outp .= '"Zipcode":"'.$rs["Zipcode"]. '"}';
		}
	
	$outp ='{"records":['.$outp.']}';
	$conn->close();
	echo($outp);
	}
}	
?>