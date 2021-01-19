<!DOCTYPE html>
<html>
<head>
	<title>Transfer</title>
	<link rel="stylesheet" href="/styles/style.css">
	<style>
		body{
		 	margin: 0;
		 	color: #fff;
			background-image: url("images/9-92281_technology-wallpaper-technical-background-images-hd.jpg");
			background-position: all;
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>
<body>
	<div class="mt-30">
		<center>
			<h1>Money Transfer</h1>
		</center>
	</div>
	<div class="info centered pd-30 small">
		<form class="send-money-form" action="send-money.php" method="post">
			<?php
				$email_id = $_GET["email_id"];
				include 'includes/db.php';
				$conn = OpenCon();
				$sql = "SELECT * from customer where email_id != ?";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("s", $email);
				$email = $_GET["email_id"];
				$stmt->execute();
				$result = $stmt->get_result();
				$users = $result->fetch_all(MYSQLI_ASSOC);
				CloseCon($conn);
			?>
			<input class="form-control" type="hidden" name="email_id" value="<?php echo $email_id; ?>">
			<div class="form-group">
				<label for="to">Send to:</label>
				<select class="form-control" name="to">
					<?php
						foreach ($users as $user) {
							echo "<option value='".$user["id"]."'>".$user["email_id"]."</option>";
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="to">Amount to be transfered:</label>
				<input class="form-control" type="number" name="amount" required />
			</div>
			<div class="form-group">
				<button class="button small" type="submit">Send Money</button>
			</div>
		</form>
	</div>
</body>
</html>