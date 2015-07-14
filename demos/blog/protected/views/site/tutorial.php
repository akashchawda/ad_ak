<?php
$this->pageTitle=Yii::app()->name . ' - Tutorial';
$this->breadcrumbs=array('Tutorial',);
?>
<h1>Tutorial</h1>

<p>This is the Tutorial page for my blog site.</p>
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tutorial-form',
	'enableAjaxValidation'=>true,
)); ?>
    <p class="note">CController manages a set of actions which deal with the corresponding user requests.

Through the actions, CController coordinates the data flow between models and views.

When a user requests an action 'XYZ', CController will do one of the following: 1. Method-based action: call method 'actionXYZ' if it exists; 2. Class-based action: create an instance of class 'XYZ' if the class is found in the action class map (specified via actions(), and execute the action; 3. Call missingAction(), which by default will raise a 404 HTTP exception.

If the user does not specify an action, CController will run the action specified by defaultAction, instead.

CController may be configured to execute filters before and after running actions. Filters preprocess/postprocess the user request/response and may quit executing actions if needed. They are executed in the order they are specified. If during the execution, any of the filters returns true, the rest filters and the action will no longer get executed.

Filters can be individual objects, or methods defined in the controller class. They are specified by overriding filters() method. The following is an example of the filter specification.</p>
        
    <?php $this->endWidget(); ?>
</div>
