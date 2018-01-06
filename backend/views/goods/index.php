<?php
/* @var $this yii\web\View */
?>
<h1>商品列表</h1>
 <div class="table-responsive">
    <div class="row">
        <div class="pull-left">
            <?=\yii\bootstrap\Html::a("添加",['add'],['class'=>"btn btn-info"])?>
        </div>
        <div class="pull-right">
            <form class="form-inline">
                <select class="form-control" name="status">
                    <option>选择状态</option>
                    <option value="1" <?=Yii::$app->request->get('status')==="1"?"selected":""?>>上架</option>
                    <option value="0" <?=Yii::$app->request->get('status')==="0"?"selected":""?>>下架</option>
                </select>
                <div class="form-group">
                    <input type="text" size="3" class="form-control" name='minPrice' placeholder="最低价" value="<?=Yii::$app->request->get('minPrice')?>">
                </div>
                -
                <div class="form-group">
                    <input type="text" size="3" class="form-control" name="maxPrice" placeholder="最高价" value="<?=Yii::$app->request->get('maxPrice')?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="keyword" placeholder="请输入名称或货号" value="<?=Yii::$app->request->get('keyword')?>">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
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
        <td><?=$model->goodsCategory->name;?></td>
        <td><?=$model->brand->name;?></td>
        <td><?=$model->market_price;?></td>
        <td><?=$model->stock;?></td>
        <td><?php if ($model->status == 0) {
                echo '<span class="glyphicon glyphicon-download alert-info" >';
            } else echo '<span class="glyphicon glyphicon-upload alert-info text-center " >'; ?></td>

        <td><?=$model->sort;?></td>
        <td><?=$model->createTimeText?></td>
        <td>
            <?= \yii\bootstrap\Html::a("", ['goods/edit', 'id' => $model->id],['class'=>'btn btn-success glyphicon glyphicon-edit']) ?>

            <?= \yii\bootstrap\Html::a("", ['goods/del', 'id' => $model->id],['class'=>'btn btn-danger glyphicon glyphicon-remove']) ?>

        </td>
    </tr>
    <?php endforeach;?>
</table>

<?=\yii\widgets\LinkPager::widget(
   ['pagination' => $pages]
)?>
 </div>
