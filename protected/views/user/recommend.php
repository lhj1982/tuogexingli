<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recommend-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php 
	echo $form->hiddenField($model,'next',array('value'=>$next));
	echo $form->hiddenField($model,'from_user',array('value'=>$user['id']));
	echo $form->hiddenField($model,'status',array('value'=>UserRecommendation::PENDING));
	?>
	<div class="row">
		<?php echo $form->labelEx($model,'推荐好友Email'); ?>
		<?php echo $form->textField($model,'to_user'); ?>
		<?php echo $form->error($model,'to_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direct_rec'); ?>
		<?php echo $form->textField($model,'direct_rec'); ?>
		<?php echo $form->error($model,'direct_rec'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->