<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\sortinput\SortableInput;

/* @var $this yii\web\View */
/* @var $model app\models\Csrs */

$this->title = 'Update Csrs: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Csrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="csrs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <hr/>
    <h2>CSR Images</h2>
    <br/>
    <?php $form = ActiveForm::begin(['action' => ['csrimages/updateorder','csr_id' => $model->id]]); ?>

    <?php
        $items = [];
        foreach ($csrImages as $csrImage)
        {
            $items[$csrImage->id] = ["content" => '<div><img src="'.$csrImage->th_image.'" height="160" /><br/>
		    	                                     <a class="edit_image" data-id="'.$csrImage->id.'" href="'.Yii::$app->urlManager->createUrl(['csrimages/update', 'id' => $csrImage->id]).'">[Edit]</a> 
        	                                         <a class="delete_image" data-id="'.$csrImage->id.'" href="">[Delete]</a></div>'];
        }

        echo SortableInput::widget([
        	'name'=> 'image_sort_list',
    	    'items'=> $items,
        	'sortableOptions' => [
            'type'=>'grid',
        	],
        	'hideInput' => true,
    	]);
    ?>
    <?= Html::submitButton('Update Order', ['class'=>'btn btn-primary']); ?>

    <?php ActiveForm::end(); ?>

    <hr/>
    
    <?= Html::a('Create Image Object',['/csrimages/create', 'csr_id'=>$model->id],['class'=>'btn btn-primary']); ?>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(".delete_image").on("click", function(e) {
            var imageId = $(this).attr("data-id");

            if(window.confirm("Do you want to delete?")){
                $.post("./index.php?r=csrimages/delete&id=" + imageId);
                $(this).parent().parent().remove();
            }

            return false;   
        });
    });

</script>
