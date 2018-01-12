<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>京西商城</title>
	<link rel="stylesheet" href="/static/style/base.css" type="text/css">
	<link rel="stylesheet" href="/static/style/global.css" type="text/css">
	<link rel="stylesheet" href="/static/style/header.css" type="text/css">
	<link rel="stylesheet" href="/static/style/index.css" type="text/css">
	<link rel="stylesheet" href="/static/style/bottomnav.css" type="text/css">
	<link rel="stylesheet" href="/static/style/footer.css" type="text/css">

	<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/static/js/header.js"></script>
	<script type="text/javascript" src="/static/js/index.js"></script>
</head>
<body>
	<!-- 顶部导航 start -->
    <?php
    include_once Yii::getAlias("@app/views/common/nav.php");
    ?>
	<!-- 顶部导航 end -->
	
	<div style="clear:both;"></div>

	<!-- 头部 start -->
        <?php
        include_once Yii::getAlias("@app/views/common/header.php");
        ?>
	<!-- 头部 end-->
	
	<div style="clear:both;"></div>
	
	<!-- 综合区域 start 包括幻灯展示，商城快报 -->
	<div class="colligate w1210 bc mt10">
		<!-- 幻灯区域 start -->
		<div class="slide fl">
			<div class="area">
				<div class="slide_items">
					<ul>
						<li><a href="/static/"><img src="/static/images/index_slide1.jpg" alt="" /></a></li>
						<li><a href="/static/"><img src="/static/images/index_slide2.jpg" alt="" /></a></li>
						<li><a href="/static/"><img src="/static/images/index_slide3.jpg" alt="" /></a></li>
						<li><a href="/static/"><img src="/static/images/index_slide4.jpg" alt="" /></a></li>
						<li><a href="/static/"><img src="/static/images/index_slide5.jpg" alt="" /></a></li>
						<li><a href="/static/"><img src="/static/images/index_slide6.jpg" alt="" /></a></li>
					</ul>
				</div>
				<div class="slide_controls">
					<ul>
						<li class="on">1</li>
						<li>2</li>
						<li>3</li>
						<li>4</li>
						<li>5</li>
						<li>6</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- 幻灯区域 end-->
	
		<!-- 快报区域 start-->
		<div class="coll_right fl ml10">
			<div class="ad"><a href="/static/"><img src="/static/images/ad.jpg" alt="" /></a></div>
			
			<div class="news mt10">
				<h2><a href="/static/">更多快报&nbsp;></a><strong>网站快报</strong></h2>
				<ul>
					<li class="odd"><a href="/static/">电脑数码双11爆品抢不停</a></li>
					<li><a href="/static/">买茶叶送武夷山旅游大奖</a></li>
					<li class="odd"><a href="/static/">爆款手机最高直降1000</a></li>
					<li><a href="/static/">新鲜褚橙全面包邮开售！</a></li>
					<li class="odd"><a href="/static/">家具家装全场低至3折</a></li>
					<li><a href="/static/">买韩束，志玲邀您看电影</a></li> 
					<li class="odd"><a href="/static/">美的先行惠双11快抢悦</a></li>
					<li><a href="/static/">享生活 疯狂周期购！</a></li>
				</ul>

			</div>
			
			<div class="service mt10">
				<h2>
					<span class="title1 on"><a href="/static/">话费</a></span>
					<span><a href="/static/">旅行</a></span>
					<span><a href="/static/">彩票</a></span>
					<span class="title4"><a href="/static/">游戏</a></span>
				</h2>
				<div class="service_wrap">
					<!-- 话费 start -->
					<div class="fare">
						<form action="">

                            <input type="hidden" name="_csrf-frontend" value="<?=Yii::$app->request->csrfToken?>">

							<ul>
								<li>
									<label for="">手机号：</label>
									<input type="text" name="phone" value="请输入手机号" class="phone" />
									<p class="msg">支持移动、联通、电信</p>
								</li>
								<li>
									<label for="">面值：</label>
									<select name="" id="">
										<option value="">10元</option>
										<option value="">20元</option>
										<option value="">30元</option>
										<option value="">50元</option>
										<option value="" selected>100元</option> 
										<option value="">200元</option>
										<option value="">300元</option>
										<option value="">400元</option>
										<option value="">500元</option>
									</select>
									<strong>98.60-99.60</strong>
								</li>
								<li>
									<label for="">&nbsp;</label>
									<input type="submit" value="点击充值" class="fare_btn" /> <span><a href="/static/">北京青春怒放独家套票</a></span>
								</li>
							</ul>
						</form>
					</div>
					<!-- 话费 start -->
	
					<!-- 旅行 start -->
					<div class="travel none">
						<ul>
							<li>
								<a href="/static/"><img src="/static/images/holiday.jpg" alt="" /></a>
								<a href="/static/" class="button">度假查询</a>
							</li>
							<li>
								<a href="/static/"><img src="/static/images/scenic.jpg" alt="" /></a>
								<a href="/static/" class="button">景点查询</a>
							</li>
						</ul>
					</div>
					<!-- 旅行 end -->
						
					<!-- 彩票 start -->
					<div class="lottery none">
						<p><img src="/static/images/lottery.jpg" alt="" /></p>
					</div>
					<!-- 彩票 end -->

					<!-- 游戏 start -->
					<div class="game none">
						<ul>
							<li><a href="/static/"><img src="/static/images/sanguo.jpg" alt="" /></a></li>
							<li><a href="/static/"><img src="/static/images/taohua.jpg" alt="" /></a></li>
							<li><a href="/static/"><img src="/static/images/wulin.jpg" alt="" /></a></li>
						</ul>
					</div>
					<!-- 游戏 end -->
				</div>
			</div>

		</div>
		<!-- 快报区域 end-->
	</div>
	<!-- -综合区域 end -->
	
	<div style="clear:both;"></div>

	<!-- 导购区域 start -->
	<div class="guide w1210 bc mt15">
		<!-- 导购左边区域 start -->
		<div class="guide_content fl">
			<h2>
				<span class="on">新品上架</span>
				<span>热卖商品</span>
				<span>精品推荐</span>
			</h2>
			
			<div class="guide_wrap">
				<!-- 疯狂抢购 start-->
				<div class="crazy">
					<ul>
						<li>
							<dl>
								<dt><a href="/static/"><img src="/static/images/crazy1.jpg" alt="" /></a></dt>
								<dd><a href="/static/">惠普G4-1332TX 14英寸</a></dd>
								<dd><span>售价：</span><strong> ￥2999.00</strong></dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt><a href="/static/"><img src="/static/images/crazy2.jpg" alt="" /></a></dt>
								<dd><a href="/static/">直降100元！TCL118升冰箱</a></dd>
								<dd><span>售价：</span><strong> ￥800.00</strong></dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt><a href="/static/"><img src="/static/images/crazy3.jpg" alt="" /></a></dt>
								<dd><a href="/static/">康佳液晶37寸电视机</a></dd>
								<dd><span>售价：</span><strong> ￥2799.00</strong></dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt><a href="/static/"><img src="/static/images/crazy4.jpg" alt="" /></a></dt>
								<dd><a href="/static/">梨子平板电脑7.9寸</a></dd>
								<dd><span>售价：</span><strong> ￥1999.00</strong></dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt><a href="/static/"><img src="/static/images/crazy5.jpg" alt="" /></a></dt>
								<dd><a href="/static/">好声音耳机</a></dd>
								<dd><span>售价：</span><strong> ￥199.00</strong></dd>
							</dl>
						</li>
					</ul>	
				</div>
				<!-- 疯狂抢购 end-->

				<!-- 热卖商品 start -->
				<div class="hot none">
					<ul>
						<li>
							<dl>
								<dt><a href="/static/"><img src="/static/images/hot1.jpg" alt="" /></a></dt>
								<dd><a href="/static/">索尼双核五英寸四核手机！</a></dd>
								<dd><span>售价：</span><strong> ￥1386.00</strong></dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt><a href="/static/"><img src="/static/images/hot2.jpg" alt="" /></a></dt>
								<dd><a href="/static/">华为通话平板仅需969元！</a></dd>
								<dd><span>售价：</span><strong> ￥969.00</strong></dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt><a href="/static/"><img src="/static/images/hot3.jpg" alt="" /></a></dt>
								<dd><a href="/static/">卡姿兰明星单品7件彩妆套装</a></dd>
								<dd><span>售价：</span><strong> ￥169.00</strong></dd>
							</dl>
						</li>
					</ul>
				</div>
				<!-- 热卖商品 end -->

				<!-- 推荐商品 atart -->
				<div class="recommend none">
					<ul>
						<li>
							<dl>
								<dt><a href="/static/"><img src="/static/images/recommend1.jpg" alt="" /></a></dt>
								<dd><a href="/static/">黄飞红麻辣花生整箱特惠装</a></dd>
								<dd><span>售价：</span><strong> ￥139.00</strong></dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt><a href="/static/"><img src="/static/images/recommend2.jpg" alt="" /></a></dt>
								<dd><a href="/static/">戴尔IN1940MW 19英寸LE</a></dd>
								<dd><span>售价：</span><strong> ￥679.00</strong></dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt><a href="/static/"><img src="/static/images/recommend3.jpg" alt="" /></a></dt>
								<dd><a href="/static/">罗辑思维音频车载CD</a></dd>
								<dd><span>售价：</span><strong> ￥24.80</strong></dd>
							</dl>
						</li>
					</ul>
				</div>
				<!-- 推荐商品 end -->

			</div>

		</div>
		<!-- 导购左边区域 end -->
		
		<!-- 侧栏 网站首发 start-->
		<div class="sidebar fl ml10">
			<h2><strong>网站首发</strong></h2>
			<div class="sidebar_wrap">
				<dl class="first">
					<dt class="fl"><a href="/static/"><img src="/static/images/viewsonic.jpg" alt="" /></a></dt>
					<dd><strong><a href="/static/">ViewSonic优派N710 </a></strong> <em>首发</em></dd>
					<dd>苹果iphone 5免费送！攀高作为全球智能语音血压计领导品牌，新推出的黑金刚高端智能电子血压计，改变传统测量方式让血压测量迈入一体化时代。</dd>
				</dl>

				<dl>
					<dt class="fr"><a href="/static/"><img src="/static/images/samsung.jpg" alt="" /></a></dt>
					<dd><strong><a href="/static/">Samsung三星Galaxy</a></strong> <em>首发</em></dd>
					<dd>电视百科全书，360°无死角操控，感受智能新体验！双核CPU+双核GPU+MEMC运动防抖，58寸大屏打造全新视听盛宴！</dd>
				</dl>
			</div>
			

		</div>
		<!-- 侧栏 网站首发 end -->
		
	</div>
	<!-- 导购区域 end -->
	
	<div style="clear:both;"></div>

	<!--1F 电脑办公 start -->
	<div class="floor1 floor w1210 bc mt10">
		<!-- 1F 左侧 start -->
		<div class="floor_left fl">
			<!-- 商品分类信息 start-->
			<div class="cate fl">
				<h2>电脑、办公</h2>
				<div class="cate_wrap">
					<ul>
						<li><a href="/static/"><b>.</b>外设产品</a></li>
						<li><a href="/static/"><b>.</b>鼠标</a></li>
						<li><a href="/static/"><b>.</b>笔记本</a></li>
						<li><a href="/static/"><b>.</b>超极本</a></li>
						<li><a href="/static/"><b>.</b>平板电脑</a></li>
						<li><a href="/static/"><b>.</b>主板</a></li>
						<li><a href="/static/"><b>.</b>显卡</a></li>
						<li><a href="/static/"><b>.</b>打印机</a></li>
						<li><a href="/static/"><b>.</b>一体机</a></li>
						<li><a href="/static/"><b>.</b>投影机</a></li>
						<li><a href="/static/"><b>.</b>路由器</a></li>
						<li><a href="/static/"><b>.</b>网卡</a></li>
						<li><a href="/static/"><b>.</b>交换机</a></li>
					</ul>
					<p><a href="/static/"><img src="/static/images/notebook.jpg" alt="" /></a></p>
				</div>
				

			</div>
			<!-- 商品分类信息 end-->

			<!-- 商品列表信息 start-->
			<div class="goodslist fl">
				<h2>
					<span class="on">推荐商品</span>
					<span>精品</span>
					<span>热卖</span>
				</h2>
				<div class="goodslist_wrap">
					<div>
						<ul>
							<li>
								<dl>
									<dt><a href="/static/"><img src="/static/images/hpG4.jpg" alt="" /></a></dt>
									<dd><a href="/static/">惠普G4-1332TX 14英寸笔</a></dd>
									<dd><span>售价：</span> <strong>￥2999.00</strong></dd>
								</dl>
							</li>

							<li>
								<dl>
									<dt><a href="/static/"><img src="/static/images/thinkpad e420.jpg" alt="" /></a></dt>
									<dd><a href="/static/">ThinkPad E42014英寸笔..</a></dd>
									<dd><span>售价：</span> <strong>￥4199.00</strong></dd>
								</dl>
							</li>

							<li>
								<dl>
									<dt><a href="/static/"><img src="/static/images/acer4739.jpg" alt="" /></a></dt>
									<dd><a href="/static/">宏碁AS4739-382G32Mnk</a></dd>
									<dd><span>售价：</span> <strong>￥2799.00</strong></dd>
								</dl>
							</li>

							<li>
								<dl>
									<dt><a href="/static/"><img src="/static/images/samsung6800.jpg" alt="" /></a></dt>
									<dd><a href="/static/">三星Galaxy Tab P6800.</a></dd>
									<dd><span>售价：</span> <strong>￥4699.00</strong></dd>
								</dl>
							</li>

							<li>
								<dl>
									<dt><a href="/static/"><img src="/static/images/lh531.jpg" alt="" /></a></dt>
									<dd><a href="/static/">富士通LH531 14.1英寸笔记</a></dd>
									<dd><span>售价：</span> <strong>￥2189.00</strong></dd>
								</dl>
							</li>

							<li>
								<dl>
									<dt><a href="/static/"><img src="/static/images/qinghuax2.jpg" alt="" /></a></dt>
									<dd><a href="/static/">清华同方精锐X2笔记本 </a></dd>
									<dd><span>售价：</span> <strong>￥2499.00</strong></dd>
								</dl>
							</li>
						</ul>
					</div>
					
					<div class="none">
						<ul>
							<li>
								<dl>
									<dt><a href="/static/"><img src="/static/images/hpG4.jpg" alt="" /></a></dt>
									<dd><a href="/static/">惠普G4-1332TX 14英寸笔</a></dd>
									<dd><span>售价：</span> <strong>￥2999.00</strong></dd>
								</dl>
							</li>

							<li>
								<dl>
									<dt><a href="/static/"><img src="/static/images/qinghuax2.jpg" alt="" /></a></dt>
									<dd><a href="/static/">清华同方精锐X2笔记本 </a></dd>
									<dd><span>售价：</span> <strong>￥2499.00</strong></dd>
								</dl>
							</li>
							
						</ul>
					</div>

					<div class="none">
						<ul>
							<li>
								<dl>
									<dt><a href="/static/"><img src="/static/images/thinkpad e420.jpg" alt="" /></a></dt>
									<dd><a href="/static/">ThinkPad E42014英寸笔..</a></dd>
									<dd><span>售价：</span> <strong>￥4199.00</strong></dd>
								</dl>
							</li>

							<li>
								<dl>
									<dt><a href="/static/"><img src="/static/images/acer4739.jpg" alt="" /></a></dt>
									<dd><a href="/static/">宏碁AS4739-382G32Mnk</a></dd>
									<dd><span>售价：</span> <strong>￥2799.00</strong></dd>
								</dl>
							</li>
						</ul>
					</div>

				</div>
			</div>
			<!-- 商品列表信息 end-->
		</div>
		<!-- 1F 左侧 end -->
		
		<!-- 右侧 start -->
		<div class="sidebar fl ml10">
			<!-- 品牌旗舰店 start -->
			<div class="brand">
				<h2><a href="/static/">更多品牌&nbsp;></a><strong>品牌旗舰店</strong></h2>
				<div class="sidebar_wrap">
					<ul>
						<li><a href="/static/"><img src="/static/images/dell.gif" alt="" /></a></li>
						<li><a href="/static/"><img src="/static/images/acer.gif" alt="" /></a></li>
						<li><a href="/static/"><img src="/static/images/fujitsu.jpg" alt="" /></a></li>
						<li><a href="/static/"><img src="/static/images/hp.jpg" alt="" /></a></li>
						<li><a href="/static/"><img src="/static/images/lenove.jpg" alt="" /></a></li>
						<li><a href="/static/"><img src="/static/images/samsung.gif" alt="" /></a></li>
						<li><a href="/static/"><img src="/static/images/dlink.gif" alt="" /></a></li>
						<li><a href="/static/"><img src="/static/images/seagate.jpg" alt="" /></a></li>
						<li><a href="/static/"><img src="/static/images/intel.jpg" alt="" /></a></li>
					</ul>
				</div>
			</div>
			<!-- 品牌旗舰店 end -->
			
			<!-- 分类资讯 start -->
			<div class="info mt10">
				<h2><strong>分类资讯</strong></h2>
				<div class="sidebar_wrap">
					<ul>
						<li><a href="/static/"><b>.</b>iphone 5s土豪金大量到货</a></li>
						<li><a href="/static/"><b>.</b>三星note 3低价促销</a></li>
						<li><a href="/static/"><b>.</b>thinkpad x240即将上市</a></li>
						<li><a href="/static/"><b>.</b>双十一来临，众商家血拼</a></li>
					</ul>
				</div>
				
			</div>
			<!-- 分类资讯 end -->
			
			<!-- 广告 start -->
			<div class="ads mt10">
				<a href="/static/"><img src="/static/images/canon.jpg" alt="" /></a>
			</div>
			<!-- 广告 end -->
		</div>
		<!-- 右侧 end -->

	</div>
	<!--1F 电脑办公 start -->

	
	<div style="clear:both;"></div>

	<!-- 底部导航 start -->
	<div class="bottomnav w1210 bc mt10">
		<div class="bnav1">
			<h3><b></b> <em>购物指南</em></h3>
			<ul>
				<li><a href="/static/">购物流程</a></li>
				<li><a href="/static/">会员介绍</a></li>
				<li><a href="/static/">团购/机票/充值/点卡</a></li>
				<li><a href="/static/">常见问题</a></li>
				<li><a href="/static/">大家电</a></li>
				<li><a href="/static/">联系客服</a></li>
			</ul>
		</div>
		
		<div class="bnav2">
			<h3><b></b> <em>配送方式</em></h3>
			<ul>
				<li><a href="/static/">上门自提</a></li>
				<li><a href="/static/">快速运输</a></li>
				<li><a href="/static/">特快专递（EMS）</a></li>
				<li><a href="/static/">如何送礼</a></li>
				<li><a href="/static/">海外购物</a></li>
			</ul>
		</div>

		
		<div class="bnav3">
			<h3><b></b> <em>支付方式</em></h3>
			<ul>
				<li><a href="/static/">货到付款</a></li>
				<li><a href="/static/">在线支付</a></li>
				<li><a href="/static/">分期付款</a></li>
				<li><a href="/static/">邮局汇款</a></li>
				<li><a href="/static/">公司转账</a></li>
			</ul>
		</div>

		<div class="bnav4">
			<h3><b></b> <em>售后服务</em></h3>
			<ul>
				<li><a href="/static/">退换货政策</a></li>
				<li><a href="/static/">退换货流程</a></li>
				<li><a href="/static/">价格保护</a></li>
				<li><a href="/static/">退款说明</a></li>
				<li><a href="/static/">返修/退换货</a></li>
				<li><a href="/static/">退款申请</a></li>
			</ul>
		</div>

		<div class="bnav5">
			<h3><b></b> <em>特色服务</em></h3>
			<ul>
				<li><a href="/static/">夺宝岛</a></li>
				<li><a href="/static/">DIY装机</a></li>
				<li><a href="/static/">延保服务</a></li>
				<li><a href="/static/">家电下乡</a></li>
				<li><a href="/static/">京东礼品卡</a></li>
				<li><a href="/static/">能效补贴</a></li>
			</ul>
		</div>
	</div>
	<!-- 底部导航 end -->

	<div style="clear:both;"></div>
	<!-- 底部版权 start -->
	<div class="footer w1210 bc mt10">
		<p class="links">
			<a href="/static/">关于我们</a> |
			<a href="/static/">联系我们</a> |
			<a href="/static/">人才招聘</a> |
			<a href="/static/">商家入驻</a> |
			<a href="/static/">千寻网</a> |
			<a href="/static/">奢侈品网</a> |
			<a href="/static/">广告服务</a> |
			<a href="/static/">移动终端</a> |
			<a href="/static/">友情链接</a> |
			<a href="/static/">销售联盟</a> |
			<a href="/static/">京西论坛</a>
		</p>
		<p class="copyright">
			 © 2005-2013 京东网上商城 版权所有，并保留所有权利。  ICP备案证书号:京ICP证070359号 
		</p>
		<p class="auth">
			<a href="/static/"><img src="/static/images/xin.png" alt="" /></a>
			<a href="/static/"><img src="/static/images/kexin.jpg" alt="" /></a>
			<a href="/static/"><img src="/static/images/police.jpg" alt="" /></a>
			<a href="/static/"><img src="/static/images/beian.gif" alt="" /></a>
		</p>
	</div>
	<!-- 底部版权 end -->

</body>
</html>