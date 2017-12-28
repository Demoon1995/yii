<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">
        电商项目---京西商城</h1>
    <br>
</p>

# 1.项目介绍
## 1.1.项目简介
 在当今世纪中电商是常用到的，虽然纯电商的创业已经不太容易，但是各个公司都有变现的需要，所以在自身应用中嵌入电商功能是非常普遍的做法。
 
  这个项目类似于京东商城的B2C商城(C2C B2B O2O P2P ERP进销存 CRM客户关系管理)。
  
  为了让大家掌握企业开发的特点，以及解决问题的能力，我们开发一个电商项目，项目会涉及非常有代表性的功能。
  为了让大家掌握公司协同开发的要点，我们使用git管理代码。
  
  在项目中我们利用YII框架，和维护等，还有其他的插件，为了让这个项目更加的完美。
  
## 1.2.项目的主要功能模块
项目主要包括后台和前台
     后台：
     品牌管理、商品分类管理、商品管理、订单管理、系统管理和会员管理六个功能模块。
     前台：首页、商品展示、商品购买、订单管理、在线支付等。
## 1.3.开发环境和技术
-  开发环境    Window
-  开发工具 Phpstorm+PHP5.6+GIT+Apache
-  相关技术   Yii2.0+jQuery+CDN
## 1.4.项目人员组成周期成本 

 人数   |   周期    | 备注
------ |----- |-----
  1 | 两周需求及设计  | 组长
  1  | 两周           |UI设计人员/开发人员
  1（1测试1后端1前端）|  3个月（第一周需求设计，9周时间完成编码，2周时间测试和修复） |     开发人员

# 2.系统功能模块

## 2.1.需求

[√] 品牌管理：增删改查

[√] 文章管理：增删改查

[√] 商品分类管理：增删改查 

[] 商品管理：

[] 账号管理：

[] 权限管理：

[] 菜单管理：

[]订单管理：

## 2.2.流程
- 自动登录流程
- 购物车流程
- 订单流程

## 2.3.设计要点（数据库和页面交互）

1. 系统前后台设计：前台www.yiishop.com   后台admin.yiishop.com 对url地址美化
1. 商品无限级分类设计：
1. 购物车设计

## 2.4.要点难点及解决方案

难点在于需要掌握实际工作中，如何分析思考业务功能，如何在已有知识积累的前提下搜索并解决实际问题，抓大放小，融会贯通，尤其要排除畏难情绪。

# 3.品牌功能模块
## 3.1.需求

- 品牌管理功能涉及品牌的列表展示、品牌添加、修改、删除功能。
- 品牌需要保存缩略图和简介。
- 品牌删除使用逻辑删除。

## 3.2.流程
1.建立数据表，添加测试的数据；
    
2.自动生成model,在model里写规则；
    
3.生成控制器和视图。

4.在控制器中开始编写CURD代码.

5.在视图中编写页面显示的数据
    

## 3.3.设计要点（数据库和页面交互）
 ``` 
createTable('brand', [

'id' => $this->primaryKey(),

'name'=>$this->string(50)->notNull()->comment('名称'),

'logo'=>$this->string(100)->notNull()->comment('logo'),

 'intro'=>$this->text()->comment('简介'),
            
'status'=>$this->smallInteger()->comment('状态'),

'sort'=>$this->smallInteger()->notNull()->defaultValue(100)->comment('排序'),
        ]);

```
 

## 3.4.要点难点及解决方案

1. 删除使用逻辑删除,只改变status属性,不删除记录
1. 使用uploadify插件,提升用户体验
1. 使用composer下载和安装uploadify
1. composer安装插件报错,解决办法: composer global require "fxp/composer-asset-plugin:^1.2.0"

1. 注册七牛云账号 安装yii2 七牛云插件
1. 将品牌logo上传到七牛云


# 4.文章管理模块

## 4.1.需求

- 文章的增删改查
- 文章分类的增删改查

## 4.2.流程
1.建立数据表，添加测试的数据；
    
2.自动生成model,在model里写规则；
    
3.生成控制器和视图。

4.在控制器中开始编写CURD代码.

5.在视图中编写页面显示的数据

## 4.3.设计要点

文章模型和文章详情模型建立1对1关系

## 4.4.3设计要点（数据库和页面交互）


```
createTable('article', [
'id' => $this->primaryKey(),
'title'=>$this->string(100)->notNull()->comment("标题"),
'create_time'=>$this->integer()->notNull()->comment("创建时间"),
'status'=>$this->smallInteger()->notNull()->defaultValue(1)->comment("状态:0 隐藏  1 显示"),
'sort'=>$this->integer()->notNull()->defaultValue(100)->comment("排序"),
'intro'=>$this->string()->comment("简介"),
'cate_id'=>$this->integer()->notNull()->comment("分类Id"),
```

## 4.4.要点难点及解决方案

文章分类不能重复,通过添加验证规则unique解决

文章垂直分表,创建表单使用文章模型和文章详情模型

# 5.商品分类
## 5.1需求
- 商品分类的增删除改查
- 无限级分类
- 列表展示页需要折叠

## 5.2设计要点

利用ztree展示分类 

利用nested实现左值右值

## 5.3.要点难点及解决方案

1. ztree插件 进入页面就要展开
1. 点击分类后Js控制value
1. nested 不能用detelte去删除root节点,要用内置的deleteWithChildren()去删除
1. 使用MenuQuery时需要重新建一个类
1. 健壮性的的时候不能放到自己的子孙节点,这个需要异常捕获
1. JS字符串比较 lft>clft 改成lft-clft>0





