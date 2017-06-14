<?php
include "../../../wp-load.php";
	
if(isset($_POST['name'])) {
	$data = array(
	'speciality_name' => $_POST['name']
	);
$data_pattern = array('%s');
			
$wpdb->insert("university_speciality_list", $data, $data_pattern);
if(!empty($wpdb->last_error)) {
		die(json_encode(array("error" => $wpdb->last_error), JSON_UNESCAPED_UNICODE));
		} else echo "Данные добавлены!";
	}
if (isset($_POST["id"])) {
		$wpdb->delete("university_speciality_list", array("id"=>$_POST["id"]),  array( '%d' ));
		if(!empty($wpdb->last_error)) {
		die(json_encode(array("error" => $wpdb->last_error), JSON_UNESCAPED_UNICODE));
		} else echo "Данные удалены!";

}
header('Location: https://urbanconsulting.md/wp-admin/admin.php?page=sub-page_add_speciality');
?>