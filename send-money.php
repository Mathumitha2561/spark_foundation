<?php
	session_start();

	function throwError($conn, $err = "Unable to process transaction")
	{
		$conn->rollback();
		CloseCon($conn);
		$_SESSION["error"] = $err;
		header("location: customer.php");
		exit();
	}

	if (empty($_POST["email_id"]) === false && empty($_POST["amount"]) === false) {
		include 'includes/db.php';
		$conn = OpenCon();
		$sql = "SELECT * from customer where email_id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $email);
		$email = $_POST["email_id"];
		$stmt->execute();
		$result = $stmt->get_result();
		$user = $result->fetch_assoc();
		$balance = $user["balance"];

		$sql = "SELECT * from customer where id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$id = $_POST["to"];
		$stmt->execute();
		$result = $stmt->get_result();
		$toUser = $result->fetch_assoc();

		$conn->begin_transaction();

		$sql = "update customer set balance = ? where id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("di", $updatedBalance, $id);

		$updatedBalance = $balance - $_POST["amount"];
		if ($updatedBalance < 0) {
			throwError($conn, "Insufficient Balance");
		}
		$id = $user["id"];
		$result1 = $stmt->execute();

		if (!$result1) {
			throwError($conn);
		}

		$updatedBalance = $toUser["balance"] + $_POST["amount"];
		$id = $_POST["to"];
		$result2 = $stmt->execute();

		if (!$result2) {
			throwError($conn);
		}
		$_SESSION["success"] = "Transaction Successful";
		$conn->commit();
		CloseCon($conn);
		header("location: customer.php");
		exit();
	}
	$_SESSION["error"] = "No data";
	header("location: customer.php");
?>