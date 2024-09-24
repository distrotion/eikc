<?php

use yii\helpers\Html;
use kartik\sortinput\SortableInput;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Insurance Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insurance-images-index">

    <h2>Insurances Images</h2>
    <br/>
    <?php $form = ActiveForm::begin(['action' => ['insuranceimages/updateorder']]); ?>

    <?php
        $items = [];
        foreach ($insuranceImages as $insuranceImage)
        {
            $items[$insuranceImage->id] = ["content" => '<div><img src="'.$insuranceImage->th_image.'" height="160" /><br/>
                                                     <a class="edit_image" data-id="'.$insuranceImage->id.'" href="'.Yii::$app->urlManager->createUrl(['insuranceimages/update', 'id' => $insuranceImage->id]).'">[Edit]</a> 
                                                     <a class="delete_image" data-id="'.$insuranceImage->id.'" href="">[Delete]</a></div>'];
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
    
    <?= Html::a('Create Image Object',['/insuranceimages/create'],['class'=>'btn btn-primary']); ?>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(".delete_image").on("click", function(e) {
            var imageId = $(this).attr("data-id");

            if(window.confirm("Do you want to delete?")){
                $.post("./index.php?r=insuranceimages/delete&id=" + imageId);
                $(this).parent().parent().remove();
            }

            return false;   
        });
    });

</script>
