
<?php
	session_start();
	require_once 'inc/root.php';	//$salt
	
	$wk		= post("wk")?post("wk"):get("wk");
	

	switch ($wk)
	{		
		/*******<!-- -->	<!--  圖片測事--測事-->**/
		case 'upload':
			$sn	= post("sn"); 	 	
	    	$errors	= '';
	    	$pimg	= '';
	    		 	
	    	if(isset($_FILES['files']))
	    	{
				
				$data	= file_upload();	//開始上傳圖片 file_upload 在modle.php中	
				
				if($data[0]=='y')
				{
					//上傳成功
					$pimg_array	= $data[1];
					$pimg		= implode(",",$pimg_array);
				}
				elseif($data[0]=='yn')
				{
					//部分成功,部分失敗
					$pimg_array	= $data[1];
					$errors		= $data[2];
					$pimg		= implode(",",$pimg_array);
				}
				else
				{
					//上傳失敗
					$errors=$data[1];
				}
			}
			
			if($errors)
			{
				echo "<p>".$errors."</p><hr/>";
			}
				
			
			
			if($pimg && count($pimg_array)>1)
			{
				//多筆
				foreach($pimg_array as $row)
				{
					echo "<p><a href='".$_SESSION['f_menu']."'><img src='".$_SESSION['f_menu']."' /></a></p>";
				}
			}	
			elseif($pimg)
			{
				//單筆		
				if($pimg)
				{
					echo "<p><a href='".$_SESSION['f_menu']."'><img src='".$_SESSION['f_menu']."' /></a></p>";
					}
			}
			
			if(isset($_SESSION['f_menu']) && $_SESSION['f_menu']!=null){//寫入資料庫

					conn();
					$sql = "UPDATE food SET  `f_menu`='".$_SESSION['f_menu']."' WHERE `f_id`='".$sn."'";
					
					$res = $conn->exec($sql);				
				cls_conn();
				echo "</br>".$sql;
				echo"</br>".$sn ;
				unset($_SESSION['f_menu']);
				}
	
			break;
		/*******<!-- -->	<!--  圖片測事--測事-->**/	/*******<!-- -->	<!--  圖片測事--測事-->**/
		  	    
		   
		/**********************************************  新增  **********************************************/
		
		case "f_add":
		
			$f_id	= post("f_id"); 	 			
			$f_name	= post("f_name"); 	 			
			$f_offday	= post("f_offday");				
			$f_delivery	= post("f_delivery");    	 		
			$f_menu	= post("f_menu");				

			
			
			if($f_name!='')
			{
		
			conn();
			$sql = "INSERT INTO food (`f_id`,`f_name`,`f_offday`,`f_delivery`,`f_menu`) ";	
			$sql.= "VALUES(:f_id,:f_name,:f_offday,:f_delivery,:f_menu)";
			
			$res = $conn->prepare($sql);
			$res->bindParam(':f_id',$f_id,PDO::PARAM_STR,20);
			$res->bindParam(':f_name',$f_name,PDO::PARAM_STR,50);						
			$res->bindParam(':f_offday',$f_offday,PDO::PARAM_STR,10);
			$res->bindParam(':f_delivery',$f_delivery,PDO::PARAM_STR,18);	
			$res->bindParam(':f_offday',$f_offday,PDO::PARAM_STR,15);						
			$res->bindParam(':f_delivery',$f_delivery,PDO::PARAM_STR,15);	
			$res->bindParam(':f_menu',$f_menu,PDO::PARAM_STR,15);						
			
						
			$res->execute();
			if($res)
			{
				$status = array(
					'type'	=> 'success',
					'url'	=> 'f_index.php?mod=f_re',
					'msg'	=> '已新增'
				);
			}
			else
			{
				$status = array(
					'type'=>'false',
					'cls'=>'n',
					'btn'=>'success',
					'msg'=>'系統暫停服務!'
				);					
			}
			cls_conn();
			
	

			}
			else
			{
				$status = array(
					'type'=>'false',
					'cls'=>'n',
					'btn'=>'success',
					'msg'=>'必填欄位不得空白!'
				);
			}
					
			echo json_encode($status);
	    	
			break;
			
		
		/**********************************************  修改  **********************************************/
		
		case "f_edit":
			
			$f_id	= post("f_id"); 	 			//編號
			$f_name	= post("f_name"); 	 			//姓名
			$f_offday	= post("f_offday");				//電話
			$f_delivery	= post("f_delivery");    	 		//傳真
			$f_menu	= post("f_menu");				//地址
			
			if($f_name!='')
			{
				conn();
				$sql = "UPDATE food SET `f_id`=:f_id,`f_name`=:f_name,`f_offday`=:f_offday,`f_delivery`=:f_delivery, `f_menu`=:f_menu WHERE `f_id`='".$f_id."'";
				$res = $conn->prepare($sql);				
				$res->bindParam(':f_id',$f_id,PDO::PARAM_STR,18);	
				$res->bindParam(':f_name',$f_name,PDO::PARAM_STR,15);						
				$res->bindParam(':f_offday',$f_offday,PDO::PARAM_STR,15);	
				$res->bindParam(':f_delivery',$f_delivery,PDO::PARAM_STR,8);						
				$res->bindParam(':f_menu',$f_menu,PDO::PARAM_STR,50);
							
				$res->execute();
				if($res)
				{
					$status = array(
						'type'	=> 'success',
						'url'	=> 'f_index.php?mod=f_re',
						'msg'	=> '店家資料已更新'
					);
				}
				else
				{
					$status = array(
						'type'=>'false',
						'cls'=>'n',
						'btn'=>'success',
						'msg'=>'系統暫停服務!'
					);					
				}
				cls_conn();
			}
			else
			{
				$status = array(
					'type'=>'false',
					'cls'=>'n',
					'btn'=>'success',
					'msg'=>'必填欄位不得空白!'
				);
			}
			
			echo json_encode($status);
			
			break;
		
	
			/**********************************************  店家刪除  **********************************************/
		
		case "f_del":
		
			$f_id	= get("sn"); 	 			//序號
			
			conn();
			$sql = "DELETE FROM `food` WHERE `f_id`='".$f_id."'";				
			$res = $conn->exec($sql);
			 if(file_exists("uploads/".$f_id.".jpg")){
             
            unlink("uploads/".$f_id.".jpg");//將檔案刪除
        }
			if($res)
			{
				$status = array(
					'type'=>'success',
					
					'msg'=>'已刪除'
				);								
			}
			else
			{
				$status = array(
					'type'=>'false',
					'msg'=>'oops!系統暫停服務'
				);
			}
			cls_conn();	
			
			echo json_encode($status);
			
			break;
				
		/**********************************************  表單測試  **********************************************/
			
		case "test":	
		
				/*	
				資料處理結果	'type'	=>	成功(會跳轉頁面) 	=>	success 
											失敗(停留原始頁面)	=>	紅 false / 無 dismissable / 藍 info / 黃 warning 
				欄位是否清空	'cls'	=>	y/n
				原始按鈕樣式	'btn'	=>	success/primary...
				顯示訊息		'msg'	=>	'xxxxxxx'
				*/			
						
				$status = array(
					'type'=>'false',
					'cls'=>'n',
					'btn'=>'success',
					'msg'=>'test successed'
				);		
				
			print_r($status);
			echo json_encode($status);
	    	
			break;	
	}
?>
