<?php

$MSISDN = $_GET['msisdn'];
$SESSION_ID = $_GET['sessionid'];
$NETWORKID = $_GET['network'];
$MODE = $_GET['mode'];
$DATA = $_GET['userdata'];
$USERNAME = $_GET['username'];
$TRAFFIC_ID = $_GET['trafficid'];
$OTHER = $_GET['other'];
$RESPONSE_DATA = "";


if ($MODE == "start") {
      //shows initial user main menu
      $res = "Welcome To SmartCast^Reply with^";
      $res .= "1. Cast Vote^";
      $res .= "2. View Votes^";
      $res .= "3. Contact Us";
      $OTHER = "start";
      $RESPONSE_DATA = "$NETWORKID|MORE|$MSISDN|$SESSION_ID|$res|$USERNAME |$TRAFFIC_ID|$OTHER";
} else {
       
      if($OTHER == "start" && $DATA == "1"){
          $OTHER = "1*1";
      }else if ($OTHER == "start" && $DATA == "2"){
          $OTHER = "2*1";
      }else if ($OTHER == "start" && $DATA == "3"){
          $OTHER = "3*1";
      }
           
      
      $userInputs = explode("*", $OTHER);
      // print_r($userInputs);
      if ($userInputs[0] == '1') {
            //shows initial user main menu
            if ($userInputs[1] == '1') {
                  $OTHER = "1*2";
                  $res = "Enter Nominee's ShortCode $NETWORKID";
                  $RESPONSE_DATA = "$NETWORKID|MORE|$MSISDN|$SESSION_ID|$res|$USERNAME |$TRAFFIC_ID|$OTHER ";
            } else if ($userInputs[1] == '2') {
                  $OTHER = "1*3";
                  $amount = "0.50";
                  $res = "(GHS $amount / vote)^Enter Number of votes";
                  $RESPONSE_DATA = "$NETWORKID|MORE|$MSISDN|$SESSION_ID|$res|$USERNAME |$TRAFFIC_ID|$OTHER ";
            } else if ($userInputs[1] == '3') {
                  $amount  = 0.50;
                  $shortCode = $userInputs[1];
                  $numberOfVotes = $userInputs[2];
                  $totalAmount  = ($amount * $numberOfVotes);
                  $OTHER = "1*4";
                  $res = "CheckOut :^";
                  $res .= "Smart Media Awards^";
                  $res .= "Best Singer Of The Year ^";
                  $res .= "Name : Alidu Balkisu ^";
                  $res .= "Code : $shortCode ^";
                  $res .= "Votes : $numberOfVotes ^";
                  $res .= "Amout : GHS " . number_format($totalAmount, 2) . "^";
                  $res .= "1. Confirm ^";
                  $res .= "2. Cancel";
                  $RESPONSE_DATA = "$NETWORKID|MORE|$MSISDN|$SESSION_ID|$res|$USERNAME |$TRAFFIC_ID|$OTHER ";
            } else if ($userInputs[1] == '4') {
                  if ($userInputs[3] == "1") {
                        $res = "You will recieve A Payment Promt shortly ^thank you!";
                        $RESPONSE_DATA = "$NETWORKID|END|$MSISDN|$SESSION_ID|$res|$USERNAME |$TRAFFIC_ID|$OTHER ";
                        unset($_SESSION['user_inputs']);
                  } else if ($userInputs[3] == "2") {
                        $res = "vote has been cancel successfully^thank you";
                        $RESPONSE_DATA = "$NETWORKID|END|$MSISDN|$SESSION_ID|$res|$USERNAME |$TRAFFIC_ID|$OTHER ";
                  } else {
                        $RESPONSE_DATA = "$NETWORKID|END|$MSISDN|$SESSION_ID|Inavalid Menu|$USERNAME |$TRAFFIC_ID|$OTHER ";
                  }
            } else {
                  $RESPONSE_DATA = "$NETWORKID|END|$MSISDN|$SESSION_ID|Inavalid Menu|$USERNAME |$TRAFFIC_ID|$OTHER ";
            }
      } else if ($userInputs[0]  == '2') {
            //shows initial user main menu
            if ($userInputs[1] == '1') {
                  $OTHER = "2*2";
                  $res = "Enter Nominee's ShortCode";
                  $RESPONSE_DATA = "$NETWORKID|MORE|$MSISDN|$SESSION_ID|$res|$USERNAME |$TRAFFIC_ID|$OTHER ";
            } else if ($userInputs[1] == '2') {
                  $fullName = "Alidu Balkisu";
                  $shortCode = $userInputs[1];
                  $totalVotes = 100;

                  $res = "Summary:^";
                  $res .= "Smart Media Awards^";
                  $res .= "Best Singer Of The Year^";
                  $res .= "Name : $fullName^";
                  $res .= "Code : $shortCode^";
                  $res .= "Votes: $totalVotes";
                  $RESPONSE_DATA = "$NETWORKID|END|$MSISDN|$SESSION_ID|$res|$USERNAME |$TRAFFIC_ID|$OTHER ";
            } else {
                  $RESPONSE_DATA = "$NETWORKID|END|$MSISDN|$SESSION_ID|Inavalid Menu|$USERNAME |$TRAFFIC_ID|$OTHER";
            }
      } else if ($userInputs[0]  == '3') {
            $res =  "SmartCast^";
            $res .= "Contact: 0548711633 / 0552325210^";
            $res .= "Email : smartcatee@gmail.com";
            $RESPONSE_DATA = "$NETWORKID|END|$MSISDN|$SESSION_ID|$res|$USERNAME |$TRAFFIC_ID|$OTHER";
      } else {
            $RESPONSE_DATA = "$NETWORKID|END|$MSISDN|$SESSION_ID|Inavalid Menu|$USERNAME |$TRAFFIC_ID|$OTHER";
      }
}
echo $RESPONSE_DATA;
