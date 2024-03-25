 <?php

if(isset($_POST["book_now"]))
{	
			$mail = new PHPMailer();
			$body = file_get_contents('bookingconfirm.html');
			$body = ereg_replace("[\]",'',$body);
			
			$body = ereg_replace("##fullname##",$_POST['fullname'],$body);
			$body = ereg_replace("##gender##",$_POST["gender"],$body);
			$body = ereg_replace("##nationality##",$_POST['nationality'],$body);
			$body = ereg_replace("##address##",$_POST['address'],$body);
			$body = ereg_replace("##passportnumber##",$_POST['passportno'],$body);
			$body = ereg_replace("##expirydate##",$_POST['expirydate'],$body);
			$body = ereg_replace("##homephone##",$_POST['homephone'],$body);
			$body = ereg_replace("##email##",$_POST['email'],$body);
			
			$body = ereg_replace("##tripname##",$_POST['tripname'],$body);
			$body = ereg_replace("##arrivaldate##",$_POST['arrdate'],$body);
			$body = ereg_replace("##departuredate##",$_POST['depdate'],$body);
			$body = ereg_replace("##arrival_flight_detail##",$_POST['arrival_flight_detail'],$body);
			$body = ereg_replace("##return_flight_detail##",$_POST['return_flight_detail'],$body);
			$body = ereg_replace("##special_requirement##",$_POST['special_requirement'],$body);
			
			$address = $_POST["email"];	
			$mail->AddReplyTo($address,$_POST['fullname']);
			$mail->SetFrom($address,$_POST['fullname']);
			
			//$mail->AddAddress("info@prathatravel.com","Pratha trave");
			$mail->AddAddress("booking@prathatravel.com","Ticket to nepal Australia");
			
			//$mail->AddCC("suresh92@hotmail.com","suresh Ranabhat");
			$mail->AddCC($_POST["email"],$_POST['fullname']);
			
			$mail->Subject    = "Booking for ".$_POST['tripname'] ." on ".date('Y-m-d');
			$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
			$mail->MsgHTML($body);
			
			$mail->Send();
			
			echo "<script>document.location='".URL."package/".$_POST['RED_clean_url']."/bookingsent.html'</script>";
				
		
}

if(isset($_POST["book_flight_now"]))
{		
			$mail = new PHPMailer();
			$body = file_get_contents('bookingflight.html');
			$body = ereg_replace("[\]",'',$body);
			
			$body = ereg_replace("##trip_type##",$_POST['trip_type'],$body);
			$body = ereg_replace("##first_name##",$_POST['first_name'],$body);
			$body = ereg_replace("##last_name##",$_POST["last_name"],$body);
			$body = ereg_replace("##email##",$_POST['email'],$body);
			
			
			$body = ereg_replace("##phone##",$_POST['phone'],$body);
			$body = ereg_replace("##city_from##",$_POST['city_from'],$body);
			$body = ereg_replace("##city_to##",$_POST['city_to'],$body);
			$body = ereg_replace("##departure_date##",$_POST['departure_date'],$body);
			
			$body = ereg_replace("##arrival_date##",$_POST['arrival_date'],$body);
			$body = ereg_replace("##departure_time##",$_POST['departure_time'],$body);
			$body = ereg_replace("##flight_class##",$_POST['flight_class'],$body);
			$body = ereg_replace("##arrival_time##",$_POST['arrival_time'],$body);
			
			
			$body = ereg_replace("##arrival_flexbility##",$_POST['arrival_flexbility'],$body);
			$body = ereg_replace("##preferred_airlines##",$_POST['preferred_airlines'],$body);
			
			$body = ereg_replace("##cabin_type##",$_POST['cabin_type'],$body);
			$body = ereg_replace("##number_of_traveller##",$_POST['number_of_traveller'],$body);
			$body = ereg_replace("##comment##",$_POST['comment'],$body);
			die($body);
			$address = $_POST["email"];	
			$mail->AddReplyTo($address,$_POST['fullname']);
			$mail->SetFrom($address,$_POST['fullname']);
			
			//$mail->AddAddress("info@prathatravel.com","Pratha Travel");
			$mail->AddAddress("booking@prathatravel.com","Pratha Travel");

			//$mail->AddCC("suresh92@hotmail.com","suresh Ranabhat");
			
			$mail->Subject    = "Booking for ".$_POST['city_from']." on ".$_POST["preferred_airlines"]." for ".$_POST["arrival_date"];
			$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
			$mail->MsgHTML($body);
			$mail->Send();
			unset($_SESSION['security_code']);
			echo "<script>document.location='".URL."bookcomplete/bookingsent.html'</script>";
		
				
		
}



?>