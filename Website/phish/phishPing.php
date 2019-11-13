<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PishPing</title>
</head>
<body translate="no" >
<?php
		if(isset($_GET['u']) && isset($_GET['cn']) && isset($_GET['d']) && isset($_GET['t']))
		{
			error_reporting(E_ERROR | E_PARSE);
			$servername = "localhost"; // server name or ip
			$username = "DB_USERNAME"; // database username
			$password = "DB_PASSWORD"; // database password
			$dbname = "DB_NAME"; // database name
			$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			
			$user = $_GET['u'];
			$computerName = $_GET['cn'];
			$ip = $_GET['ip'];
			$date = $_GET['d'];
			$time = $_GET['t'];
			try
			{
				// set the PDO error mode to exception
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $pdo->prepare("INSERT INTO phishping (user, computerName, ip, runOnDate, runOnTime) VALUES (:user, :computerName, :ip, :date, :time)");
				$stmt->bindParam(':user', $user, PDO::PARAM_STR);
				$stmt->bindParam(':computerName', $computerName, PDO::PARAM_STR);
				$stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
				$stmt->bindParam(':date', $date, PDO::PARAM_STR);
				$stmt->bindParam(':time', $time, PDO::PARAM_STR);
				$stmt->execute();
				echo "OK";
			}
			catch(PDOException $e)
			{
				echo "ERR";
			}
		}
?>
</body>
</html>