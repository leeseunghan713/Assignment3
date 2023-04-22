<!DOCTYPE html>
<html>
<head>
	<title>나만의 피자</title>
</head>
<body>
	<h1>회원가입</h1>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>재료1:</label>
		<input type="text" name="ingredient1" required><br><br>
        <label>재료2:</label>
		<input type="text" name="ingredient2" required><br><br>
        <label>재료3:</label>
		<input type="text" name="ingredient3" required><br><br>
		<label>재료4:</label>
		<input type="text" name="ingredient4" required><br><br>
        <label>재료5:</label>
		<input type="text" name="ingredient5" required><br><br>
		<input type="submit" value="조합">
	</form>
	<?php
	// 폼이 제출되면 회원 정보를 처리하는 코드
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// 데이터베이스 연결
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "pizza_ingredient";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// 이름과 이메일 데이터 가져오기
		$ingredient1 = $_POST["ingredient1"];
        $ingredient2 = $_POST["ingredient2"];
        $ingredient3 = $_POST["ingredient3"];
        $ingredient4 = $_POST["ingredient4"];
        $ingredient5 = $_POST["ingredient5"];
		

		// SQL 쿼리 실행
		$sql = "INSERT INTO pizza (ingredient1, ingredient2, ingredient3, ingredient4, ingredient5) VALUES ('$ingredient1', '$ingredient2','$ingredient3','$ingredient4','$ingredient5')";
		if ($conn->query($sql) === TRUE) {
			echo "재료가 등록 되었습니다.";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
	?>
</body>
</html>
