<?php
require_once("menu.php");

$msisdn       = $_GET['msisdn'];
$session_id   = $_GET['sessionid'];
$network_code = $_GET['network'];
$mode         = $_GET['mode'];
$input    = $_GET['userdata'];
$user_name    = $_GET['username'];
$traffic_id   = $_GET['trafficid'];
$level        = $_GET['level'];
$response     = "";


$menu = new Menu();

if ($mode == "start") {
      //shows initial user main menu
      $response = $menu->Main_Menu($network_code, $input,  $msisdn, $session_id, $user_name, $traffic_id, $level);
} else {
      switch ($input) {
            case 1:
                  //shows initial user main menu
                  $response = $menu->Cast_Votes($network_code, $input, $msisdn, $session_id, $user_name, $traffic_id, $level);
                  break;
            case 2:
                  //shows initial user main menu
                  $response = $menu->View_Votes($network_code, $input, $msisdn, $session_id, $user_name, $traffic_id, $level);
                  break;
            case 3:
                  //shows initial user main menu
                  $response = $menu->Contact_Us($network_code, $input, $msisdn, $session_id, $user_name, $traffic_id, $level);
                  break;
            default:
                  //shows initial user main menu
                  $response = "$network_code|END|$msisdn|$session_id|Inavalid Menu|$user_name |$traffic_id |$level ";
      }
}

echo $response;
