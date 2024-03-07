<?php		
	function GetNicknameFromUsername ($username) {
		global $conn;
		$sql = "SELECT * from users where username = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('s', $username);
		$result = $stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		return $row;
	}
?>

