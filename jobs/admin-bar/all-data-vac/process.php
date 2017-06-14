<?php
	include "../../../wp-load.php";
	
	$db = "users_vac";
	$wp_cur_userid = get_current_user_id();
	
	if(!$wp_cur_userid) {
		die(json_encode(array("error" => "Unauthorized access"), JSON_UNESCAPED_UNICODE));
	}
	
	if(!isset($_POST['id']) || !isset($_POST['fio'])) {
		die(json_encode(array("error" => "Invalid params"), JSON_UNESCAPED_UNICODE));
	}
	
	$txt = "Здравствуйте, ".$_POST['fio']." Ваша вакансия была удалена. ".$_POST['comment']."\n https://urbanconsulting.md/ru/job/cabinet/";
	
	$wpdb->delete($db, array("id"=>$_POST["id"]),  array( '%d' ));

	$to = $_POST['wp_username'];
	$subject = "Вакансии";
	$headers = "From: office@urbanconsulting.md" . "\r\n" .
	"CC: office@urbanconsulting.md";

	mail($to, $subject, $txt, $headers);
	header('Location: https://urbanconsulting.md/wp-admin/admin.php?page=sub-page_all_data');
?>