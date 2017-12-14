<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php /** @var bool $modelCanSave */
if ($modelCanSave) { ?>
    <div class="alert alert-success">
        <p>Model ready to be saved!</p>
        These are values: <br/>
        Floor: <?=
        /** @var \app\models\Room $model */
        $model->floor; ?><br/>
        Room Number: <?= $model->roomNumber; ?> <br/>
        Has conditioner: <?= Yii::$app->formatter->asBoolean($model->hasConditioner); ?> <br/>
        Has TV: <?php echo Yii::$app->formatter->asBoolean($model->hasTV); ?> <br/>
        Has phone: <?php echo Yii::$app->formatter->asBoolean($model->hasPhone); ?> <br/>
        Available from (mm/dd/yyyy): <?php echo Yii::$app->formatter->asDate($model->availableFrom, 'php:m/d/Y'); ?>
        <br/>
        Price per day: <?php echo Yii::$app->formatter->asCurrency($model->pricePerDay, 'EUR'); ?> <br/>

        Image: <?php if (isset($model->fileImage)) { ?>
            <img src="<?= '/uploadedfiles/' . $model->fileImage->name; ?>"/>
        <?php } else {
            echo 'unset';
        } ?>

    </div>
<?php } ?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Room form</h1>
        <?= $form->field($model, 'floor')->textInput() ?>
        <?= $form->field($model, 'roomNumber')->textInput() ?>
        <?= $form->field($model, 'hasConditioner')->checkbox() ?>
        <?= $form->field($model, 'hasTV')->checkbox() ?>
        <?= $form->field($model, 'hasPhone')->checkbox() ?>
        <?= $form->field($model, 'availableFrom')->textInput() ?>
        <?= $form->field($model, 'pricePerDay')->textInput() ?>
        <?= $form->field($model, 'description')->textarea() ?>

        <?= $form->field($model, 'fileImage')->fileInput() ?>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton('Create', ['class' => 'btn btnsuccess'])
    ?>
</div>
<?php ActiveForm::end(); ?>
