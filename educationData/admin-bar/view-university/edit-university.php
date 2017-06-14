<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="/educationData/admin-bar/admin-bar.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<title>Редактировать универ</title>
	<body>
	<?php 
	include "../../../wp-load.php";
	include "../../../adeon.php"; 
	global $wpdb;

	if (isset($_POST['change_university_data'])) {
		function rand_photo_name($text_len) { 
			$b="QWERTYUPASDFGHJKLZXCVBNMqwertyuopasdfghjkzxcvbnm0123456789"; 
			while($text_len-->0) $s.=$b[mt_rand(0,strlen($b))]; 
		return $s; 
	}
	
	$wpdb->delete("university_faculties", array("university_id"=>$_POST["id"]),  array( '%d' ));
	$wpdb->delete("university_speciality", array("university_id"=>$_POST["id"]),  array( '%d' ));

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
						$path = "../../../university_data/icons/".$_POST['icon_path'];
						if(file_exists($path)) unlink($path);
						$data = array(
						'icon' => $icon_name.".jpg"
						);
						$data_pattern = array('%s');
						$where = array('id' => $_POST['id']);
						$where_pattern = array('%d');
						$wpdb->update("university", $data, $where, $data_pattern, $where_pattern);
				}
			}
		}

	foreach($_POST['faculty_names'] as $value) {
		$data = array(
		'university_id' => $_POST['id'],
		'university_faculty' => $value
		);
		$data_pattern = array('%d', '%d');
		$wpdb->insert("university_faculties", $data, $data_pattern);
	}	
	if(!empty($wpdb->last_error)) {
		die(json_encode(array("error" => $wpdb->last_error), JSON_UNESCAPED_UNICODE));
	}

	foreach($_POST['speciality_names'] as $value) {
		$data = array(
		'university_id' => $_POST['id'],
		'university_speciality' => $value
		);
		$data_pattern = array('%d', '%d');
		$wpdb->insert("university_speciality", $data, $data_pattern);
	}	
	if(!empty($wpdb->last_error)) {
		die(json_encode(array("error" => $wpdb->last_error), JSON_UNESCAPED_UNICODE));
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
	'what_can_learn' => $_POST['what_can_learn'],
	'why_us' => $_POST['why_us'],
	'after_finish' => $_POST['after_finish'],
	'address' => $_POST['address'],
	'map_url' => $_POST['map_url']
	);
	$data_pattern = array('%s', '%d', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');
	$where = array('id' => $_POST['id']);
	$where_pattern = array('%d');
	
	$wpdb->update("university", $data, $where, $data_pattern, $where_pattern);
	if(!empty($wpdb->last_error)) {
		die(json_encode(array("error" => $wpdb->last_error), JSON_UNESCAPED_UNICODE));
	}

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
					'university_id' => $_POST["id"],
					'path_to_photo' => $photo_name.".jpg"
					);
					$photo_data_pattern = array('%d', '%s');
					$wpdb->insert("university_photo", $photo_data, $photo_data_pattern);
				}
			}
		}
	}
}

	if (isset($_POST['delete_photo'])) {
		$wpdb->delete("university_photo", array("id"=>$_POST['photo_id']),  array( '%d' ));
		$path = "../../../university_data/photo/".$_POST['photo_path'];
		if(file_exists($path)) unlink($path);
	}

	if(isset($_POST['id'])) {
	$univ_id = $_POST['id'];
	$university_data = $wpdb->get_results("SELECT * FROM university where id=$univ_id", ARRAY_A);
	if(!empty($wpdb->last_error)) die($wpdb->last_error);

	$faculties_name = $wpdb->get_results("SELECT * FROM university_faculties_list", ARRAY_A);
	if(!empty($wpdb->last_error)) die($wpdb->last_error);

	$university_faculties = $wpdb->get_results("SELECT university_faculty FROM university_faculties where university_id=$univ_id", ARRAY_A);
	if(!empty($wpdb->last_error)) die($wpdb->last_error);

	$university_speciality = $wpdb->get_results("SELECT university_speciality FROM university_speciality where university_id=$univ_id", ARRAY_A);
	if(!empty($wpdb->last_error)) die($wpdb->last_error);
	
	$speciality_name = $wpdb->get_results("SELECT * FROM university_speciality_list", ARRAY_A);
	if(!empty($wpdb->last_error)) die($wpdb->last_error);

	$university_photo = $wpdb->get_results("SELECT * FROM university_photo where university_id=$univ_id", ARRAY_A);
	if(!empty($wpdb->last_error)) die($wpdb->last_error);

	foreach ($university_data as $data) {
	?>
	<form method="POST" enctype="multipart/form-data" action="">  
	<pre>
Название: <input type="text" name="name" required="required" value="<?php echo $data['name'];?>">

<select name="country" id="country" required>
	<option disabled selected hidden value="-1">Выберите страну</option> 
</select> <select name="city" id="city" required>
	<option disabled selected hidden value="-1">Выберите город</option>
</select>

Информация:
<textarea name="info" required="" rows="5" cols="40"><?php echo $data['info'];?></textarea> 

Адрес: <input type="text" name="address" value="<?php echo $data['address'];?>"> Map_Url: <input type="text" name="map_url" value="<?php echo $data['map_url'];?>">

WEB-site: <input type="text" name="site" value="<?php echo $data['site'];?>"> FAX: <input type="text" name="fax" value="<?php echo $data['fax'];?>">

Telephone: <input type="text" name="phone" value="<?php echo $data['phone'];?>"> Email: <input type="text" name="email" value="<?php echo $data['email'];?>">

what_can_learn: <textarea name="what_can_learn" required="" rows="5" cols="40"><?php echo $data['what_can_learn'];?></textarea>  why_us: <textarea name="why_us" required="" rows="5" cols="40"><?php echo $data['why_us'];?></textarea> 

after_finish: <textarea name="after_finish" required="" rows="5" cols="40"><?php echo $data['after_finish'];?></textarea>

Иконка: <?php echo '<img src="/university_data/icons/'.$data['icon'].'" style="width:128px;height:128px">'; ?>

<input type="hidden" name="icon_path" value="<?php echo $data['icon']; ?>">
<select size=15 id="faculty_names" name="faculty_names[]" required="required" multiple="multiple">
	<?php
	foreach ($faculties_name as $fac_name) { ?>
	<option value="<?php echo $fac_name['id'];?>" <?php foreach($university_faculties as $univ_fac) { echo in_array($fac_name['id'], $univ_fac) ? 'selected' : ''; } ?> ><?php echo $fac_name['faculty_name'];?></option>
	<?php } ?>
</select>  <select size=15 id="speciality_names" name="speciality_names[]" required="required" multiple="multiple">
	<?php
	foreach($speciality_name as $spec_name) { ?>
	<option value="<?php echo $spec_name['id'];?>" <?php foreach($university_speciality as $univ_spec) { echo in_array($spec_name['id'], $univ_spec) ? 'selected' : ''; } ?> ><?php echo $spec_name['speciality_name'];?></option>
	<?php } } } ?>
</select></pre>
		<div style="width: 100%;float: left;">
		Фото:<input type="file" multiple name="photo[]">
		<br><br>
		Иконка: <input type="file" name="icon">
		<br><br>
		<input type="hidden" name="id" value="<?php echo $univ_id; ?>">
		<input type="submit" name="change_university_data" value="Отправить">  
	</form>
	</div>
	<?php 
	foreach($university_photo as $photo) { ?>
	<form method="POST" action="">
		<input type="hidden" name="id" value="<?php echo $univ_id; ?>">
		<input type="hidden" name="photo_id" value="<?php echo $photo['id']; ?>">
		<input type="hidden" name="photo_path" value="<?php echo $photo['path_to_photo']; ?>">
		<?php
		echo '<div class="image-block"><img src="/university_data/photo/'.$photo['path_to_photo'].'" style="width:128px;height:128px">';
		?>
		<input type="submit" name="delete_photo" value="Удалить">
		</div>  
		</form>
		<?php } ?>
		<div>
		<button style="width: 100%;" onclick="Back_to_university_list(); return false">Вернуться к списку</button>
		</div>
	<script src="/jobs/adeon.js"></script>
	<script>
		$(document).ready(function() {
			populateCountries("country", "city");
		});
		function Back_to_university_list(){
   			window.location.href='https://urbanconsulting.md/wp-admin/admin.php?page=sub-page_all_data_univ';
		}
	</script>
	</body>
</html>