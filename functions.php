<?php

function ONESIGNAL($uniqueId, $title, $message, $bigImage, $link, $postId, $oneSignalAppId, $oneSignalRestApiKey) {

		$content = array("en" =>  $message);

		$fields = array(
			'app_id' => $oneSignalAppId,
			'included_segments' => array('All'),                                            
			'data' => array(
				"foo" => "bar",
				"link" => $link,
				"post_id" => $postId,
				"unique_id" => $uniqueId
			),
			'headings'=> array("en" => $title),
			'contents' => $content,
			'big_picture' => $bigImage         
		);

		$fields = json_encode($fields);
		print("\nJSON sent:\n");
		print($fields);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
			'Authorization: Basic '. $oneSignalRestApiKey));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);

		$_SESSION['msg'] = "OneSignal push notification sent...";
		header('Location:index.php');
		exit;       

	}

?>
