<?php
	include "../wp-load.php";
	
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$country = isset($_POST['country']) ? $_POST['country'] : -1;
		$city = isset($_POST['city']) ? $_POST['city'] : -1;
		$specialties = isset($_POST['specialties']) ? $_POST['specialties'] : array();
		
		if($country == -1 && $city == -1) {
			$query = "SELECT * FROM university;";
		} else if($city == -1) {
			$query = "SELECT * FROM university WHERE country = $country;";
		} else {
			$query = "SELECT * FROM university WHERE country = $country AND city = $city;";
		}
		
		$universities = $wpdb->get_results($query, ARRAY_A);
		if(!empty($wpdb->last_error)) {
			die(json_encode(array("error" => $wpdb->last_error, "query" => $query), JSON_UNESCAPED_UNICODE));
		}
		
		if(!sizeof($universities)) {
			die(json_encode(array("data" => array()), JSON_UNESCAPED_UNICODE));
		} else {
			$query = "SELECT * FROM university_photo WHERE university_id IN (";
			for($i = 0; $i < sizeof($universities); ++$i) {
				$universities[$i]['photos'] = array();
				if((sizeof($universities) - $i) == 1) {
					$query .= $universities[$i]['id'].");";
				} else {
					$query .= $universities[$i]['id'].",";
				}
			}
			
			$photos = $wpdb->get_results($query, ARRAY_A);
			if(!empty($wpdb->last_error)) {
				die(json_encode(array("error" => $wpdb->last_error, "query" => $query), JSON_UNESCAPED_UNICODE));
			}
			
			for($i = 0; $i < sizeof($universities); ++$i) {
				for($j = 0; $j < sizeof($photos); ++$j) {
					if($universities[$i]['id'] == $photos[$j]['university_id']) {
						$universities[$i]['photos'][] = $photos[$j]['path_to_photo'];
					}
				}
			}
			
			if(!sizeof($specialties)) {
				die(json_encode(array("data" => $universities), JSON_UNESCAPED_UNICODE));
			} else {
				for($i = 0; $i < sizeof($universities); ++$i) {
					$universities[$i]['specialties'] = array();
					
					$query = "SELECT university_speciality FROM university_speciality WHERE university_id = ".$universities[$i]['id'].";";
					$spec = $wpdb->get_results($query, ARRAY_A);
					if(!empty($wpdb->last_error)) {
						die(json_encode(array("error" => $wpdb->last_error, "query" => $query), JSON_UNESCAPED_UNICODE));
					}
					
					for($j = 0; $j < sizeof($spec); $j++) {
						$universities[$i]['specialties'][] = $spec[$j]['university_speciality'];
					}
				}
				
				$tmp = array();
				for($i = 0; $i < sizeof($universities); ++$i) {
					for($j = 0; $j < sizeof($universities[$i]['specialties']); $j++) {
						if(in_array($universities[$i]['specialties'][$j], $specialties)) {
							$tmp[] = $universities[$i];
							break;
						}
					}
				}
				$tmp = array_unique($tmp);
				
				die(json_encode(array("data" => $tmp), JSON_UNESCAPED_UNICODE));
			}
		}
	}
		/*		
				
				
				
				
				$query = "SELECT * FROM university_speciality WHERE university_id IN (";
				for($i = 0; $i < sizeof($universities); ++$i) {
					if((sizeof($universities) - $i) == 1) {
						$query .= $universities[$i]['id'].");";
					} else {
						$query .= $universities[$i]['id'].",";
					}
				}
				
				$spec = $wpdb->get_results($query, ARRAY_A);
				if(!empty($wpdb->last_error)) {
					die(json_encode(array("error" => $wpdb->last_error, "query" => $query), JSON_UNESCAPED_UNICODE));
				}
				
				if(!sizeof($spec)) {
					die(json_encode(array("data" => $universities, "spec" => $spec, "u" => $universities, "q" => $query), JSON_UNESCAPED_UNICODE));
				} else {
					$count = sizeof($specialties);
					$tmp = array();
					
					for($i = 0; $i < sizeof($universities); $i++) {
						$c = 0;
						
						for($j = 0; $j < sizeof($spec); $j++) {
							if($universities[$i]['id'] == $spec[$j]['university_id']) {
								$c++;
							}
						}
						if($c == $count) {
							$tmp[] = $universities[$i];
						}
					}
					
					$tmp = array_unique($tmp);
					die(json_encode(array("data" => $tmp, "spec" => $spec, "u" => $universities, "q" => $query), JSON_UNESCAPED_UNICODE));
				}
			}
		}
		*/
		/*
		
			if(!sizeof($specialties)) {
				die(json_encode(array("data" => $universities), JSON_UNESCAPED_UNICODE));
			} else {
				$query = "SELECT university_id FROM university_speciality WHERE university_speciality IN (";
				for($i = 0; $i < sizeof($specialties); ++$i) {
					if((sizeof($specialties) - $i) == 1) {
						$query .= $specialties[$i].");";
					} else {
						$query .= $specialties[$i].",";
					}
				}
				
				$spec = $wpdb->get_results($query, ARRAY_A);
				if(!empty($wpdb->last_error)) {
					die(json_encode(array("error" => $wpdb->last_error, "query" => $query), JSON_UNESCAPED_UNICODE));
				}
				
				if(!sizeof($spec)) {
					die(json_encode(array("data" => $universities), JSON_UNESCAPED_UNICODE));
				} else {
					$ids = array();
					for($i = 0; $i < sizeof($spec); $i++) {
						$ids[] = $spec[$i]['university_id'];
					}
					$ids = array_unique($ids);
					
					$tmp = array();
					for($i = 0; $i < sizeof($ids); $i++) {
						for($j = 0; $j < sizeof($universities); $j++) {
							if($ids[$i] == $universities[$j]['id']) {
								$tmp[] = $universities[$j];
							}
						}
					}
					
					$tmp = array_unique($tmp);
					die(json_encode(array("data" => $tmp), JSON_UNESCAPED_UNICODE));
				}
			}
		}
		*/
	die(json_encode(array("error" => "Invalid method"), JSON_UNESCAPED_UNICODE));
?>