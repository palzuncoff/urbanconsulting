	<?php
	include "../../../wp-load.php";
	
	$db = "university_faculties_list";
	
	if(isset($_POST['name'])) {
		$data = array(
		'faculty_name' => $_POST['name']
		);
	$data_pattern = array('%s');
			
	$wpdb->insert($db, $data, $data_pattern);
	if(!empty($wpdb->last_error)) {
		die(json_encode(array("error" => $wpdb->last_error), JSON_UNESCAPED_UNICODE));
		} else echo "Данные добавлены!";
	}

	if (isset($_POST["id"])) {
		$wpdb->delete("university_faculties_list", array("id"=>$_POST["id"]),  array( '%d' ));
	}
	header('Location: https://urbanconsulting.md/wp-admin/admin.php?page=sub-page_add_faculty');
	?>