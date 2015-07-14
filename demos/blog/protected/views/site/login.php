 <?php
$this->pageTitle=Yii::app()->name . ' - Login';
// 20140131 $this->breadcrumbs=array('Login',);
?>

<h1>Authentication Portal</h1>

<p>Please provide your user-id :</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
        //'action'=>Yii::app()->createUrl('controller/action'),
	'enableAjaxValidation'=>true,
)); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'httpd_username',array('value'=>'', 'placeholder'=>"Username")); ?>
		<?php echo $form->error($model,'httpd_username'); ?>
	</div>
        
	<div class="row submit">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
