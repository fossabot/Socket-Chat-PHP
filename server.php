<?php
/*  Server.php part of Socket Connection Chat, Author - Rishabh Mehan
*	This script deploys the server and listens to the assigned port
*	Accepts connections from the clients and receives the messages.
*	Messages are then cleaned and displayed. Also handles when to exit.
*/


//Turning off all the error reports.
error_reporting(0);

/***************************************
* Enter the Host and Port Information here */

$host = "127.0.0.1"; // Your IP Address
$port = 16500;       // Port number.

/***********************************/


// don't timeout!
set_time_limit(0);

// A flag value to avoid any recurring socket to be created during multiple execution of the script
$flag=0;


if($flag!=3)
{
	// create socket 
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die ('');
	// bind socket to port
	$result = socket_bind($socket, $host, $port) or die('');
	// start listening for connections
	$result = socket_listen($socket, 3) or die('');
	$flag=3;
}

// Wait till the operation is completed, i.e the message is received.
socket_set_block($socket);

// accept incoming connections
// spawn another socket to handle communication
$spawn = socket_accept($socket) or die('');
// read client input

$input = socket_read($spawn, 1024) or die('');
if($input){

// clean up input string
$input = trim($input);

		if($input!="" && $input!="exit"){
		echo "<p id='received'>Received : ".$input."<p><br>";
		}
		// If user enters exit end the chat session.
		
		else if($input!="" && $input=="exit"){
		echo "Chat Session Ended.";
		socket_close($socket);
		socket_close($spawn);
		}
}


// END !!!

?>
