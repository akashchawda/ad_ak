<?php
$this->pageTitle=Yii::app()->name . ' - CellNo Authentication';
// 20140131 $this->breadcrumbs=array('Login',);
?>
<h1>Mobile Number</h1>

<p>Enter Last Four Digit of Your Mobile Number</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cellnoauthentication-form',
	'enableAjaxValidation'=>true,
)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Enter last four digit of your cell Number:'); ?>
		<?php echo $form->textField($model,'cellno',array('value'=>'', 'placeholder'=>"cellno", 'autocomplete'=>"off")); ?>
		<?php echo $form->error($model,'cellno'); ?>
	</div>
        
	<div class="row submit">
		<?php echo CHtml::submitButton('Proceed'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->