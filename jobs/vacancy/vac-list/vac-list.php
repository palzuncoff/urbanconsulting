<?php
	include "../../../wp-load.php";
	
	$maxItemsPerPage = 10; //pagination
	
	$db = "users_vac";
	$wp_cur_userid = get_current_user_id();
	if(!$wp_cur_userid) {
		die(json_encode(array("error" => "Unauthorized access"), JSON_UNESCAPED_UNICODE));
	}
	
	if($_SERVER['REQUEST_METHOD'] === "GET") {
		$page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : 1; //pagination
		$count = (isset($_GET['count']) && $_GET['count']) ? $_GET['count'] : $maxItemsPerPage;//pagination
		
		$country = isset($_GET['country']) ? $_GET['country'] : -1;
		$city = isset($_GET['city']) ? $_GET['city'] : -1;
		$category = isset($_GET['category']) ? $_GET['category'] : -1;
		$qual = isset($_GET['qual']) ? $_GET['qual'] : -1;
		$unqual = isset($_GET['unqual']) ? $_GET['unqual'] : -1;
		
		$where = "state = 1";
		if(strval($country) != -1) $where .= " AND country = ".$country;
		if(strval($city) != -1)  $where .= " AND city = ".$city;
		if(strval($category) != -1)  $where .= " AND category = ".$category;
		if(strval($qual) != -1)  $where .= " AND qual = ".$qual;
		if(strval($unqual) != -1)  $where .= " AND unqual = ".$unqual;
		
		$query = "SELECT COUNT(*) AS total FROM $db WHERE ".$where;
		$result = $wpdb->get_results($query, ARRAY_A);
		if(!empty($wpdb->last_error)) {
			die(json_encode(array("error" => $wpdb->last_error, "query" => $query), JSON_UNESCAPED_UNICODE));
		}
		
		$totalItems = $result[0]['total'];
		if($count > $totalItems) $count = $totalItems;
		$totalPages = ceil($totalItems/$maxItemsPerPage);
		$from = $maxItemsPerPage * ($page - 1);
		
		$where .= " ORDER BY date DESC LIMIT $from, $count";
		
		$query = "SELECT * FROM $db WHERE ".$where;
		$result = $wpdb->get_results($query, ARRAY_A);
		if(!empty($wpdb->last_error)) {
			die(json_encode(array("error" => $wpdb->last_error, "query" => $query), JSON_UNESCAPED_UNICODE));
		}

		if(!$wpdb->num_rows) {
			die(json_encode(array("data" => null), JSON_UNESCAPED_UNICODE));
		}
		
		$data = array(
			'pagination' => array(
				'totalItems' => $totalItems,
				'itemsPerPage' => $count,
				'totalPages' => $totalPages,
				'curPage' => $page,
				'fromOffset' => $from
			),
			'items' => array()
		);

		foreach($result as $vac) {
			$data['items'][] = array(
				'id' => $vac['id'],
				'wp_username' => $vac["wp_username"],
				'name' => $vac["name"],
				'info' => $vac["info"],
				'city' => $vac["city"],
				'country' => $vac["country"],
				'category' => $vac["category"],
				'qual' => $vac["qual"],
				'unqual' => $vac["unqual"],
				'state' => $vac["state"],
				'date' => $vac["date"],
				'has_photo' => file_exists("../../../vac_data/users/".$vac["wp_username"]."/".$vac['id'].".jpg")
			);
		}
		
		die(json_encode(array("data" => $data, "get" => $_GET), JSON_UNESCAPED_UNICODE));
	}
	
	die(json_encode(array("error" => "Invalid method"), JSON_UNESCAPED_UNICODE));
?>