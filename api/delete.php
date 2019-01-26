<?PHP
$id_del	   	 	= $_POST["id_del"];

$servername = "localhost";
$username 	= "root";
$password 	= "Tony@2019";
$database 	= "user_management";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
	$sql = "DELETE FROM user WHERE ID = '$id_del';";
	if ($data = mysqli_query($conn, $sql)){
		echo json_encode($data);
	}
}	
?>