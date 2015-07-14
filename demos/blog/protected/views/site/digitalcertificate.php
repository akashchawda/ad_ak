<?php
$this->pageTitle=Yii::app()->name . ' - Digitalcertificate';
// 20140131 $this->breadcrumbs=array('Login',);
?>
<h1>Upload Digital Certificate</h1>

<p>Authentication of user by uploading digital certificate:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'digitalcertificate-form',
	'enableAjaxValidation'=>true,
)); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Upload digital certificate:'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo CHtml::submitButton('Browse'); ?>
	</div>
        <div class="row submit">
                <?php echo CHtml::submitButton('Submit'); ?>
        </div>
<?php $this->endWidget(); ?>
