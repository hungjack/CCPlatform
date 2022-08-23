<?php 
	include_once "database.php";
    session_start();
		
	switch ($_GET["method"]) {
		case "add":
			add();
			break;
		case "update":
			update();
			break;
		case "del":
			del();
			break;
		default:
			break;
	}

	function add(){
		$uid = $_SESSION["id"];
		$title = $_POST["title"];
		$content = $_POST["content"];
		$amount = $_POST["amount"];
		$cash = $_POST["cash"];
		$sql = "INSERT INTO `mes` (uid, title, content, amount, cash)
		VALUES ('$uid', '$title', '$content' , '$amount' , '$cash')";
		global $con;
		$result = mysqli_query($con , $sql) or die('MySQL query error');
		echo "<script type='text/javascript'>";
		echo "alert('申請成功');";
		echo "location.href='index.php';";
		echo "</script>";
	}

	function update(){
		$id = $_GET["id"];
		$title = $_POST["title"];
		$content = $_POST["content"];
		$amount = $_POST["amount"];
		$test = $_POST["test"];
		$sql = "UPDATE `mes` SET title = '$title', content = '$content' , amount = '$amount' , test = '$test' WHERE id = $id";
		global $con;
		$result = mysqli_query($con , $sql) or die('MySQL query error');
		echo "<script type='text/javascript'>";
		echo "alert('修改成功');";
		echo "location.href='index.php';";
		echo "</script>";
	}

	function del(){
		$id = $_GET["id"];
		$sql = "DELETE FROM `mes` WHERE id = $id";
		global $con;
		$result = mysqli_query($con , $sql) or die('MySQL query error');
		echo "<script type='text/javascript'>";
		echo "alert('刪除成功');";
		echo "location.href='index.php';";
		echo "</script>";
	}

?>