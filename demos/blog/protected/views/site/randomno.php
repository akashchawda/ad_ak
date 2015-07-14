 <?php
$this->pageTitle=Yii::app()->name . ' - Random';
// 20140131 $this->breadcrumbs=array('Login',);
?>
<h1>Verification Code</h1>

<p>Enter Verification Code with in two minutes.</p>


    <form method="POST" action="/index.html">
     
           
	<div class="row">
		Password: <input type="password" name="httpd_password" value="" />
	
   <input type="hidden" name="httpd_username" value="<?php echo Yii::app()->user->name?>" />
   </div>
         <img src="timerMod.gif" height="42" width="80" >  
	<div class="row submit">
  <input type="submit" name="login" value="Login" />

</form>
        
		
</div><!-- form -->
<meta http-equiv="refresh" content="109; url=http://localhost/yii1/demos/blog/index.php?r=site/logout">
