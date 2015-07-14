<?php
$this->pageTitle=Yii::app()->name . ' - Authenticationtype';
// 20140131 $this->breadcrumbs=array('Login',);
?>
<h1>Choose Authentication Type</h1>

<p>Authentication of user by sending verification code on Email/Mobile or by Smart Card :</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'authentication-form',
	'enableAjaxValidation'=>true,
 )); ?>
  
           
           <?php echo $form->radioButtonList($model, 'authenticity', array('emailRadio'=>'Send verification code on secondary Email Id','smsRadio'=>'Send verification code on mobile via SMS','dcRadio'=>'Upload digital certificate'));?>
    <?php echo $form->error($model,'authenticity'); ?>
         </div>
    <script language="javascript">
         authenticityChange('<?php echo $model->authenticity;?>');
    </script>
    
        
	<div class="row submit">
           <?php echo CHtml::submitButton('Proceed'); ?>
        </div>
<?php $this->endWidget(); ?>
