<?php

class Menu
{
      protected $input;
      protected $session_id;


      function __construct()
      {
      }

      public function Main_Menu($network_code, $input,  $msisdn, $session_id, $user_name, $traffic_id, $level)
      {
            //shows initial user main menu
            $res = "Welcome To SmartCast^Reply with^";
            $res .= "1. Cast Vote^";
            $res .= "2. View Votes^";
            $res .= "3. Contact Us";
            $response = "$network_code|MORE|$msisdn|$session_id|$res|$user_name|$traffic_id|$level";
            return $response;
      }

      public function Cast_Votes($network_code, $input,  $msisdn, $session_id, $user_name, $traffic_id, $level)
      {
            //shows initial user main menu
            $res = "Cast Votes";
            $response = "$network_code|MORE|$msisdn|$session_id|$res|$user_name|$traffic_id|$level";
            return $response;
      }

      public function View_Votes($network_code, $input,  $msisdn, $session_id, $user_name, $traffic_id, $level)
      {
            //shows initial user main menu
            $res = "View Votes";
            $response = "$network_code|MORE|$msisdn|$session_id|$res|$user_name|$traffic_id|$level";
            return $response;
      }

      public function Contact_Us($network_code, $input,  $msisdn, $session_id, $user_name, $traffic_id, $level)
      {
            // Business logic for (3) level res
            $res =  "SmartCast^";
            $res .= "Contact: 0548711633 / 0552325210^";
            $res .= "Email : smartcatee@gmail.com";
            $response = "$network_code|END|$msisdn|$session_id|$res|$user_name|$traffic_id|$level";
            return $response;
      }
}
