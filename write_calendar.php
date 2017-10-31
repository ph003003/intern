<?php
session_start();
require_once('settings.php');//存入各項初始變數
require_once('google-calendar-api.php');
/**通知信*****/
require_once('PHPMailer/PHPMailerAutoload.php'); //引入phpMailer 記得將路徑換成您自己的path
function phpmailer($boss_mail,$start,$end,$name,$reason_kind,$reason) {	
	$start_datetime=explode("T",$start);	
	$start_day	= $start_datetime[0];
	$start_time	= substr($start_datetime[1],0,5);
	$end_datetime=explode("T",$end);	
	$end_day	= $end_datetime[0];
	$end_time	= substr($end_datetime[1],0,5);
		$phpmailer= new PHPMailer(); //初始化一個PHPMailer物件
		$phpmailer->Host = "smtp.gmail.com"; //SMTP主機 (這邊以gmail為例，所以填寫gmail stmp)
		$phpmailer->IsSMTP(); //設定使用SMTP方式寄信
		$phpmailer->SMTPAuth = true; //啟用SMTP驗證模式
		$phpmailer->Username = "ph001001001@gmail.com"; //您的 gamil 帳號
		$phpmailer->Password = "b93thcqn"; //您的 gmail 密碼
		$phpmailer->SMTPSecure = "ssl"; // SSL連線 (要使用gmail stmp需要設定ssl模式) 
		$phpmailer->Port = 465; //Gamil的SMTP主機的port(Gmail為465)。
		$phpmailer->CharSet = "utf-8"; //郵件編碼
		$phpmailer->From = "b93thcqn@gmail.com"; //寄件者信箱
		$phpmailer->FromName = "臨時缺勤系統"; //寄件者姓名
		$phpmailer->AddAddress($boss_mail, "我是收件人"); //收件人郵件和名稱
		$phpmailer->AddBCC('b93thcqn@gmail.com'); //設定 密件副本收件人 
		$phpmailer->IsHTML(true); //郵件內容為html 
		//$phpmailer->addAttachment('/tmp/image.jpg', 'new.jpg'); //添加附件(若不需要則註解掉就好)
		$phpmailer->Subject = "臨時缺勤通知信系統。"; //郵件標題
		$phpmailer->Body ="
		<table border='1' style='width:100%'><tr>
	<td align='center' valign='center'
		style='font-size:1.2rem;
			background-color: lightblue;
			padding: 1.2rem;
			'>姓名</td>
			
		<td align='center' valign='center'
		style='font-size:1.2rem;
			background-color: lightblue;
			padding: 1.2rem;
			'>種類</td>
			
		<td align='center' valign='center'
		style='font-size:1.2rem;
			background-color: lightblue;
			padding: 1.2rem;width:30%'>事由</td>
			
		<td align='center' valign='center'
		style='font-size:1.2rem;
			background-color: lightblue;
			padding: 1.2rem;
			'>缺勤開始時間</td>
			
		<td align='center' valign='center'
		style='font-size:1.2rem;
			background-color: lightblue;
			padding: 1.2rem;'>結束時間</td></tr>
			
		<tr><td  align='center' valign='center'
		style='font-size:1.2rem;
			padding: 1.2rem;'>".$name.
		
		"</td><td align='center'  valign='center'
		style='font-size:1.2rem;
			padding: 1.2rem;'>".$reason_kind.
		"</td><td 
		style='font-size:1.2rem;
				padding: 1.2rem;'>".$reason.
		"</td><td  align='center'  valign='center' 
		
		style='font-size:1.2rem;
				padding: 1.2rem;'>".$start_day."<br>".$start_time."
				
		<td  align='center'  valign='center'
		style='font-size:1.2rem;
				padding: 1.2rem;'>".$end_day."<br>".$end_time.
		"</tr></table>"; //郵件內容		
		$phpmailer->AltBody = '當收件人的電子信箱不支援html時，會顯示這串~~';	
		$phpmailer->send();						
	}
/**************************************/
// Google passes a parameter 'code' in the Redirect Url
//重要!! 用於刷新令牌的不要常用 50次後會被鎖//$login_url = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/calendar') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=offline&prompt=consent';
if(isset($_GET['code'])&& is_null($_SESSION['refresh_token'])) {
	try {
		$gapi = new GoogleCalendarApi();
		// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
		// Access Tokem
		$access_token = $data['access_token'];
	
		if(array_key_exists('refresh_token', $data)){
		$_SESSION['refresh_token_new']= $data['refresh_new'];
		echo "refresh_token_new:::(記得要改舊的)".$_SESSION['refresh_token_new'];
		}
		// We passed a state parameter in the OAuth login url. So Google will pass this parameter in the Redirect Url
		// In frontend parameters were encoded to JSON and then base64 encoded
		// In backend we base64 decode and then json decode it
	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}
else{
	$reason=urldecode($_GET['reason']);
	$reason=nl2br($reason);
	$reason_kind=urldecode($_GET['reason_kind']);
	$event = json_decode(base64_decode($_GET['state']), true);
	/**/
	$path="http://".path()."intern.php";
	$event_time= $event['event_time'];
			if($event['all_day'] == 1) {
				$start =$event_time['event_date'];
				$end = $event_time['event_date'];
			}
			else if($event['all_day'] == 0) {
				$start =  $event_time['start_time'];
				$end = $event_time['end_time'];
			}
		
	$start_datetime=explode("T",$start);	
	$start_day	= $start_datetime[0];
	$start_time	= substr($start_datetime[1],0,5);
	$end_datetime=explode("T",$end);	
	$end_day	= $end_datetime[0];
	$end_time	= substr($end_datetime[1],0,5);
	
	$title=$start_time."~~".$end_time.urldecode($event['title']);
	$gapi = new GoogleCalendarApi();
	$data = $gapi->GetRefreshedAccessToken(CLIENT_ID, $_SESSION['refresh_token'], CLIENT_SECRET);
	// The new access token 
	//print_r($data);
	 $_SESSION['access_token']= $data['access_token'];
		// Get user calendar timezone
		// Get user calendar timezone
		$user_timezone = $gapi->GetUserCalendarTimezone($_SESSION['access_token']);
	//print_r($user_timezone);
		// Create event on primary calendar
		
	/**/
	$event_id = $gapi->CreateCalendarEvent($intern_calendarid, $title, $event['all_day'],$event['event_time'], $user_timezone, $_SESSION['access_token'],$reason);
		//print_r($event_id);
		
		foreach ($boss_mail as $value ){
			phpmailer($value,$start,$end,urldecode($event['title']),$reason_kind,$reason);
				}
		}
echo json_encode(array('name11'=>$title));
?>