<?php
	include "../../../wp-load.php";
	$db = "users_serv";
	$wp_userid = get_current_user_id();
	if(!$wp_userid) {
		die(json_encode(array("error" => "Unauthorized access"), JSON_UNESCAPED_UNICODE));
	}
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$servid = $_POST["id"];
		$servusername = $_POST["wp_username"];
		$result = $wpdb->delete($db, array("id"=>$servid),  array( '%d' ));
		if(!empty($wpdb->last_error)) die(json_encode(array("error" => $wpdb->last_error), JSON_UNESCAPED_UNICODE));

		$path = "../../../serv_data/users/".$servusername."/".$servid.".jpg";
		if(file_exists($path)) unlink($path);

		die(json_encode(array("data" => null, "post"=> $_POST, "path"=>$path), JSON_UNESCAPED_UNICODE));
	}
?>