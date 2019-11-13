# Why?
I wanted to do a multiple stage phishing campaing, but I didn't find any solution that help me with that. I wanted to know all users who click the phishing link, enter credentials, download a suspecious file, and run that file. This campaign helped me categories the users I monitor; and which department/teams/users I needed to focus more on based on the stage they reached. Also, the statistics can help deliver a better, more effecient and specialized security awareness.

# Requirement:
1) Visual Studio
2) You need to own another domain to upload the phishing website on (I suggest short domains). Let's assume it is "0d.ae"

![alt text](https://github.com/0dteam/raffle-phishing-campaign/raw/master/diagram.png)

# Preparation:
1) Create a new database and database user and link them together on your phishing domain control panel (cPanel->MySQL Databases)
2) Use cPanel->phpMyAdmin to access the new database and import phishping table (Database\phishping.sql)
3) Create a new subdomain on your phishing website like this "raffle.yourcompanyname.com", so the full link will be "raffle.yourcompanyname.com.0d.ae"

# Guidelines:
1) Download this project as Zip file, and unzip it

2) Open Exe/PhishTest.sln in Visual Studio
		
	- In "MainWindow.xaml"
		* change "COMPANYNAME" to your company name
		
	- In "MainWindow.xaml.cs":
		* Change "YOURCOMPANYNAME" to your company name
		* Change URL "raffle.YOURCOMPANYNAME.com.ALTERNATIVEDOMAIN.ae" to "raffle.yourcompanyname.com.0d.ae".
	
	- Under "Build" menu tab,  Build the solution and PhistTest project.
	
	- You will get a new file at Exe\bin\Release\YOURCOMPANYNAME-Raffle.exe
	
	- Copy that file and paste under Website\phish and rename it with your company name like "AbdullaCompany-Raffle.exe"
	
3) Now time to modify website files. Go to Website\phish and open the following:
		
	- In "index.php"
		* change "http://www.YOURCOMPANY.com" to "http://www.potato.ae"
	
	- In "login.php"
		* change any "YOURCOMPANY" to "Potato"
	
	- In "download.php"
		* change any "YOURCOMPANY" to "Potato"
		
	- In "downloadSuccess.php"
		* change "YOURCOMPANYNAME-Raffle.exe" to the name of the file you renamed previously "AbdullaCompany-Raffle.exe"
		
	- In "phishPing.php", setup the database information
    
		-	$servername = "localhost"; // server name or ip
		-	$username = "DB_USERNAME"; // database username
		-	$password = "DB_PASSWORD"; // database password
		-	$dbname = "DB_NAME"; // database name

4) Upload all files under Website\phish to your website at "raffle.yourcompanyname.com.0d.ae"

5) Test the login page at https://raffle.yourcompanyname.com.0d.ae/login.php


# Scenario:
Abdulla is an Information Security Engineer at XYZ company. Abdulla will send a fake phishing email to all XYZ employees.
	The email should be about a company-sponsored raffle with prizes. Abdulla appended a link in the email body redirecting to "https://raffle.yourcompanyname.com.0d.ae/login.php?email=TARGETEMAIL"

Each employee will receive the phishing email with a unique link. For example:
- Salim will receive https://raffle.yourcompanyname.com.0d.ae/login.php?email=salim@company.ae
- Ali will receive https://raffle.yourcompanyname.com.0d.ae/login.php?email=ali@company.ae
- Mohammed will receive https://raffle.yourcompanyname.com.0d.ae/login.php?email=mohammed@company.ae
- and so on

After having this campaign running for awhile, Abdulla took down the website and downloaded text and database logs to analyze them.
	
# Analysis:
	- logs/hit.txt --> users who visited the website directly
	- logs/enteredWebsite.txt --> users who visited the website by clicking the login link from the email
	- logs/enteredCredentials.txt --> users who entered their credentials
	- logs/downloadedFile.txt --> users who attempted to download the file
	- phishping database --> users who ran the downloaded file and saw the popup

# Final thoughts
Open a new issue here if you have any question, and feel free to add more features or fix issues by submitting a pull request.

License:
- You are free to use any part of this open source project for authorized phishing campaigns. DO NOT USE IT FOR ILLEGAL PURPOSES.

Enjoy.
- Abdulla (0dTeam)
