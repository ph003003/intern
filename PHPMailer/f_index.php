 <?php
 
	session_start();
	require_once("inc/root.php");
	$mod	= get('mod');
?>
  <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>表單範例</title>
	
<?php
if($mod!='f_Turntable')
	        	{
					?>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<script src="https://use.fontawesome.com/09faeb38dd.js"></script>
		<link rel="stylesheet" href="css/style.css" >
		<?php
				}?>
		
<?php
if($mod=='f_Turntable')
	        	{
			?>
			<!DOCTYPE html>
<!-- saved from url=(0059)http://www.5iweb.com.cn/resource/5iweb2017042404/index.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0">
        
        <title>  </title>
    <style media="screen">
        *{ margin: 0; padding: 0 ;font-family: Arial, Helvetica, sans-serif; font-family: "微软雅黑";font-weight: normal;}
        ul,li{ list-style: none;}
        body{ background: #dedede;}
        /*转盘*/
        .wheel{margin: 100px auto; position: relative; padding: 20px; width: 400px; height: 400px; background: #d40; border-radius: 50%; box-shadow: inset 0 2px 0 2px rgba(255,255,255,.3), inset 0 -2px 0 2px rgba(0,0,0,.2), 1px 2px 2px rgba(0,0,0,.2);}
        .wheel ul {list-style: none;}
        .wheel-list{ transition: all 3s ease-in-out;position: relative; z-index: 20; display: block; width: 400px; height: 400px; overflow: hidden; background: #fff; border-radius: 50%; box-shadow: 0 0 6px 2px rgba(0,0,0,.4);}
        .wheel-list:before{position: absolute; top: 0; left: 0; display: block; width: 100%; height: 100%; content: ''; border-radius: 50%; box-shadow: inset 0 0 0 8px rgba(255,255,155,.5); background: rgb(255,255,255); background: -moz-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 40%, rgba(255,102,0,1) 85%); background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(40%,rgba(255,255,255,1)), color-stop(85%,rgba(255,102,0,1))); background: -webkit-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 40%,rgba(255,102,0,1) 85%); background: -o-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 40%,rgba(255,102,0,1) 85%); background: -ms-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 40%,rgba(255,102,0,1) 85%); background: radial-gradient(ellipse at center, rgba(255,255,255,1) 40%,rgba(255,102,0,1) 85%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ff6600',GradientType=1 );}
        .wheel-list li{position: absolute; top: 0; left: 0; width: 400px; height: 200px; -moz-transform-origin: center bottom; -webkit-transform-origin: center bottom; -o-transform-origin: center bottom; -ms-transform-origin: center bottom; transform-origin: center bottom;}
        .wheel-list li i{position: absolute; top: 0; left: 0; margin-left: -50%; display: block; width: 100%; height: 100%; background: rgba(255,221,0,.3); content: ''; box-shadow: inset -1px 0 0 rgba(255,153,0,.7), inset 0 -1px 0 rgba(255,255,255,.4); -moz-transform-origin: right bottom; -webkit-transform-origin: right bottom; -o-transform-origin: right bottom; -ms-transform-origin: right bottom; transform-origin: right bottom;}
        .wheel-list .thanks{position: relative; margin: 0 auto; padding-top: 20px; width: 1em; color: #900; font-size: 18px; font-weight: 700; text-shadow: 0 1px 0 rgba(255,255,255,.4);font-weight: normal;}
        .wheel-list .prize{position: relative; margin: 0 auto; padding-top: 20px; width: 50%; overflow: hidden; text-align: center; line-height: 25px; text-shadow: 0 1px 0 rgba(255,255,255,.5);}
        .wheel-pointer{position: absolute; z-index: 30; top: 0; bottom: 0; left: 0; right: 0; margin: auto; width: 140px; height: 140px; border: 1px solid #e60; box-shadow: 0 0 2px 2px rgba(0,0,0,.1); border-radius: 50%;}
        .activity{position: relative; margin: 50px auto; padding: 0 25px 30px; width: 800px; overflow: hidden; border-bottom: 3px solid #e5e5e5; background: #fff; font: 12px/1.5 "microsoft yahei"; border-radius: 20px; box-shadow: 0 1px 6px 3px rgba(0,0,0,.1);}
        .wheel-pointer:before{position: absolute; top: -40px; left: 50%; display: block; width: 60px; height: 60px; border: 1px solid #e60; background: #fb0; content: ''; box-shadow: inset 1px 1px 0 rgba(255,255,255,.5); -moz-transform-origin: left top; -webkit-transform-origin: left top; -o-transform-origin: left top; -ms-transform-origin: left top; transform-origin: left top; -moz-transform: rotate(30deg) skewY(30deg); -webkit-transform: rotate(30deg) skewY(30deg); -o-transform: rotate(30deg) skewY(30deg); -ms-transform: rotate(30deg) skewY(30deg); transform: rotate(30deg) skewY(30deg);}
        .wheel-pointer:after{position: relative; display: block; width: 100%; height: 100%; background: #ffcc00; content: ''; border-radius: 50%; box-shadow: inset 1px 1px 0 rgba(255,255,255,.5); background: -moz-linear-gradient(-45deg, #ffcc00 0%, #ff8800 50%, #ffcc00 100%); background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#ffcc00), color-stop(50%,#ff8800), color-stop(100%,#ffcc00)); background: -webkit-linear-gradient(-45deg, #ffcc00 0%,#ff8800 50%,#ffcc00 100%); background: -o-linear-gradient(-45deg, #ffcc00 0%,#ff8800 50%,#ffcc00 100%); background: -ms-linear-gradient(-45deg, #ffcc00 0%,#ff8800 50%,#ffcc00 100%); background: linear-gradient(135deg, #ffcc00 0%,#ff8800 50%,#ffcc00 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffcc00', endColorstr='#ffcc00',GradientType=1 );}
        .wheel-pointer i{position: absolute; z-index: 35; top: -36px; left: 0; right: 0; margin: 0 auto; display: block; width: 60px; height: 60px; overflow: hidden;}
        .wheel-pointer i:before{display: block; width: 100%; height: 100%; content: ''; -moz-transform-origin: left top; -webkit-transform-origin: left top; -o-transform-origin: left top; -ms-transform-origin: left top; transform-origin: left top; -moz-transform: translateX(50%) rotate(30deg) skewY(30deg); -webkit-transform: translateX(50%) rotate(30deg) skewY(30deg); -o-transform: translateX(50%) rotate(30deg) skewY(30deg); -ms-transform: translateX(50%) rotate(30deg) skewY(30deg); transform: translateX(50%) rotate(30deg) skewY(30deg); background: rgb(255,178,0); background: -moz-linear-gradient(40deg, rgba(255,178,0,1) 0%, rgba(255,179,0,1) 45%, rgba(254,214,86,1) 46%, rgba(255,146,0,1) 90%); background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,rgba(255,178,0,1)), color-stop(45%,rgba(255,179,0,1)), color-stop(46%,rgba(254,214,86,1)), color-stop(90%,rgba(255,146,0,1))); background: -webkit-linear-gradient(40deg, rgba(255,178,0,1) 0%,rgba(255,179,0,1) 45%,rgba(254,214,86,1) 46%,rgba(255,146,0,1) 90%); background: -o-linear-gradient(40deg, rgba(255,178,0,1) 0%,rgba(255,179,0,1) 45%,rgba(254,214,86,1) 46%,rgba(255,146,0,1) 90%); background: -ms-linear-gradient(40deg, rgba(255,178,0,1) 0%,rgba(255,179,0,1) 45%,rgba(254,214,86,1) 46%,rgba(255,146,0,1) 90%); background: linear-gradient(50deg, rgba(255,178,0,1) 0%,rgba(255,179,0,1) 45%,rgba(254,214,86,1) 46%,rgba(255,146,0,1) 90%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffb200', endColorstr='#ff9200',GradientType=1 );}
        .wheel-btn{position: absolute; z-index: 40; top: 0; bottom: 0; left: 0; right: 0; margin: auto; padding: 10px; width: 100px; height: 100px;box-shadow: inset 0 1px 1px rgba(255,102,0,.4), inset 0 -1px 1px rgba(255,238,0,.4); background: -moz-linear-gradient(top, rgba(255,85,0,0.7) 0%, rgba(255,221,0,1) 100%); background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,85,0,0.7)), color-stop(100%,rgba(255,221,0,1))); background: -webkit-linear-gradient(top, rgba(255,85,0,0.7) 0%,rgba(255,221,0,1) 100%); background: -o-linear-gradient(top, rgba(255,85,0,0.7) 0%,rgba(255,221,0,1) 100%); background: -ms-linear-gradient(top, rgba(255,85,0,0.7) 0%,rgba(255,221,0,1) 100%); background: linear-gradient(to bottom, rgba(255,85,0,0.7) 0%,rgba(255,221,0,1) 100%); border-radius: 60px; }
        .wheel-btn strong{padding-top: 6px; display: block; color: #fff; font-size: 18px; text-shadow: 2px 0 0 #c30, -2px 0 0 #c30, 0 2px 0 #c30, 0 -2px 0 #c30, 1px 1px 0 #c30, -1px -1px 0 #c30, -1px 1px 0 #c30, -1px -1px 0 #c30, 0 2px 6px #a30;}
        .wheel-btn a{color: #ff0;position: relative; display: table-cell; vertical-align: middle; width: 100px; height: 100px; overflow: hidden; color: #ff0; font: 700 14px/25px 'microsoft yahei'; font-size: 16px; text-align: center; text-decoration: none; border-radius: 50%; box-shadow: -1px -1px 10px rgba(255,255,255,.5), 1px 1px 3px rgba(0,0,0,.4), inset -1px -2px 0 #a30; text-shadow: 1px 0 0 #c30, -1px 0 0 #c30, 0 1px 0 #c30, 0 -1px 0 #c30, 0 0 3px #fff; background: rgb(204,51,0); background: -moz-linear-gradient(top, rgba(204,51,0,1) 0%, rgba(255,221,0,1) 100%); background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(204,51,0,1)), color-stop(100%,rgba(255,221,0,1))); background: -webkit-linear-gradient(top, rgba(204,51,0,1) 0%,rgba(255,221,0,1) 100%); background: -o-linear-gradient(top, rgba(204,51,0,1) 0%,rgba(255,221,0,1) 100%); background: -ms-linear-gradient(top, rgba(204,51,0,1) 0%,rgba(255,221,0,1) 100%); background: linear-gradient(to bottom, rgba(204,51,0,1) 0%,rgba(255,221,0,1) 100%);}
        .wheel-btn a:after{position: absolute; bottom: 7px; right: 5px; display: block; width: 90px; height: 90px; content: ''; border-radius: 50%; opacity: .8; background: -moz-linear-gradient(135deg, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 30%); background: -webkit-gradient(linear, right bottom, left top, color-stop(0%,rgba(255,255,255,1)), color-stop(30%,rgba(255,255,255,0))); background: -webkit-linear-gradient(135deg, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 30%); background: -o-linear-gradient(135deg, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 30%); background: -ms-linear-gradient(135deg, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 30%); background: linear-gradient(-45deg, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 30%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ccffffff', endColorstr='#00ffffff',GradientType=1 );}

    </style></head>
    
    <body>

    <div class="wheel">
			
			<ul id="wheel" class="wheel-list">
				<li style="transform: rotate(0deg);">
					<i style="transform: rotate(30deg) skewY(30deg);"></i>
					<div class="prize">
						<h3>今天</h3>
						<p> </p>
					</div>
				</li>
				<li style="transform: rotate(60deg);">

                    <i style="transform: rotate(30deg) skewY(30deg);"></i>
                    <div class="prize">
						<h3>依然</h3>
						<p>...</p>
					</div>
				</li>
				<li style="transform: rotate(120deg);">

                    <i style="transform: rotate(30deg) skewY(30deg);"></i>
                    <div class="prize">
						<h3>不知道</h3>
						<p></p>
					</div>
				</li>
				<li style="transform: rotate(180deg);">
					<i style="transform: rotate(30deg) skewY(30deg);"></i>
					<div class="prize">
						<h3>午餐</h3>
						<p></p>
					</div>
				</li>
				<li style="transform: rotate(240deg);">
                    <i style="transform: rotate(30deg) skewY(30deg);"></i>
					<div class="prize">
						<h3>要rr吃</h3>
						<p>  </p>
					</div>
				</li>
				<li style="transform: rotate(300deg);">
                    <i style="transform: rotate(30deg) skewY(30deg);"></i>
					<div class="prize">
						<h3>什麼?</h3>
						<p> </p>
					</div>
				</li>
			</ul>
			<div id="pointer" class="wheel-pointer"><i></i></div>
			<div class="wheel-btn">
			
				
				
				<a id="button" href="Turntable.js::">
				
					<strong>午餐轉轉樂!</strong>
				</a>
			</div>
		</div>

    
<script src="Turntable.js" charset="UTF-8"></script>

</body></html>
			
			<?php
					
			}

		else if($mod=='f_re')
	        	{
				$do_what	= get('do_what');
					
						//-------------------------------------------------------------------------------------------------------------	//
					//	店家列表(預設)																								//
					//-------------------------------------------------------------------------------------------------------------	//
					
					$get_page	= get('page');
					
					$f_name		= post('f_name');								
					$f_phon		= post('f_phon');								
					$status		= post('status') ? post('status') : 'y';	//狀態
					$status		= get('status') ? get('status'):$status;
					$search		= get('search');
					
					if($search)
					{
						$array	= explode(",",$search);
						$f_name	= $array[0];
						$f_phon	= $array[1];
						$status	= $array[2];
					}
					$search=array($f_name,$f_phon,$status);
					
					f_member('',$search,$get_page);	//=>$list_mem,$count_mem
					?>
					
					<!-- Search -->
					<div class="row" style="margin-top: 15px;">						
						<form action="f_index.php" method="POST">
	                        <div class="col-md-4">
	                            <div class="form-group">
	                            	<input type="text" class="form-control" name="f_name" placeholder="店家名稱" value="<?=$f_name;?>"/>
	                            </div>
	                        </div>
	                        <div class="col-md-4">
	                            <div class="form-group">
	                            	<input type="text" class="form-control" name="f_phon" placeholder="店家電話" value="<?=$f_phon;?>"/>
	                            </div>
	                        </div>
	                       

	                           <div class="widget search">
	                           		<div class="input-group">
										<div class="form-group">
		                                  
		                                </div>
	                                    <span class="input-group-btn">
	                                        <button class="btn btn-default" type="submit">
	                                       		<i class="fa fa-search"></i>
	                                        </button>
	                                    </span>
	                                </div>
	                			</div>
	                        </div>
	                    </form>
	                </div>
	                
	                <!-- Default -->
					<div class="row">
						<div style="float: right;padding: 15px;">
		        			<button class="btn btn-primary tf-btn" onclick="javascript:location.href='f_index.php?mod=f_add'">+ 新增店家</button>
		        		</div>
						
						
	                    <div class="col-md-12">
	                        <table>
	                    		<thead>
	                    			<tr>
	                    				<th>序號</th>
	                    				<th>店家名稱</th>
	                    				<th>公休</th>
	                    				<th>外送方式</th>
										<th>菜單</th>
										<th>電話</th>
	                    				<th>種類</th>
	                    				<th align="center">管理</th>
	                    			</tr>
	                    		</thead>
	                    		<tbody>
	                    		<?php
	                    		foreach($list_mem as $row)
	                    		{
	                    			
	                        		?>
	                    			<tr>
	                    				<td><?=$row['f_id'];?></td>
	                    				<td><?=$row['f_name'];?></td>
	                    				<td><?=$row['f_offday'];?><br/></td>
	                    				<td><?=$row['f_delivery'];?><br/></td>
	                    				<!-- 圖片撤事 --><td>
								
										<?php 
										echo "<p><a href='".$row['f_menu']."'><img src='".$row['f_menu']."' /></a></p>";
										 echo "<a href='f_index.php?mod=f_upload&sn=".$row['f_id']."'>上傳</a>|";?>
										<br/></td>
										<!-- 圖片撤事 -->
										
	                    				<td><?=$row['f_phon'];?><br/></td>
										<td><?=$row['f_kind'];?><br/></td>
	                    				<td align="center">
	                    					<?php
												echo "<a href='f_index.php?mod=f_edit&sn=".$row['f_id']."'>修改</a>|";
												echo "<span class='go' link='f_edit.php?wk=f_del&sn=".$row['f_id']."' ct='del' bk='f_index.php?mod=f_re''>刪除</span>";											
											
	                    					?>
	                    				</td>
	                    			</tr>
	                        		<?php
	                    		}
	                    		?>
	                    		</tbody>
	                    	</table>
	                    	<!--<?=$pagination;?> !-->
	                    </div>
	                </div>
					<button type="button" class="btn btn-block btn-lg btn-success" onclick="javascript:location.href='f_index.php'">回到首頁</button>
							<?php
					
				}
	
	else if($mod=='f_add')
	        	{ 
	        		//-------------------------------------------------------------------------------------------------------------	//
					//	店家新增																										//
					//-------------------------------------------------------------------------------------------------------------	//
					?>
					<form id="myform" class="form" name="f_add" action="f_edit.php" ct="add" method="post">
	                  
					  
	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <input type="text" autocomplete="off" class="form-control" name='f_id' placeholder="序號*" required>
	                                <p class="help-block text-danger"></p>
	                            </div>
	                        </div>
							
							<div class="col-md-12">
	                            <div class="form-group">
	                                <input type="text" autocomplete="off" class="form-control" name='f_name' placeholder="店名*" required>
	                                <p class="help-block text-danger"></p>
	                            </div>
	                        </div>
							
							<div class="col-md-12">
	                            <div class="form-group">
	                                <input type="text" autocomplete="off" class="form-control" name='f_offday' placeholder="公休*" required>
	                                <p class="help-block text-danger"></p>
	                            </div>
	                        </div>
							
							<div class="col-md-12">
	                            <div class="form-group">
	                                <input type="text" autocomplete="off" class="form-control" name='f_delivery' placeholder="外送方式*" required>
	                                <p class="help-block text-danger"></p>
	                            </div>
	                        </div>
							
							<div class="col-md-12">
	                            <div class="form-group">
	                                <input type="text" autocomplete="off" class="form-control" name='f_menu' placeholder="菜單*" required>
	                                <p class="help-block text-danger"></p>
	                            </div>
	                        </div>
							
								<div class="col-md-12">
	                            <div class="form-group">
	                                <input type="text" autocomplete="off" class="form-control" name='f_kind' placeholder="種類*" required>
	                                <p class="help-block text-danger"></p>
	                            </div>
	                        </div>
							
								<div class="col-md-12">
	                            <div class="form-group">
	                                <input type="text" autocomplete="off" class="form-control" name='f_phon' placeholder="電話*" required>
	                                <p class="help-block text-danger"></p>
	                            </div>
	                        </div>
							
	                    </div>
	                    
	                    <button type="button" class="btn btn-danger" onclick="history.go(-1);">返回</button>
	                    <button type="submit" id="submit" class="btn btn-primary">確定新增</button>
	                </form>
					<?php
				}
				elseif($mod=='f_edit')
	        	{
	        //-------------------------------------------------------------------------------------------------------------	//
			//	店家修改																									//
			//-------------------------------------------------------------------------------------------------------------	//
					$sn=get('sn');
					f_member($sn,'','');	//$mid,$mno,$mnm,$mail,$tel,$fax,$vat,$addr,$mail,$reg,$avbl;
					?>
					<form id="myform" class="form" name="f_edit" action="f_edit.php" ct="edit" method="post">
	                 
	                      
	                            <div class="form-group">
	                                <input type="text" autocomplete="off" class="form-control" name='f_name' value="<?=$f_name;?>" placeholder="店名*" required>
	                                <p class="help-block text-danger"></p>
	                            </div>
								
	                      <div class="form-group">
	                                <input type="text" autocomplete="off" class="form-control" name='f_offday' value="<?=$f_offday;?>" placeholder="公休*" required>
	                                <p class="help-block text-danger"></p>
	                            </div>
							
						 <div class="form-group">
	                                <input type="text" autocomplete="off" class="form-control" name='f_delivery' value="<?=$f_delivery;?>" placeholder="外送方式*" required>
	                                <p class="help-block text-danger"></p>
	                            </div>
								
								
						<div class="form-group">
	                                <input type="text" autocomplete="off" class="form-control" name='f_menu' value="<?=$f_menu;?>" placeholder="菜單*" required>
	                                <p class="help-block text-danger"></p>
	                            </div>

								
	                    <input type="hidden" name="f_id" value="<?=$sn;?>" />
	                    <button type="button" class="btn btn-danger" onclick="history.go(-1);">返回</button>
	                    <button type="submit" id="submit" class="btn btn-primary">確定更新</button>
	                </form>
					<?php
				}
				
 //<!-- 圖片撤事 -->
				elseif($mod=='f_upload')
	        	{
					$sn= get("sn"); 
					echo $sn ;
					?>
									<!DOCTYPE html>
					<html>
					<body>

					<form id="test" class="form" name="upload" action="f_edit.php"  method="post" enctype="multipart/form-data">
						Select image to upload:
						<input type="file" name="files[]" multiple />
						<input type="hidden" name="wk" value="upload_img" />
						<input type="hidden" name="sn" value="<?=$sn;?>"/>
						<input type="submit" value="Upload Image" name="submit">
						<input type="hidden" value="upload" name="wk">
						
						
					</form>

					</body>
					</body>
					</html>
<?php
				}
	
	
	
		else  
	     {
            
					?>
			<!--//-------------------------------------------------------------------------------------------------------------	//
			//	(預設)		登入與註冊 選擇頁面																						//
			//-------------------------------------------------------------------------------------------------------------	// -->
					
					<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="jumbotron">
				<h1>
					歡迎使用<br>吃喝轉轉樂<br>
				</h1>
				
				<h2>
				以下用戶<br><?=session('member');?>登入中
				</h2>
				
				
			</div> 
			<button type="button" class="btn btn-block btn-lg btn-primary" onclick="javascript:location.href='f_index.php?mod=f_Turntable'">午餐轉阿轉</button>
			<button type="button" class="btn btn-block btn-lg btn-primary" onclick="javascript:location.href='f_index.php?mod=f_Turntable'">飲料轉阿轉</button>
			<button type="button" class="btn btn-warning btn-lg btn-block active" onclick="javascript:location.href='f_index.php?mod=f_re'">編輯菜單</button>
</div>
	</div>
</div>
<p>

			
</div>
						<?php
				}
?>


<!-- Page JS  Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.scrollex.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/util.js"></script>
		<script src="js/main.js"></script>
	<!-- Page JS (Customer) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="js/check.js"></script>
		<script src="js/form.js"></script>
	</body>