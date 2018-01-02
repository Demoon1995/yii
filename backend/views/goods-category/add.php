<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\goods-Category */
/* @var $form ActiveForm */
?>
    <div class="category-add">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'parent_id') ?>
        <?= \liyuze\ztree\ZTree::widget([
            'setting' => '{
			data: {
				simpleData: {
					enable: true,
					pIdKey: "parent_id"
				},
			},
				callback: {
				onClick: function(e,treeId,treeNode){
				//找到父类ID
				$("#goodscategory-parent_id").val(treeNode.id);  
				
				 console.dir(treeNode.id);
				}
			}
		
		}',
            'nodes' => $cates
        ]);
        ?>
        <?= $form->field($model, 'intro')->textarea() ?>

        <div class="form-group">
            <?= Html::submitButton('添加', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div><!-- category-add -->
<?php
//定义JS代码块
$js=<<<JS
    var treeObj = $.fn.zTree.getZTreeObj("w1");
    treeObj.expandAll(true);
    
    var node = treeObj.getNodeByParam("id", "{$model->parent_id}", null);//得到节点
    treeObj.selectNode(node);//选择节点
    console.log(node);
JS;
//把JS代码加载到JQuery之后
$this->registerJs($js);
?>