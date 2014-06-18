<!-- Code for stylesheet-->
<title>Rchat - Rishabh Mehan </title>
	<audio id="chatAudio"><source src="notify.ogg" type="audio/ogg"><source src="notify.mp3" type="audio/mpeg"><source src="notify.wav" type="audio/wav"></audio>
<style>
body{
	background:#66ccff;
}
#received{
	float:left;
	width:150px;
	padding:5px;
	border-radius:10px;
	border:1px solid #66FF66;
	font-size:13px;
	background:#CCFFCC;
	color:#000;
	margin: 10px 10px 0px 10px;
	clear:left;
}
#sent{
	float:right;
	width:150px;
	padding:5px;
	border-radius:10px;
	border:1px solid #333;
	font-size:13px;
	background:#CCC;
	color:#000;
	margin: 10px 10px 0px 10px;
	clear:right;
}

#header{
	width:100%;
	padding-top:10px;
	margin-bottom:15px;
	border: 1px solid #ccc;
	color:white;
	background:#0066cc;
	text-align:center;
	font-size:18px;
}
#messageBox{
	background:whiteSmoke;
	border-radius:15px;
	border:2px solid #ccc;
	overflow:auto;
	
}
#msg{
	width: 88%;
	height: 35px;
	background: none repeat scroll 0% 0% white;
	border: 1px solid rgb(204, 204, 204);
	margin: 2px;
	border-radius: 10px 10px 10px 10px;
}
#inputip{
	margin-top:20%;
	color:white;
	padding:5px;
	background:#0099ff;
	border-radius:15px;
	border:2px solid #555;
}
</style>
<!-- Stylesheet code ends -->

<!-- Javascript Code using jQuery. This code contains a function to make ajax calls to server.php to fetch the messages.-->
<script src="jq.js"></script>

<script>
var flag=0;
function serverCall(){
	var url = "server.php"; // the script where you handle the form input.

if(flag==0){
    $.ajax({
           type: "POST",
           url: url,
           success: function(data)
           {
				// Prepends the received data from server.php to the message box and then resets the input parameter.
				if(data!=""){
				$( "#messageBox" ).prepend( data );
				if(data == "Chat Session Ended." )
				{
					flag=1;
				}
				$('#chatAudio').get(0).play();
			}
           }
         });
         
	}

    return false;
}
</script>
<!-- Javascript Code Ends-->

<?php
session_start();  //Initiate the session
$_SESSION['toip']="2"; // Create a session that marks
$hostip="";

if($_POST)
{
	if($_POST['ip']!="")
	{
		// Getting the IP address and port to be connected 
		$hostip =$_POST['ip']; 
		$port =$_POST['port']; 
		// Marks the session flag as 1 to show that user has initiated the connection to other IP
		$_SESSION['toip']="1"; 
		$flag = 1;
		
		// Javascript to call server.php after every 1 sec.
		echo '<script>if(flag==0){setInterval("serverCall()",1000);}</script>'; 
		
	}
}

if($_SESSION['toip']!="1"){

/* Checks if the user has already submitted the IP to connect
* If not, then user will be shown the IP connection form
* otherwise chat window will be shown.
*/
?>

<center>
<form action="" method="post" id="inputip" style="display:table">
<center>	<label>Enter IP     : </label><input type="text" name="ip" id="ip" /><br><br>
		<label>Enter Port : </label><input type="text" name="port" id="port" /><br><br>
	<input type="submit" value="Connect"><hr>
	<p id="description" style="width:500px">
		Please Enter the IP Address and Port of the Machine you want to chat with. Also to exit chat and close your server just type "exit" during the chat session.
	</p>
	</center>
</form>
</center>

<?php 
}
else{
	?>
<center>

<div id="wrapper" style="height:400px; width:500px;">
	<h2 style="width:100%; height:50px; background:#ooccff">Chat Window</h2>
	<div id="messageBox" style="margin-top:0px;height:350px; width:500px;">
	</div>
	
	<br>
		<div id="messageSend">
			<form action="" method="post" id="message">
				<input type="text" name="msg" id="msg"/>
				<input type="hidden" name="ip" value="<?php echo $hostip; // IP of the other machine ?>"/>
				<input type="hidden" name="port" value="<?php echo $port; // Port of the other machine ?>"/>
				<input type="submit" name="submit" value="Go" style="border-radius: 50px 50px 50px 50px;
				    height: 30px;
				    background: none repeat scroll 0% 0% orange;
				    color: white;
				    font-weight: bold;
				    font-size: 18px;"/>
			</form>
		</div>
</div>
</center>
<?php
}
?>

<!-- Javascript for Ajax post to send message to the other client -->
<script>



$("#message").submit(function() {
	

    var url = "msg.php"; // the script where you handle the form input.


    $.ajax({
           type: "POST",
           url: url,
           data: $("#message").serialize(), // serializes the form's elements.
           success: function(data)
           {
				// Prepends the received data from msg.php to the message box and then resets the input parameter.
				$( "#messageBox" ).prepend( data );
				document.getElementById("message").reset();
				
           }
         });
         
	

    return false; // avoid to execute the actual submit of the form.
});
</script>
