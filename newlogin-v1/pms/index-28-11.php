<?php
function convert_min_hour($min){
	$hours = floor($min / 60);
	return $hours;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title><?php echo $titleText; ?></title> 
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="css/style1.css" rel="stylesheet" type="text/css" />
		<!--<script src="https://code.jquery.com/jquery-1.10.2.js" type="text/css"></script>-->
		<script src="jquery/jquery.min.js" ></script>
<script >
$(document).ready(function () {
	//               $('.nav li.active').removeClass('active').find('a').trigger('click');
	//$('.nav li.active').removeClass('active');
	$("#login2").hide();
	$("#l1").click(function () {
		$('.nav li#l2').removeClass('active');
		$('.nav li#l1').addClass('active');
		$("#login2").css("display", "none");
		$("#login1").fadeIn(1000);
	});
	$("#l2").click(function () {
		$('.nav li.active').removeClass('active');
		$('.nav li#l2').addClass('active');
		$("#login1").css("display", "none");
		$("#login2").fadeIn(1000);
	});
	window.onload = function () {
		document.getElementById("inputEmail").focus();
	};
	$(".user-name").keyup(function (e) {
		if (e.keyCode != 8 && e.keyCode != 46) {
			var x = $(".user-name").val();
			if (x.length == 4) {
				x = x + "-";
			} else if (x.length == 9) {
				x = x + "-";
			} else if (x.length == 14) {
				x = x + "-";
			} else if (x.length >= 20) {
				x = x.slice(0, -1);
			}
			$(".user-name").val(x);
		}
	});


	$("#paid_radio").change(function(){
		$("#billing_plan_field").css('display', 'block');
	});

	$("#comp_radio").change(function(){
		$("#billing_plan_field").css('display', 'none');
	});


	var chkbox = <?php echo $location->right_box_status; ?>;
	if (chkbox == 1)
	{
		$('#rightsidebar').show();
	} else {
		$('#rightsidebar').hide();
	}


});
</script>
<script>
$(document).ready(function () {
	$('.table tbody tr').click(function(event) {
		if (event.target.type !== 'radio') {
			$(':radio', this).trigger('click');
		}
	});   
});
</script>
<script type="text/javascript">
function radioValidation(){
	var tnc = document.getElementsByName('billing_plan_id');
	var tncValue = false;

	for(var i=0; i<tnc.length;i++){
		if(tnc[i].checked == true){
			tncValue = true; 
		}
	}
	<?php if($isPosting){?>
		if(!tncValue){
		document.getElementsByClassName("error-msg")[0].innerHTML = "Please select billing plan!!";
		return false;
		}
	<?php } ?>
}
</script>

	<style>
.font{
	color:<?php echo $_SESSION['font_color']; ?>;
}
	    .color{
		    background-color: <?php echo $_SESSION['bg_color']; ?>;

	    }
	    label{
		    color:white;
	    }
	    #billingplan{
		    width : 200px; 
	    height: 30px;  
	    outline: none; 
	    color: #787878; 
	    font-weight: normal;  
	    font-size:14px;
	    }
	    .secondlogo{
		    margin-top:3%;
	    }
	    .thirdlogo{
		    margin-top:5px;
	    }
	    .nav-tabs > li.active > a,
	    .nav-tabs > li.active > a:hover,
	    .nav-tabs > li.active > a:focus{
		    color: white;
		    background-color: #17375e;
	    }

	    @media only screen and (max-width: 768px) {
		    /* For mobile phones: */
		    .firstlogo{
			    /*width: 100%;*/
			    /*float: left;
			      margin: 0px;*/
			    display:none;
		    }
		    .secondlogo{
			    /*width:100%;*/
			    display:none;
		    }
		    .thirdlogo{
			    /*width:100%;*/
			    /*float: right;
			     *               margin: 0px;
			     *               width: 140px;*/
			    //max-width:190px;
		    float:none;
		    display: block;
		    height: auto;
		    max-width: 100%;
		    margin: 0 auto;
		    }
	    }

	    /* CSS for plan selction table Start*/
	    .table-responsive tbody tr {
		    cursor: pointer;
	    }
	    .table-responsive .table thead tr th {
		    padding-top: 10px;
		    padding-bottom: 5px;
		    color:white;
	    }
	    .table-responsive .table tbody tr td {
		    padding-top: 4px;
		    padding-bottom: 4px;
		    /* color:white;*/
	    }

	    /* END*/
	</style>
<?php
$billingplans = $mydb->getBillingPlans($locationId, $cat = "special");
//        var_dump($billingplans);
//        $chk = $cms->bgimg_check;
//        if ($chk == 1) {
?>
	  <!--<body style="background-image: url('<?php //echo "images/bg/" . $servername . ".png"          ?>');" >-->
	  <body>
		  <?php //} ?> 
		  <div class="" >
			  <!--header start-->
			  <div class="row">
				  <div class="col-sm-12 col-xs-12">
					  <!--<div class="header bg-white" id="header">-->  
					  <div class="headstyle">
						  <div class="row">
							  <!--div class="col-sm-3 firstlogo"><img src="./img/logo1.png" id="hotellogo" class="img-rounded" alt="Hotel Image" style=" ">
		 </div>
		 <div class="col-sm-6 secondlogo">
		 <h4>Welcome to Sterling Holidays</h4>
		 </div-->
		 <!--div class="col-sm-3 thirdlogo" style="float:right">
	   <img src="./img/logo2.png" id="hotellogo" class="img-rounded" alt="Hotel Image" style="">
	   </div-->

	   <!--changes start -->
	   <div class="col-sm-3 firstlogo"></div>
	   <div class="col-sm-6 secondlogo">
	   <center><h4><?php echo $headerText; ?></h4></center>
	   </div>
	   <div class="col-sm-3" >
	   <img src="<?php echo './img/'.$leftLogo; ?>" id="hotellogo" class="img-rounded img-responsive thirdlogo" alt="Hotel Image" style="">
	   </div>
		   <!--changes end-->
					  </div>
				  </div>
				  <!--</div>-->
		  </div>
		  </div>
		  </div>
		  <div class="container" >
			  <!--sidebar and content-->
			  <div class="row" style="background-image: url('<?php echo './img/'.$backgroundImg; ?>');">
				  <!--left sidebar-->
				  <div class="hidden-xs   col-sm-2 " >
					  <div class="left-sidebar bg-white">
						  <div class="row">
							  <div class="col-sm-12">
								  <div class="ad-block"></div>
							  </div>
						  </div>
					  </div>
				  </div>                
				  <div class="col-sm-8 col-xs-12" style = "float:right;">
					  <div class="row" style = "float:right;">
						  <div class="col-sm-12 col-xs-12 ">
							  <div class="main-content bg-white color" style="  ">
								  <div class="row">
									  <div class="col-sm-12 col-xs-12">
										  <!-- <div id="loghead">    #d9edf7                                         
		    </div>-->
		    <div class="ad-block" style=" " >
			    <ul class="nav nav-tabs"  >
				    <li id="l1" class="active"  >
				    <a  href="#"><?php echo $firstTabText; ?></a></li>
				    <li id="l2"  >
				    <a href="#"><?php echo $secondTabText; ?></a></li>
			    </ul>
			    <div class="inner-main" style="height: 1px; background-color: #ddd; margin-right:6px; "> 
			    </div>
			    <div class="tab-content" style=" padding-right:20px;   ">  
				    <div class="row">
					    <div  id="login1"  class="tab-pane fade in active">
						    <form name="roomlogin" id="roomlogin" action="roomLogin.php"  method="post" class="form-inline" > 
							    <input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
							    <input type="hidden" name="popup" value="true" />
							    <input type="hidden" name="mac" value="<?php echo $mac; ?>"/>
							    <input type="hidden" name="ip" value="<?php echo $ip; ?>"/>
							    <input type="hidden" name="username" value="<?php echo $username; ?>"/>
							    <input type="hidden" name="link-login" value="<?php echo $linklogin ?>"/>
							    <input type="hidden" name="link-orig" value="<?php echo $linkorig; ?>"/>
							    <input type="hidden" name="error" value="<?php echo $error; ?>"/>
							    <input type="hidden" name="chap-id" value="<?php echo $chapid; ?>"/>
							    <input type="hidden" name="chap-challenge" value="<?php echo $chapchallenge; ?>"/>
							    <input type="hidden" name="link-login-only" value="<?php echo $linkloginonly; ?>"/>
							    <input type="hidden" name="link-orig-esc" value="<?php echo $linkorigesc; ?>"/>
							    <input type="hidden" name="mac-esc" value="<?php echo $macesc; ?>"/>
							    <input type="hidden" name="server-name" value="<?php echo $servername; ?>"/>
							    <input type="hidden" name="location-id" value="<?php echo $location->id; ?>"/>
							    <input type="hidden" name="dpo" value="<?php echo $location->devices_per_occupancy ?>"/>
							    <input type="hidden" name="pms" value="<?php echo $location->pms ?>"/>
							    <input type="hidden" name="host" value="<?php echo $location->router_address; ?>"/>
							    <input type="hidden" name="chargeable" value="yes"/>
							    <input type="hidden" name="checkincycle" value="<?php echo $location->checkincycle; ?>"/>
							    <!--<p class="font" style=" font-size: 15px; font-weight: bold; text-align: center;margin-top: 30px; "> welcome to Room login</p>-->
							    <?php// if(isset($_session["status"])) { ?>
							    <div class="form-group">          
								    <?php echo $_session["status"]; ?>
								    <p class="logoDiv"><font style="color: red; margin-top: 30px;" class = "error-msg"><?php echo $error; ?></font></p>
								    <!--<p class="logoDiv">WiFi HotSpot Log-In</p>-->
							    </div>
							    <?php //} ?>
							    <div class="form-group"> 
								    <input type="text" name="username" class="form-control" id="inputEmail" autocomplete="off" placeholder="<?php echo $roomNoText; ?>" style="width : 200px; color:<?php //echo $loginCms['0']['CmsLoginpage']['font_color']; ?> " required></input>
								    <!--/div>
		    <div class=" col-sm-6 col-md-4 col-lg-2" >
		    <p style="height: 0px;"></p>  
		    </div>
		    <div class="form-group"-->
		    <input type="text" name="password" class="form-control" id="inputPassword" autocomplete="off" placeholder="<?php echo $lastNameText; ?>" style="width : 200px;" required></input>
		    </div>
		<?php
		//echo "ispin: $ispin";
		if ($ispin == 1) {
		?>
			<div class="form-group">
				<input type="text" name="pin"  placeholder="Security PIN" id="inputPin" autocomplete="off" class="form-control" style="width : 200px; " required />
<!--				<input type="hidden" name="pinStat" value="<?php echo $ispin ?>" class="text-fild"  autocomplete="off"/>-->
			</div>
		<?php }
 ?>
		<input type="hidden" name="pinStat" value="<?php echo $ispin ?>" class="text-fild"  autocomplete="off"/>
		<!--div class="form-group">
			<input id="comp_radio" type="radio" name="chargeable" value="no" checked="checked" required>&nbsp;&nbsp;Complimentary  </input>
			<input id="paid_radio" type="radio" name="chargeable" value="yes" required>&nbsp;&nbsp;Paid</input>
		</div-->
		<?php if($isPosting){?>
		<div class="table-responsive" id="billing_plan_field" style="margin-left:5%; font-size:12px;font-weight: bold;font-family: sans-serif;" >
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Select Plan </th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach ($billingplans as $value) { ?>
					<tr>
						<td ><input type="radio" name="billing_plan_id" value="<?php echo $value->id ?>" id="radio1" /></td>
						<td><?php echo ($value->name_bp == 'free') ?  '1 Hrs. Free- 1 device/room' :  convert_min_hour($value->time_bp)." Hrs. (Rs.".$value->price_bp." + TAX)" ?></td>
					</tr>
				 <?php } ?>
				</tbody>
			</table>
		</div>
		<?php }else{ 
			foreach ($billingplans as $value) {
				if($value->name_bp == 'free'){
		?>
					<input type = "hidden" name = "billing_plan_id" value = "<?php echo $value->id ?>" >
		<?php 
				}
			}
		} ?>
		<div class="form-group">
			<table class="table table-condensed">
			<tr><label class="font" id="chkbox"><input type="checkbox" checked required/>  <?php echo  $tncText; ?> </label></tr>
				<tr> <input type="submit" class="btn btn-primary" id="login-btn" name="submit" value="Login" style="margin:0px;" onclick="return radioValidation();" ></input>
				</tr>
				<tr>
					<tr></tr>
					<tr style= "margin-top:5px;">
					<label class= "font" id = "chbox" style= "font-size:10px;margin-top:10px;"><?php echo $footerHelpText; ?></label> 
				</tr>
			</table>
		</div>
	</form>
</div>
</div>
<div class="row" id="login2" class="tab-pane fade">
	<form name="guestlogin" id="guestlogin" action="<?php echo $linkloginonly; ?>" method="post" class="form-inline" >
		<?php if(isset($_session["status"])) { ?>
			<div class="form-group">          
			<?php echo $_session["status"]; ?>
				<p class="logoDiv"><font style="color: red; margin-top: 30px;"><?php echo $error; ?></font></p>
			<!--<p class="logoDiv">WiFi HotSpot Log-In</p>-->
			</div>
		<?php } ?>
		<!--<p style=" color:beige; font-size: 15px; font-weight: bold; text-align: center;margin-top: 30px;"> welcome to guest login</p>-->
		<div class="form-group">
		<input type="text" name="username"  class="form-control user-name" id="inputEmail1"  placeholder="<?php echo $couponNoText; ?>" style="width : 200px;" autocomplete="off" required></input>
		</div>
		<div class=" col-sm-6 col-md-4 col-lg-2" >
			<p style="height: 0px;"></p>  
		</div>
		<div class="form-group">
		<input type="password" name="password" class="form-control" id="inputPassword1" placeholder="<?php echo $passwordText; ?>" style="width : 200px;" autocomplete="off" required></input>
		</div>
		<div>
			<p style="height: 20px;"></p>  
		</div>
		<div class="form-group">
			<table class="table table-condensed">
			<tr><label class="font" id="chkbox"><input type="checkbox" checked required/> <?php echo $tncText; ?> </label></tr>
				<tr> <input type="submit" class="btn btn-primary" id="login-btn2" name="submit" value="Login" style="margin:0px;"></input>
				</tr>
				<tr>
				<tr></tr>
				<tr style= "margin-top:5px;">
				<label class= "font" id = "chbox" style= "font-size:10px;margin-top:10px;"><?php echo $footerHelpText; ?></label> 
				</tr>
			</table>
   		  </div>
	        </form>
	     </div>
	   </div>
         </div>
       </div>
     </div>
    </div>
   </div>
  </div>
</div>        
<!--right sidebar-->   
<div class=" col-sm-2 col-xs-12"  >
	<div class=" right-sidebar bg-white font color" id="rightsidebar" >
		<div class="ad-block  ">
		</div>
	</div>
</div> 
</div>
		  <!--bottom three block-->
				  <!--div class="row" id="bottom">
	      <div class="hidden-xs hidden-sm  col-sm-4 col-xs-6">
	      <div class="bottom-left-block bg-white"></div>
	      </div>
	      <div class="hidden-xs  col-sm-4 col-xs-6">
	      <div class="bottom-middle-block bg-white"></div>
	      </div>
	      <div class="hidden-xs  col-sm-4 col-xs-12">
	      <div class="bottom-right-block bg-white"></div>
	      </div>
	      </div-->
	      <!--footer start-->
	      <div class="footer  bg-white">
		      <div class="copyright" >
		      <p style = "margin-top:-10px;"><?php
		//echo $_SESSION['footer'];
		//echo "&nbsp";
		?><a href="http://www.wifonic.com" target="_blank" style="color: #8FD8D8;"><?php echo $footerText; ?><img src="<?php echo './img/'.$footerImg; ?>" style = "max-width:100px;"></a></p>
		      </div>
	      </div>
	  </div>
  </body>
</html>
