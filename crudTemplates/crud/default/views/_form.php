<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\coreviewmodels\Formfields;

/* Generated by easyapplication */
/* Author: Hikmat Ullah */


/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">

    <?= "<?php " ?>$form = ActiveForm::begin(); ?>
   

    <?= " <?php " ?>
    $fields = Formfields::find()->where(['model' => '<?=substr($generator->modelClass, strpos($generator->modelClass, "models\\") + 7)?>'])->all();
    foreach ($fields as $key => $field) {
        //if ($field->form_field_type != NULL) {
          //  $this->render("dynamicfield" , ['model' => $model, 'field' => $field,'form'=>$form]);
          //  
        //}
        echo $form->field($model, $field->fieldname)->textInput(['maxlength' => true]);
    }
    <?= " ?> " ?>

    <div class="form-group">
        <?= "<?= " ?>Html::submitButton($model->isNewRecord ? <?= $generator->generateString('Create') ?> : <?= $generator->generateString('Update') ?>, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
