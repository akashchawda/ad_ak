<?php
$this->pageTitle=Yii::app()->name . ' - Email Authentication';
// 20140131 $this->breadcrumbs=array('Login',);
?>

<h1>Enter the user id before '@' sign</h1>

<p>Authentication checking by email id</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'emailauthentication-form',
	'enableAjaxValidation'=>true,
)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Enter your user id before @ sign:'); ?>
		<?php echo $form->textField($model,'emailID',array('value'=>'', 'placeholder'=>"emailID", 'autocomplete'=>"off")); ?>
		<?php echo $form->error($model,'emailID'); ?>
        
	</div>
        
	<div class="row submit">
		<?php echo CHtml::submitButton('Proceed'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<div> </div>