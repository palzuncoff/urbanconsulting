<?php
	include "../../../wp-load.php";
	
	$db = "users_serv";
	$wp_cur_userid = get_current_user_id();
	if(!$wp_cur_userid) {
		die(json_encode(array("error" => "Unauthorized access"), JSON_UNESCAPED_UNICODE));
	}
	
	if($_SERVER['REQUEST_METHOD'] === "GET") {
		$country = isset($_GET['country']) ? $_GET['country'] : -1;
		$city = isset($_GET['city']) ? $_GET['city'] : -1;
		$category = isset($_GET['category']) ? $_GET['category'] : -1;
		
		$where = "state = 1";
		if(strval($country) != -1) $where .= " AND country = ".$country;
		if(strval($city) != -1)  $where .= " AND city = ".$city;
		if(strval($category) != -1)  $where .= " AND category = ".$category;
		
		$query = "SELECT COUNT(*) AS max FROM $db WHERE ".$where;
		$result = $wpdb->get_results($query, ARRAY_A);
		if(!empty($wpdb->last_error)) {
			die(json_encode(array("error" => $wpdb->last_error, "query" => $query), JSON_UNESCAPED_UNICODE));
		}
		
		$max = isset($_GET['max']) ? $_GET['max'] : $result[0]['max'];
		$from = isset($_GET['from']) ? $_GET['from'] : 0;
		if($from >= $max) $from = 0;
		$where .= " ORDER BY date DESC LIMIT $from, $max";
		
		$query = "SELECT * FROM $db WHERE ".$where;
		$result = $wpdb->get_results($query, ARRAY_A);
		if(!empty($wpdb->last_error)) {
			die(json_encode(array("error" => $wpdb->last_error, "query" => $query), JSON_UNESCAPED_UNICODE));
		}

		if(!$max) {
			die(json_encode(array("data" => null), JSON_UNESCAPED_UNICODE));
		}
		
		$data = array();

		foreach($result as $serv) {
			$data[] = array(
				'id' => $serv['id'],
				'wp_username' => $serv["wp_username"],
				'name' => $serv["name"],
				'info' => $serv["info"],
				'city' => $serv["city"],
				'country' => $serv["country"],
				'category' => $serv["category"],
				'state' => $serv["state"],
				'date' => $serv["date"],
				'has_photo' => file_exists("../../../serv_data/users/".$serv["wp_username"]."/".$serv['id'].".jpg")
			);
		}
		
		die(json_encode(array("data" => $data, "get" => $_GET), JSON_UNESCAPED_UNICODE));
	}
?>