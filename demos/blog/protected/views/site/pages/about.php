<?php
$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array('About',);
?>
<h1>About</h1>

<p>This is the "about" page for my blog site.</p>
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'about-form',
	'enableAjaxValidation'=>true,
)); ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
        <div class="row">
		<?php echo $form->labelEx($model,'contactName'); ?>
		<?php echo $form->textField($model,'contactName'); ?>
		<?php echo $form->error($model,'contactName'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'secEmail'); ?>
            <?php echo $form->textField($model,'secEmail'); ?>
            <?php echo $form->error($model,'secEmail'); ?>
        </div>
        <div class="row submit">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>
    <?php $this->endWidget(); ?>
</div>