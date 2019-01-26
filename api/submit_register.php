<?PHP
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
date_default_timezone_set("Asia/Bangkok");
$postdata 	= file_get_contents("php://input");
	$request 	= json_decode($postdata);
	$fName		= $request->fName;
	$lName		= $request->lName;
	$Gender		= $request->Gender;
	$BirthDate	= date("Y-m-d", strtotime($request->BirthDate));
	$Zipcode	= $request->Zipcode;
	$Phone		= $request->Phone;
	$Email		= $request->UEmail;
	$Address	= $request->Address;
	$District	= $request->District;
	$Province	= $request->Province;
	$Amphoe		= $request->Amphoe;
	$ID			= $request->ID;
	
$servername = "localhost";
$username 	= "root";
$password 	= "Tony@2019";
$database 	= "user_management";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 } else{
	mysqli_set_charset($conn,"utf8");
	if($ID==''){
		$strSQL = "INSERT INTO `user_management`.`user` ";
		$strSQL .="(Firstname,Lastname,Gender,Birthdate,Email,Phonenumber,Address,District,Amphoe,Province,Zipcode)";
		$strSQL .="VALUES";
		$strSQL .="('".$fName."','".$lName."','".$Gender."','".$BirthDate."','".$Email."','".$Phone."','".$Address."','".$District."','".$Amphoe."','".$Province."','".$Zipcode."');";
		$result = $conn->query($strSQL);
	}else{
		$strSQL = "UPDATE `user_management`.`user` SET `Firstname`='".$fName."', ";
		$strSQL .= " `Lastname`  ='".$lName."', `Gender`  ='".$Gender."',";
		$strSQL .= " `Birthdate`='".$BirthDate."' , `Email`  ='".$Email."', ";
		$strSQL .= " `Phonenumber`='".$Phone."' , `Address`='".$Address."', ";
		$strSQL .= " `District`='".$District."' , `Amphoe`='".$Amphoe."', ";
		$strSQL .= " `Province`='".$Province."' , `Zipcode`='".$Zipcode."' ";
		$strSQL .= " WHERE  `ID`=".$ID.";";
		$conn->query($strSQL);
	}
 }	
?>