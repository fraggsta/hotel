<!DOCTYPE html>
<html>
	<body>
	<?php require_once 'config.php';
		
		function connectdb($hostname, $username, $password, $dbname) {
			try {
				$dsn = "pgsql:host=$hostname;port=5432;dbname=$dbname;";
				// make a database connection
				$pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

				/* if ($pdo) {
					echo "Connected to the $dbname database successfully!" . "\n";
				} */

			} catch (PDOException $e) {
				die($e->getMessage());
			}

			if ($pdo) {
				return($pdo);
			}
		}
	?>

		<H1>Customers</h1>
		<?php
			function myfunction() {
				return 1;
			}
		?>
		
		<?php
			$db = connectdb($host, $user, $password, $dbname);
			$stmt = $db->query('SELECT customer.customerid, customer.customername FROM customer');
		?>

		<table border="1">
			<th>Name</th>
			<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
				<tr>
					<td>
						<?php
							echo '<a href="editcustomer.php?customerid=' . $row['customerid'] . '">' . $row['customername'] . '</a>';
						?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</body>
</html>
		
			

