<?php
/*  msg.php part of Socket Connection Chat, Author - Rishabh Mehan
*	This script Sends the message to the connected client
*	Creates a socket and connects to the server
*	Messages are then sent and displayed.
*/


// Works if only user has sent some message
if($_POST)
{
	// Message cannot be blank
	if($_POST['msg']!="")
	{	
		$message = $_POST['msg'];
		// Get the ip address of the server from the post request
		$ip = $_POST['ip'];
		
		
		/***************************************
		* Enter the Host and Port Information here */

		$hostip    = $ip; // The IP to which the message has to be sent, is taken directly from the script when user sends a message
		$port =$_POST['port'];       // Port number from the POST Request.

		// NOTE:- If port number is changed then the port number in server.php will also need to be changed so that both port numbers are same.

		/***********************************/
		
		//Clean the message
		$message = trim($message);
		if($message!=""){
		/* Connection and Sending begins*/
		
		// create socket
		$Tosocket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
		// connect to server
		$Toresult = socket_connect($Tosocket, $hostip, $port) or die("Could not connect to server of the Host Machine. Please Try again in sometime.<br>");
		// Write to the server
		socket_write($Tosocket, $message, strlen($message)) or die("Could not send data to server\n");
		// Close the socket
		socket_close($Tosocket);
		
		/* Message sending ends */
		
		// Display the sent message
		echo '<p id="sent">You: '.$message."</p><br>";
	}
	}

}


?>
