<?php
	include "../wp-load.php";
	
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		if(isset($_POST['id'])){
			$id = $_POST['id'];
			$query = "SELECT * FROM university WHERE id = $id;";
			
			$u = $wpdb->get_results($query, ARRAY_A);
			if(!empty($wpdb->last_error)) {
				die(json_encode(array("error" => $wpdb->last_error, "query" => $query), JSON_UNESCAPED_UNICODE));
			}
			
			if($u) {
				$query = "SELECT * FROM university_photo WHERE university_id = $id;";
				$photos = $wpdb->get_results($query, ARRAY_A);
				if(!empty($wpdb->last_error)) {
					die(json_encode(array("error" => $wpdb->last_error, "query" => $query), JSON_UNESCAPED_UNICODE));
				}
				
				if($photos) {
					$u[0]['photos'] = array();
					for($i = 0; $i < sizeof($photos); $i++) {
						$u[0]['photos'][] = $photos[$i]['path_to_photo'];
					}
				}
				
				$query = "SELECT * FROM university_faculties WHERE university_id = $id;";
				$f = $wpdb->get_results($query, ARRAY_A);
				if(!empty($wpdb->last_error)) {
					die(json_encode(array("error" => $wpdb->last_error, "query" => $query), JSON_UNESCAPED_UNICODE));
				}
				
				if($f) {
					$u[0]['faculties'] = array();
					for($i = 0; $i < sizeof($f); $i++) {
						$fid = $f[$i]['university_faculty'];
						$query = "SELECT faculty_name FROM university_faculties_list WHERE id = $fid;";
						$fname = $wpdb->get_results($query, ARRAY_A);
						if(!empty($wpdb->last_error)) {
							die(json_encode(array("error" => $wpdb->last_error, "query" => $query), JSON_UNESCAPED_UNICODE));
						}
						
						$u[0]['faculties'][] = $fname[0]['faculty_name'];
					}
				}
				
				die(json_encode(array("data" => $u[0]), JSON_UNESCAPED_UNICODE));
			}
		}
		
		die(json_encode(array("error" => "Invalid parameters"), JSON_UNESCAPED_UNICODE));
	}
	
	die(json_encode(array("error" => "Invalid method"), JSON_UNESCAPED_UNICODE));
?>