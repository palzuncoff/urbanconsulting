<?php		
	include "../../../jobs/adeon.php";
	include "../../../wp-load.php";
	$db="users_serv";	
	$wp_userid = get_current_user_id();	
	$wp_username = $current_user->user_login;	
	if(!$wp_userid) die(json_encode(array("error" => "Unauthorized access"), JSON_UNESCAPED_UNICODE));		
	if($_SERVER['REQUEST_METHOD'] === 'POST') {	
		$result = $wpdb->get_results("SELECT `AUTO_INCREMENT` as v FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'urbancon_sulting' AND TABLE_NAME = 'users_serv'");	
		if(!empty($wpdb->last_error)) die(json_encode(array("error" => $wpdb->last_error, "post"=> $_POST), JSON_UNESCAPED_UNICODE));		
		$max = $result[0]->v;	
					
		if(!$_FILES['serv-photo']['error']) {		
			$name = $_FILES['serv-photo']['name'];	
				if(!check_file_uploaded_name($name) || !check_file_uploaded_length($name)) {
					die(json_encode(array("error" => "Wrong file name"), JSON_UNESCAPED_UNICODE));			
				}

				if($_FILES['serv-photo']['size'] > 500000) {
					die(json_encode(array("error" => "Wrong file size"), JSON_UNESCAPED_UNICODE));			
				}			

				if (!file_exists("../../../serv_data/users/$wp_username")) {				
					mkdir("../../../serv_data/users/$wp_username", 0777, true);			
				}	

				move_uploaded_file($_FILES['serv-photo']['tmp_name'], "../../../serv_data/users/$wp_username/$max.jpg");		
		}		

		$data = array(
			'wp_userid' => $wp_userid,			
			'wp_username' => $wp_username,			
			'name' => $_POST['serv-name'],			
			'country' => $_POST['serv-country'],			
			'city' => $_POST['serv-city'],					
			'category' => $_POST['serv-category'],					
			'info' => $_POST['serv-info'],			
			'state' => 0,			
			'date' => current_time('mysql'),			
			'has_photo' => file_exists("../../../serv_data/users/$wp_username/$max.jpg")		
		);		
		$data_pattern = array('%d', '%s', '%s', '%d', '%d', '%s', '%d', '%d', '%s', '%d', '%s', '%d');				

		$wpdb->insert( $db, $data, $data_pattern);		
		if(!empty($wpdb->last_error)) die(json_encode(array("error" => $wpdb->last_error), JSON_UNESCAPED_UNICODE));		
		die(json_encode(array("action" => "insert"), JSON_UNESCAPED_UNICODE));	
	}
?>