<?php
/* @var $this yii\web\View */
?>

<div class="table-responsive">
<h1>商品分类列表</h1>
<a href="<?= \yii\helpers\Url::to(['goods-category/add']) ?>" class="btn btn-info "><span class="glyphicon glyphicon-plus"></span></a>
<a href="<?= \yii\helpers\Url::to(['goods-category/trash']) ?>" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span></a>
<table class="table">
    <tr>
        <th>id</th>
        <th>名称</th>
        <th>简介</th>
        <th>操作</th>
    </tr>
    
    <?php foreach ($cates as $cate): ?>

        <tr class="cate_tr" data-tree="<?=$cate->tree ?>" data-lft="<?=$cate->lft ?>" data-rgt="<?=$cate->rgt?>">
            <td><?=$cate->id?></td>
            <td><span class="glyphicon glyphicon-chevron-down"></span><?=$cate->nameText?></td>
            <td><?=$cate->intro?></td>
            <td>
                <?= \yii\bootstrap\Html::a("", ['goods-category/edit', 'id' => $cate->id],['class'=>'btn btn-success glyphicon glyphicon-edit']) ?>

                <?= \yii\bootstrap\Html::a("", ['goods-category/del', 'id' => $cate->id],['class'=>'btn btn-danger glyphicon glyphicon-remove']) ?>

            </td>
        </tr>

    <?php endforeach; ?>
</table>


<?php
//定义JS
$js=<<<JS
    $(".cate_tr").click(function() {
        
        var tr=$(this);
        //隐藏图标
             tr.find("span").toggleClass("glyphicon glyphicon-chevron-down")
            tr.find("span").toggleClass("glyphicon glyphicon-chevron-up")
            //选中的lft
            var lft_parent=tr.attr('data-lft');
             //选中的右值
            var rgt_parent=tr.attr('data-rgt');
            var tree_parent=tr.attr('data-tree');
            
            console.log(lft_parent,rgt_parent,tree_parent);
            // 当前类的左值 右值 树
            $(".cate_tr").each(function(k,v){
            
            var lft=$(v).attr('data-lft');
            var rgt=$(v).attr('data-rgt');
            var tree=$(v).attr('data-tree');
            // console.log($(v).attr('data-lft'))
            //循环判断
            if(tree==tree_parent && lft-lft_parent>0 && rgt-rgt_parent<0){
            
            //判断父类是不是展开状态
             if (tr.find('span').hasClass('glyphicon glyphicon-chevron-up')){
                  $(v).find('span').removeClass('glyphicon glyphicon-chevron-down')
                $(v).find('span').addClass('glyphicon glyphicon-chevron-up')
                 $(v).hide();
                 
             }else {
                 //是闭合状态
                  $(v).find('span').removeClass('glyphicon glyphicon-chevron-up')
                $(v).find('span').addClass('glyphicon glyphicon-chevron-down')
            $(v).show();
                         }
                     }
                })
            // console.dir(this);
            });

JS;
            //注意JS
            $this->registerJs($js);


?>
</div>


