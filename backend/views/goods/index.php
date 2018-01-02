<?php
/* @var $this yii\web\View */
?>
<h1>商品列表</h1>

<div class="row">
    <div class="pull-left">
        <?=\yii\bootstrap\Html::a("添加",['goods/add'],['class'=>"btn btn-info"])?>
    </div>
</div>


<table class="table">
    <tr>
        <th>id</th>
        <th>名称</th>
        <th>货号</th>
        <th>logo</th>
        <th>分类</th>
        <th>品牌</th>
        <th>价格</th>
        <th>库存</th>
        <th>状态</th>
        <th>排序</th>
        <th>时间</th>
        <th>操作</th>
    </tr>

    <?php foreach ($models as $model): ?>

    <tr>
        <td><?=$model->id;?></td>
        <td><?=$model->name;?></td>
        <td><?=$model->sn;?></td>
        <td><?=\yii\bootstrap\Html::img("/".$model->logo,['height'=>50]);?></td>
        <td><?=$model->category_id;?></td>
        <td><?=$model->brand_id;?></td>
        <td><?=$model->market_price;?></td>
        <td><?=$model->shop_price;?></td>
        <td><?=$model->stock;?></td>
        <td><?=$model->status;?></td>
        <td><?=$model->sort;?></td>
        <td><?=$model->create_at?></td>
        <td>
            <?= \yii\bootstrap\Html::a("", ['goods-category/edit', 'id' => $model->id],['class'=>'btn btn-success glyphicon glyphicon-edit']) ?>

            <?= \yii\bootstrap\Html::a("", ['goods-category/del', 'id' => $model->id],['class'=>'btn btn-danger glyphicon glyphicon-remove']) ?>

        </td>
    </tr>
    <?php endforeach;?>
</table>

<?=\yii\widgets\LinkPager::widget(
   ['pagination' => $pages]
)?>