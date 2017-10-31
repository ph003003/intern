<?php

require_once('settings.php');
//用於刷新令牌 不要常用 50次後會被鎖//$login_url = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/calendar') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=offline&prompt=consent';

//$login_url ="http://".$path."?";
//echo $login_url ; 
?>
<!DOCTYPE html>
<html>
<head>
<title>亞典缺勤系統</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<script src="https://use.fontawesome.com/09faeb38dd.js"></script>
		<link rel="stylesheet" href="css/style.css" >

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.1.9/jquery.datetimepicker.min.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.1.9/jquery.datetimepicker.min.js"></script>
<style type="text/css">
body{
	font-family:'微軟正黑體';
}
</style>
</head>

<body>
<div class="container">
<div class="row clearfix">
		<div class="col-md-12 column">
			<h2>
				亞典臨時缺勤通知系統<br>
				</h2>
			</div> 
		</div> 
</div> 

<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="jumbotron well">
				<div>
					<div>
	<form>
				<h4>請填入姓名	</h4>

			<input type="text" id="event-title" placeholder="姓名" autocomplete="off" required="required" />
			</div>
			<div>
				<h4>缺勤時間</h4>
	<input type="hidden" id="event-type" value="FIXED-TIME">
	<!--
	<select id="event-type"  autocomplete="off">
		<option value="FIXED-TIME">非整日(或多日)</option>
		<option value="ALL-DAY">整日缺勤</option>
	</select>
	-->	<input type="hidden" id="event-kind" value="intern" />
	<h4>從<input type="text" class="event-hours" id="event-start-time" placeholder="Event Start Time" autocomplete="off" required="required" /></br>
	到<input type="text" class="event-hours" id="event-end-time" placeholder="Event End Time" autocomplete="off" required="required" />
	<!--
	<input type="text" id="event-date" placeholder="Event Date" autocomplete="off" required="required" />
	<br/>請假時數<input type="text" id="hours" placeholder="請假時數" autocomplete="off" required="required" />	</h4>
	ps,時數自動計算不一定正確，請多加確認。</div>
	-->
					</div>
					<div>
						<h4>事由</h4>
					<select  id="reason_kind">
					<option value="事假">事假</option>
				　<option value="病假">病假</option>
				<option value="婚假">婚假</option>
				　<option value="喪假">喪假</option>
				　<option value="產假">產假</option>
				　<option value="特休">特休</option>
				<option value="official">公假</option>
				　<option value="其他">其他</option>
				</select>
					</div>
					<div>
						<h4>事由(非必填)	</h4>
	<textarea id="reason" class="control" rows="2" name='reason' style="width:100%; height:100%;"></textarea>
					</div>
				</div>
				<p>
				<input type="submit" value="登記缺勤" class="btn btn-primary btn-large" id="create-event" >
				
				</p>	
		</form>
		
		<iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;
src=<?=$intern_calendarid ?>&amp;
color=%23182C57&amp;ctz=Asia%2FTaipei" style="border-width:0" 
width="100%" height="600" frameborder="0" scrolling="no"></iframe>
			</div>
		</div>
	</div>
</div>

</body>
	<!-- Page JS  Scripts -->
	
	<!-- Page JS (Customer) -->
<script src="js/event_start_end_time.js"></script>
</html>