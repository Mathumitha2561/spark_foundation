<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Customers</title>
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
	<div>
		<center>
			<h1>Customer Details</h1>
		</center>
	</div>
	<?php
		include 'includes/db.php';
		$conn = OpenCon();
		$sql = "SELECT * from customer";
		$result = $conn->query($sql);
		if (mysqli_num_rows($result) > 0) {
	?>
		<div class="centered info">
			<div class="transaction-info">
				<?php
					if (empty($_SESSION["error"]) === false) {
						echo "<p class='error'>".$_SESSION["error"]."</p>";
						unset($_SESSION["error"]);
					}
					if (empty($_SESSION["success"]) === false) {
						echo "<p class='success'>".$_SESSION["success"]."</p>";
						unset($_SESSION["success"]);
					}
				?>
			</div>
			<table border="1">
				<thead>
					<tr>
						<td>ID</td>
						<td>Customer name</td>
						<td>Email Id</td>
						<td>Balance</td>
					</tr>
				</thead>
				<tbody>
					<?php
						while($row = mysqli_fetch_assoc($result)) {
					?>
							<tr>
								<td><?php echo $row["id"]; ?></td>
								<td>
									<a class="anchor" href="transfer.php?email_id=<?php echo $row["email_id"]; ?>">
										<?php echo $row["customer_name"]; ?>
									</a>
								</td>
								<td><?php echo $row["email_id"]; ?></td>
								<td><?php echo $row["balance"]; ?></td>
							</tr>
					<?php
						}
					?>
					
				</tbody>
			</table>
		</div>
	<?php
		} 
		CloseCon($conn);
	?>
</body>
</html>