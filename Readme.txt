Instructions to run the chat service

Content of the Archive

[DIR] Socket
			- Index.php  		[Main file to run]
			- msg.php			[File to Send Messages]
			- server.php		[File to create and spawn a server]
			- jq.js				[jQuery - Javascript Framework for the use of javascript advanced functionalities]
			- What to do.txt	[Instructions and Requirements Guide]


Requirements and Instructions for setup

1. Firefox Browser, Since the webkit of this browser supports the javascript functionalities very well and hardly causes error.
2. Since this application is built on PHP and javascript we require a simple PHP apache server. 
On Windows - WAMP Sever(http://www.wampserver.com/en/), on Mac OS X - MAMP Server(http://www.mamp.info/en/), on Linux - LAMP Server(http://community.linuxmint.com/tutorial/view/486).
3. After installing, please check if the Socket module is activated or not. If not, then please activate. You can find it in the php.ini file of the apache server.
4. If everything is fine, you are set to go. Take the archive and unzip it. Place the content of the archive in the root directory (www or htdocs) which ever it is in your case. The root directory will be in the folder where the wamp, mamp are located. eg for wamp it will be (C:/wamp/www/)
5. Open your apache server, that is the software you just installed. Start the servers (They are automatically started with the application).
6. Open firefox and point it to the http://localhost/[folder name of archive]. Note - the URL can be different if used with another port apart from 80. eg in MAMP it will be most probably http://localhost:8888/
7. Repeat the steps on the other machine and setup the script there as well.

------------------------------------------------------------------------------
Running the script

8. After setting the script up, look up for you IP Address. You can do it by going to command prompt and giving the command "ipconfig" and check the IPv4 address
9. Put the Ip address of each machine in its server.php file in the archive.
10. After setting up the IP, please check that when inputting IP address and ports for connection, the ports for Server1 and Client2 AND Server2 and Client1 are same to avoid any conflicts.
11. Now you are set and you can now input the ip address of the 2nd machine on the screen and also allow him to input the IP of the first machine.



For any further detail please email me at rmehan@nyit.edu