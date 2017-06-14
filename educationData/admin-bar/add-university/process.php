<?php
	include "../../../wp-load.php";
	include "../../../adeon.php";
	function rand_photo_name($text_len) { 
		$b="QWERTYUPASDFGHJKLZXCVBNMqwertyuopasdfghjkzxcvbnm0123456789"; 
		while($text_len-->0) $s.=$b[mt_rand(0,strlen($b))]; 
		return $s; 
	}

		$get_next_id = $wpdb->get_results("SELECT `AUTO_INCREMENT` as v FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'urbancon_sulting' AND TABLE_NAME = 'university'");	
		$next_id = $get_next_id[0]->v;	

	foreach($_POST['faculty_names'] as $value) {
			$data = array(
			'university_id' => $next_id,
			'university_faculty' => $value
			);
		$data_pattern = array('%d', '%d');
		$wpdb->insert("university_faculties", $data, $data_pattern);
		}
	
	if(!empty($wpdb->last_error)) {
		die(json_encode(array("error" => $wpdb->last_error), JSON_UNESCAPED_UNICODE));
	} else echo "Данные добавлены!";

	foreach($_POST['speciality_names'] as $value) {
			$data = array(
			'university_id' => $next_id,
			'university_speciality' => $value
			);
		$data_pattern = array('%d', '%d');
		$wpdb->insert("university_speciality", $data, $data_pattern);
		}
	
	if(!empty($wpdb->last_error)) {
		die(json_encode(array("error" => $wpdb->last_error), JSON_UNESCAPED_UNICODE));
	} else echo "Данные добавлены!";

	if (isset($_FILES['icon'])) {
		if (!file_exists("../../../university_data/icons")) {
			mkdir("../../../university_data/icons", 0777, true);
		}
			if(!$_FILES['icon']['error']) {
				if($_FILES['icon']['size'] < 900000) {
					$icon_name = rand_photo_name(32);
					while(file_exists("../../../university_data/icons/".$icon_name.".jpg")){
						$icon_name = rand_photo_name(32);
					}
					move_uploaded_file($_FILES['icon']['tmp_name'], "../../../university_data/icons/".$icon_name.".jpg");
				}
			}
		}

	$data = array(
	'name' => $_POST['name'],
	'country' => $_POST['country'],
	'city' => $_POST['city'],
	'email' => $_POST['email'],
	'site' => $_POST['site'],
	'fax' => $_POST['fax'],
	'phone' => $_POST['phone'],
	'info' => $_POST['info'],
	'icon' => $icon_name.".jpg",
	'what_can_learn' => $_POST['what_can_learn'],
	'why_us' => $_POST['why_us'],
	'after_finish' => $_POST['after_finish'],
	'address' => $_POST['address'],
	'map_url' => $_POST['map_url']
	);
	$data_pattern = array('%s', '%d', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');
			
	$wpdb->insert("university", $data, $data_pattern);
	if(!empty($wpdb->last_error)) {
		die(json_encode(array("error" => $wpdb->last_error), JSON_UNESCAPED_UNICODE));
	} else echo "Данные добавлены!";

	if (isset($_FILES['photo'])) {
		if (!file_exists("../../../university_data/photo")) {
			mkdir("../../../university_data/photo", 0777, true);
		}

		$photo_size = sizeof($_FILES['photo']['name']);
		for($i=0; $i<$photo_size; $i++){
			if(!$_FILES['photo']['error'][$i]) {
				if($_FILES['photo']['size'][$i] < 900000) {
					$photo_name = rand_photo_name(32);
					while(file_exists("../../../university_data/photo/".$photo_name.".jpg")){
						$photo_name = rand_photo_name(32);
					}
					move_uploaded_file($_FILES['photo']['tmp_name'][$i], "../../../university_data/photo/".$photo_name.".jpg");
					$photo_data = array(
					'university_id' => $next_id,
					'path_to_photo' => $photo_name.".jpg"
					);
					$photo_data_pattern = array('%d', '%s');
					$wpdb->insert("university_photo", $photo_data, $photo_data_pattern);
				}
			}
		}
	}

	header('Location: https://urbanconsulting.md/wp-admin/admin.php?page=sub-page_all_data_univ');
?>