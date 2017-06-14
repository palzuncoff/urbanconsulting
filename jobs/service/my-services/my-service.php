<?php
	include "../../../wp-load.php";
	$wp_userid = get_current_user_id();
	if(!$wp_userid) {
		die(json_encode(array("error" => "Unauthorized access"), JSON_UNESCAPED_UNICODE));
	}
	
	if($_SERVER['REQUEST_METHOD'] === "GET") {
		$db = "users_serv";
		$result = $wpdb->get_results("SELECT COUNT(*) AS max FROM $db WHERE wp_userid = $wp_userid", ARRAY_A);
		if(!empty($wpdb->last_error)) die(json_encode(array("error" => $wpdb->last_error), JSON_UNESCAPED_UNICODE));
		
		$max = isset($_GET['max']) ? $_GET['max'] : $result[0]['max'];
		$from = isset($_GET['from']) ? $_GET['from'] : 0;
		if($from >= $max) $from = 0;
		
		$result = $wpdb->get_results("SELECT * FROM $db WHERE wp_userid = $wp_userid LIMIT $from, $max", ARRAY_A);
		if(!empty($wpdb->last_error)) die(json_encode(array("error" => $wpdb->last_error), JSON_UNESCAPED_UNICODE));

		if(!$max) {
			die(json_encode(array("data" => null), JSON_UNESCAPED_UNICODE));
		}
		$data = array();

		foreach($result as $serv) {
			$data[] = array(	
				'id' => $serv['id'],
				'wp_userid' => $wp_userid,
				'wp_username' => $serv["wp_username"],
				'name' => $serv["name"],
				'info' => $serv["info"],
				'category' => $serv["category"],
				'date' => $serv["date"],
				'city' => $serv["city"],
				'country' => $serv["country"],
				'state' => $serv["state"],
				'msg' => $serv["msg"],
				'has_photo' => file_exists("../../../serv_data/users/".$serv["wp_username"]."/".$serv['id'].".jpg")
			);
		}
		
		die(json_encode(array("data" => $data), JSON_UNESCAPED_UNICODE));
	}
?>