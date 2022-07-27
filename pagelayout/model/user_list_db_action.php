<?php 
	function connect() {
		$conn = new mysqli("localhost", "root", "", "projectrazerbd");
		
		if ($conn->connect_error) {
			die("Connection Error: " . $conn->connect_error);
		} 

		return $conn;
	}

	function create($fullname) {
		$conn = connect();

		$sql = "INSERT INTO user_data (Name VALUES (?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $fname);

		$fname = $fullname;
		
		$res = $stmt->execute();
		$stmt->close();
		$conn->close();

		return $res;
	}

	function get($fullname) {
		$conn = connect(); 

		$sql = "SELECT * FROM user_data Where Name = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $fname);

		$fname = $fullname;

	    $stmt->execute();
		$result = $stmt->get_result();

		$stmt->close();
		$conn->close();

		return $result;
	}

	function getAll() {
		$conn = connect(); 

		$sql = "SELECT * FROM user_data";
		$stmt = $conn->prepare($sql);
		/*$stmt->bind_param("s", $fname);*/

		/*$fname = $firstname;*/

	    $stmt->execute();
		$result = $stmt->get_result();
		
		$stmt->close();
		$conn->close();

		return $result;
	}
?>