<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>时光餐厅商家后台管理</title>

	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome必须的css -->
	<link rel="stylesheet" href="/public/ace/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/public/font-awesome/css/font-awesome.min.css" />

	<!-- 此页插件css -->

	<!-- ace的css -->
	<link rel="stylesheet" href="/public/ace/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	<!-- IE版本小于9的ace的css -->
	<!--[if lte IE 9]>
	<link rel="stylesheet" href="/public/ace/css/ace-part2.min.css" class="ace-main-stylesheet" />
	<![endif]-->

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="/public/ace/css/ace-ie.css" />
	<![endif]-->

	<link rel="stylesheet" href="/public/yfcmf/yfcmf.css" />
	<!-- 此页相关css -->

	<!-- ace设置处理的css -->

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
	<script src="/public/others/html5shiv.min.js"></script>
	<script src="/public/others/respond.min.js"></script>
	<![endif]-->
    <!-- 引入基本的js -->
    <script type="text/javascript">
        var admin_ueditor_handle = "<?php echo U('Admin/Sys/upload');?>";
        var admin_ueditor_lang ='zh-cn';
    </script>
    <!--[if !IE]> -->
    <script src="/public/others/jquery.min-2.2.1.js"></script>
    <!-- <![endif]-->
    <!-- 如果为IE,则引入jq1.12.1 -->
    <!--[if IE]>
    <script src="/public/others/jquery.min-1.12.1.js"></script>
    <![endif]-->

    <!-- 如果为触屏,则引入jquery.mobile -->
    <script type="text/javascript">
        if('ontouchstart' in document.documentElement) document.write("<script src='/public/others/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="/public/others/bootstrap.min.js"></script>
</head>

<body class="no-skin">
<!-- 导航栏开始 -->
<div id="navbar" class="navbar navbar-default navbar-fixed-top">
	<div class="navbar-container" id="navbar-container">
		<!-- 导航左侧按钮手机样式开始 -->
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button><!-- 导航左侧按钮手机样式结束 -->
		<button data-target="#sidebar2" data-toggle="collapse" type="button" class="pull-left navbar-toggle collapsed">
			<span class="sr-only">Toggle sidebar</span>
			<i class="ace-icon fa fa-dashboard white bigger-125"></i>
		</button>
		<!-- 导航左侧正常样式开始 -->
		<div class="navbar-header pull-left">
			<!-- logo -->
			<a href="#" class="navbar-brand">
				<small>
					<i class="fa fa-leaf"></i>
					时光餐厅
				</small>
			</a>
		</div><!-- 导航左侧正常样式结束 -->

		<!-- 导航栏开始 -->
		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="purple">
					<a data-info="确定要清理缓存吗？" class="confirm-rst-btn" href="<?php echo U('Admin/Sys/clear');?>">
						清除缓存
					</a>
				</li>

				<!-- 用户菜单开始 -->
				<li class="light-blue dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="/public/img/girl.jpg" alt="<?php echo ($_SESSION['ma_account']); ?>" />
                        <span class="user-info">
                            <small>欢迎</small>
                            <p><?php echo ($_SESSION['ma_account']); ?></p>
                        </span>
						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="<?php echo U('Shop/Sys/profile');?>">
								<i class="ace-icon fa fa-user"></i>
								商家中心
							</a>
						</li>

						<li>
							<a href="<?php echo U('Shop/Login/logout');?>"  data-info="你确定要退出吗？" class="confirm-btn">
								<i class="ace-icon fa fa-power-off"></i>
								注销
							</a>
						</li>
					</ul>
				</li><!-- 用户菜单结束 -->
			</ul>
		</div><!-- 导航栏结束 -->
	</div><!-- 导航栏容器结束 -->
</div><!-- 导航栏结束 -->

<!-- 整个页面内容开始 -->
<div class="main-container" id="main-container">
	<!-- 菜单栏开始 -->
	<style type="text/css">
    @media only screen and (min-width: 992px) {
        .h-navbar.navbar-fixed-top + .main-container .sidebar:not(.h-sidebar):before {
            top: 0px;
        }
    }
</style>
<div id="sidebar" class="sidebar responsive sidebar-fixed">
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <!--左侧顶端按钮-->
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <a class="btn btn-danger" href="#" role="button" title=""><i class="ace-icon fa fa-cogs"></i></a>
            <a class="btn btn-success" href="#" role="button" title=""><i class="ace-icon fa fa-signal"></i></a>
            <a class="btn btn-warning" href="#" role="button" title=""><i class="ace-icon fa fa-users"></i></a>
            <a class="btn btn-info" href="#" role="button" title=""><i class="ace-icon fa fa-pencil"></i></a>
        </div>
        <!--左侧顶端按钮（手机）-->
        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <a class="btn btn-success" href="<?php echo U('Shop/Sys/profile');?>" role="button" title="商家中心"></a>
            <a class="btn btn-info" href="<?php echo U('Shop/Order/orderList');?>" role="button" title="订单管理"></a>
            <a class="btn btn-warning" href="<?php echo U('Shop/Technician/technician');?>" role="button" title="技师管理"></a>
            <a class="btn btn-danger" href="<?php echo U('Shop/ShopProject/projectList');?>" role="button" title="项目管理"></a>
        </div>
    </div>
	<!-- 菜单列表开始 -->
	<!-- 一级菜单 -->
	<ul class="nav nav-list">
        <!--<li <?php if($controllername == "user" ): ?>class="open"<?php endif; ?>>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">权限管理</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                &lt;!&ndash;二级菜单遍历开始&ndash;&gt;
                <li <?php if($actionname == "userList"): ?>class="active open"<?php endif; ?>>
                    <a href="<?php echo U('Shop/User/userList');?>" >
                        <i class="menu-icon fa fa-caret-right"></i>
                        用户管理
                    </a>
                    <b class="arrow"></b>
                </li>&lt;!&ndash;二级菜单遍历结束&ndash;&gt;
            </ul>
            <ul class="submenu">
                &lt;!&ndash;二级菜单遍历开始&ndash;&gt;
                <li <?php if($actionname == "xianzhi"): ?>class="active open"<?php endif; ?>>
                    <a href="<?php echo U('Shop/User/xianzhi');?>" >
                        <i class="menu-icon fa fa-caret-right"></i>
                        限制时间管理
                    </a>
                    <b class="arrow"></b>
                </li>&lt;!&ndash;二级菜单遍历结束&ndash;&gt;
            </ul>
        </li>-->

        <li <?php if($controllername == "home" ): ?>class="open"<?php endif; ?>>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-building"></i>
                <span class="menu-text">首页管理</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "home"): ?>class="active open"<?php endif; ?>>
                    <a href="<?php echo U('Shop/Home/banner');?>" >
                        <i class="menu-icon fa fa-caret-right"></i>
                        轮播图管理
                    </a>
                    <b class="arrow"></b>
                </li><!--二级菜单遍历结束-->
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "home"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Home/saturated');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>
                    餐厅饱和度
                </a>
                <b class="arrow"></b>
                </li><!--二级菜单遍历结束-->
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "home"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Home/distribution');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>
                    配送费设置
                </a>
                <b class="arrow"></b>
                </li><!--二级菜单遍历结束-->
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "home"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Home/timeout');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>
                    超时期限
                </a>
                <b class="arrow"></b>
                </li><!--二级菜单遍历结束-->
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "home"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Home/discount');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>
                    折扣设置
                </a>
                <b class="arrow"></b>
                </li><!--二级菜单遍历结束-->
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "home"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Home/help');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>
                    帮助中心
                </a>
                <b class="arrow"></b>
                </li><!--二级菜单遍历结束-->
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "home"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Home/addressList');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>
                    地址菜单管理
                </a>
                <b class="arrow"></b>
                </li><!--二级菜单遍历结束-->
            </ul>
        </li>
        <li <?php if($controllername == "foodtype" ): ?>class="open"<?php endif; ?>>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-database"></i>
                <span class="menu-text">菜品管理</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <!--二级菜单遍历开始-->
                    <li <?php if($actionname == "typeList"): ?>class="active open"<?php endif; ?>>
                        <a href="<?php echo U('Shop/Foodtype/typeList');?>" >
                            <i class="menu-icon fa fa-caret-right"></i>
                            分类列表
                        </a>
                        <b class="arrow"></b>
                    </li>
                <!--二级菜单遍历结束-->
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "foodList"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Foodtype/foodList');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>
                    菜品列表
                </a>
                <b class="arrow"></b>
                </li>
                <!--二级菜单遍历结束-->
            </ul>
        </li>
        <li <?php if($controllername == "comment" ): ?>class="open"<?php endif; ?>>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-commenting"></i>
                <span class="menu-text">评论管理</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "commentList"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Comment/commentList');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>
                    评论列表
                </a>
                <b class="arrow"></b>
                </li>
                <!--二级菜单遍历结束-->
            </ul>
        </li>

        <li <?php if($controllername == "stall" ): ?>class="open"<?php endif; ?>>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-newspaper-o"></i>
                <span class="menu-text">档口管理</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "stalllist"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Stall/stallList');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>
                    档口列表
                </a>
                <b class="arrow"></b>
                </li><!--二级菜单遍历结束-->
            </ul>
        </li>
        <li <?php if($controllername == "settlement" ): ?>class="open"<?php endif; ?>>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-line-chart"></i>
                <span class="menu-text">财务审计管理</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "settlementlist"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Settlement/settlementList');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>商户结算
                </a>
                <b class="arrow"></b>
                </li><!--二级菜单遍历结束-->
            </ul>
        </li>
        <li <?php if($controllername == "member" ): ?>class="open"<?php endif; ?>>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">用户管理</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "memberlist"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Member/memberList');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>用户列表
                </a>
                <b class="arrow"></b>
                </li><!--二级菜单遍历结束-->
            </ul>
        </li>
        <li <?php if($controllername == "marki" ): ?>class="open"<?php endif; ?>>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-truck"></i>
                <span class="menu-text">配送员管理</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "applylist"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Marki/applyList');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>认证申请
                </a>
                <b class="arrow"></b>
                </li><!--二级菜单遍历结束-->
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "markilist"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Marki/markiList');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>人员管理
                </a>
                <b class="arrow"></b>
                </li><!--二级菜单遍历结束-->
            </ul>
        </li>
        <li <?php if($controllername == "feedback" ): ?>class="open"<?php endif; ?>>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-tags"></i>
                <span class="menu-text">意见管理</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "feedbacklist"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Feedback/feedbackList');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>反馈列表
                </a>
                <b class="arrow"></b>
                </li><!--二级菜单遍历结束-->
            </ul>
        </li>
        <li <?php if($controllername == "order" ): ?>class="open"<?php endif; ?>>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-stack-overflow"></i>
                <span class="menu-text">订单管理</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "ordinarylist"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Order/ordinaryList');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>普通菜品订单列表
                </a>
                <b class="arrow"></b>
                </li><!--二级菜单遍历结束-->
                <!--二级菜单遍历开始-->
                <li <?php if($actionname == "packagelist"): ?>class="active open"<?php endif; ?>>
                <a href="<?php echo U('Shop/Order/packageList');?>" >
                    <i class="menu-icon fa fa-caret-right"></i>周餐订单列表
                </a>
                <b class="arrow"></b>
                </li><!--二级菜单遍历结束-->
            </ul>
        </li>
    </ul>
</div>
	<!-- 菜单栏结束 -->

	<!-- 主要内容开始 -->
	<div class="main-content">
		<div class="main-content-inner">
			<!-- 右侧主要内容页顶部标题栏开始 -->
			<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse sidebar-fixed menu-min" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
	<div class="nav-wrap-up pos-rel">
		<div class="nav-wrap">
            <ul class="nav nav-list">
                <?php if($controllername == "home"): ?><li>
                        <a href="<?php echo U('Shop/home/banner');?>">
                            <o class="font12 <?php if($actionname == "banner" or $actionname == "banneradd" or $actionname == "banneredit"): ?>rigbg<?php endif; ?>">轮播图管理</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li>
                        <a href="<?php echo U('Shop/home/saturated');?>">
                            <o class="font12 <?php if($actionname == "saturated"): ?>rigbg<?php endif; ?>">餐厅饱和度</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li>
                        <a href="<?php echo U('Shop/home/distribution');?>">
                            <o class="font12 <?php if($actionname == "distribution"): ?>rigbg<?php endif; ?>">配送费设置</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li>
                        <a href="<?php echo U('Shop/home/timeout');?>">
                            <o class="font12 <?php if($actionname == "timeout"): ?>rigbg<?php endif; ?>">超时期限</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li>
                        <a href="<?php echo U('Shop/home/discount');?>">
                            <o class="font12 <?php if($actionname == "discount" or $actionname == "discountadd" or $actionname == "discountedit"): ?>rigbg<?php endif; ?>">折扣设置</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li>
                        <a href="<?php echo U('Shop/home/help');?>">
                            <o class="font12 <?php if($actionname == "help"): ?>rigbg<?php endif; ?>">帮助中心</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li>
                        <a href="<?php echo U('Shop/home/addressList');?>">
                            <o class="font12 <?php if($actionname == "addresslist"): ?>rigbg<?php endif; ?>">地址菜单管理</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                <?php elseif($controllername == 'foodtype'): ?>
                    <li>
                        <a href="<?php echo U('Shop/Foodtype/typeList');?>">
                            <o class="font12 <?php if($actionname == "typelist"): ?>rigbg<?php endif; ?>">分类列表</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li>
                        <a href="<?php echo U('Shop/Foodtype/foodList');?>">
                            <o class="font12 <?php if($actionname == "foodlist"): ?>rigbg<?php endif; ?>">菜品列表</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                <?php elseif($controllername == 'comment'): ?>
                    <li>
                        <a href="<?php echo U('Shop/Comment/commentList');?>">
                            <o class="font12 <?php if($actionname == "commentList"): ?>rigbg<?php endif; ?>">评论列表</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                <?php elseif($controllername == 'technician'): ?>
                    <li>
                        <a href="<?php echo U('Shop/Technician/technician');?>">
                            <o class="font12 <?php if($actionname == "index"): ?>rigbg<?php endif; ?>">技师列表</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                <?php elseif($controllername == 'stall'): ?>
                    <li>
                        <a href="<?php echo U('Shop/Stall/stallList');?>">
                            <o class="font12 <?php if($actionname == "stalllist"): ?>rigbg<?php endif; ?>">档口列表</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                <?php elseif($controllername == 'member'): ?>
                    <li>
                        <a href="<?php echo U('Shop/Member/memberList');?>">
                            <o class="font12 <?php if($actionname == "memberlist"): ?>rigbg<?php endif; ?>">用户列表</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                <?php elseif($controllername == 'marki'): ?>
                    <li>
                        <a href="<?php echo U('Shop/Marki/applyList');?>">
                            <o class="font12 <?php if($actionname == "applylist"): ?>rigbg<?php endif; ?>">认证申请</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li>
                        <a href="<?php echo U('Shop/Marki/markiList');?>">
                            <o class="font12 <?php if($actionname == "markilist"): ?>rigbg<?php endif; ?>">人员管理</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                <?php elseif($controllername == 'feedback'): ?>
                    <li>
                        <a href="<?php echo U('Shop/Feedback/feedbackList');?>">
                            <o class="font12 <?php if($actionname == "feedbacklist"): ?>rigbg<?php endif; ?>">反馈列表</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                <?php elseif($controllername == 'settlement'): ?>
                    <li>
                        <a href="<?php echo U('Shop/Settlement/settlementList');?>">
                            <o class="font12 <?php if($actionname == "settlementlist"): ?>rigbg<?php endif; ?>">商户结算</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                <?php elseif($controllername == 'order'): ?>
                    <li>
                        <a href="<?php echo U('Shop/Order/ordinaryList');?>">
                            <o class="font12 <?php if($actionname == "ordinarylist"): ?>rigbg<?php endif; ?>">普通菜品订单列表</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li>
                        <a href="<?php echo U('Shop/Order/packageList');?>">
                            <o class="font12 <?php if($actionname == "packagelist"): ?>rigbg<?php endif; ?>">周餐订单列表</o>
                        </a>
                        <b class="arrow"></b>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo U('Shop/Sys/profile');?>">
                            <o class="font12">欢迎进入个人中心</o>
                        </a>
                        <b class="arrow"></b>
                    </li><?php endif; ?>
            </ul>
		</div>
	</div><!-- /.nav-list -->
</div>
			<!-- 右侧主要内容页顶部标题栏结束 -->

			<!-- 右侧下主要内容开始 -->
			
<link rel="stylesheet" type="text/css" media="all" href="/public/sldate/daterangepicker-bs3.css" />
<style>
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		-webkit-appearance: none;
	}
	input[type="number"]{
		-moz-appearance: textfield;
	}
</style>
<div class="page-content" style="padding-top: 50px;">
	<!--主题-->
	<div class="page-header">
		<h1>您当前操作
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>普通菜品-订单详情
			</small>
		</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<form class="form-horizontal ajaxForm" name="admin_list_add" method="post" action="">
				<input type="hidden" name="order_id" value="<?php echo ($infos["order_id"]); ?>">
				<input type="hidden" name="p" value="<?php echo ($p); ?>">
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 订单编号：  </label>
					<div class="col-sm-7">
						<input type="text" value="<?php echo ($infos["order_no"]); ?>" placeholder="订单编号" class="col-xs-10 col-sm-5" readonly/>
						<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 下单时间：  </label>
					<div class="col-sm-7">
						<input type="text" value="<?php echo (date('Y-m-d H:i:s',$infos["create_time"])); ?>" placeholder="下单时间" class="col-xs-10 col-sm-5" readonly/>
						<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
					</div>
				</div>
				<div class="space-4"></div>
				<?php if(($order_status) != "1"): ?><div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 付款时间：  </label>
						<div class="col-sm-7">
							<input type="text" value="<?php echo (date('Y-m-d H:i:s',$infos["payment_time"])); ?>" placeholder="付款时间" class="col-xs-10 col-sm-5" readonly/>
							<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
						</div>
					</div>
					<div class="space-4"></div><?php endif; ?>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 订单状态：  </label>
					<div class="col-sm-7">
						<?php switch($infos["order_status"]): case "1": ?><input type="text" value="待付款" class="col-xs-10 col-sm-5" readonly/><?php break;?>
							<?php case "2": ?><input type="text" value="备餐中" class="col-xs-10 col-sm-5" readonly/><?php break;?>
							<?php case "3": ?><input type="text" value="待取餐" class="col-xs-10 col-sm-5" readonly/><?php break;?>
							<?php case "4": ?><input type="text" value="配送中" class="col-xs-10 col-sm-5" readonly/><?php break;?>
							<?php case "5": ?><input type="text" value="已完成" class="col-xs-10 col-sm-5" readonly/><?php break;?>
							<?php case "6": ?><input type="text" value="已评价" class="col-xs-10 col-sm-5" readonly/><?php break;?>
							<?php case "7": ?><input type="text" value="已取消" class="col-xs-10 col-sm-5" readonly/><?php break;?>
							<?php case "8": ?><input type="text" value="已退款" class="col-xs-10 col-sm-5" readonly/><?php break; endswitch;?>
						<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 配送方式：  </label>
					<div class="col-sm-7">
						<?php switch($infos["deliver_type"]): case "1": ?><input type="text" value="外卖配送" class="col-xs-10 col-sm-5" readonly/><?php break;?>
							<?php case "2": ?><input type="text" value="档口自提" class="col-xs-10 col-sm-5" readonly/><?php break;?>
							<?php default: ?><input type="text" value="" class="col-xs-10 col-sm-5" readonly/><?php endswitch;?>
						<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 用户昵称：  </label>
					<div class="col-sm-7">
						<input type="text" value="<?php echo ($infos["member_list_nickname"]); ?>" placeholder="用户昵称" class="col-xs-10 col-sm-5" readonly/>
						<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 手机号：  </label>
					<div class="col-sm-7">
						<input type="number" value="<?php echo ($infos["yh_telphone"]); ?>" placeholder="手机号" class="col-xs-10 col-sm-5" readonly/>
						<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 订单金额：  </label>
					<div class="col-sm-7">
						<input type="text" value="<?php echo ($infos["total_money"]); ?>" placeholder="订单金额" class="col-xs-10 col-sm-5" readonly/>
						<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 备注：  </label>
					<div class="col-sm-7">
						<textarea cols="54" rows="4" readonly style="resize:none;"><?php echo ($infos["order_note"]); ?></textarea>
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 获得积分：  </label>
					<div class="col-sm-7">
						<input type="text" value="<?php echo ($infos["integral"]); ?>" placeholder="获得积分" class="col-xs-10 col-sm-5" readonly/>
						<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 实付金额：  </label>
					<div class="col-sm-7">
						<input type="text" value="<?php echo ($infos["real_money"]); ?>" placeholder="实付金额" class="col-xs-10 col-sm-5" readonly/>
						<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
					</div>
				</div>
				<div class="space-4"></div>
				<?php if($infos['order_status'] == 3): ?><div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 取餐码：  </label>
						<div class="col-sm-7">
							<input type="text" value="<?php echo ($goods_list['0']['meal_code']); ?>" placeholder="取餐码" class="col-xs-10 col-sm-5" readonly/>
							<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
						</div>
					</div>
					<div class="space-4"></div><?php endif; ?>
				<?php if($infos['deliver_type'] == 1): ?><div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 抢单状态：  </label>
						<div class="col-sm-7">
							<?php switch($infos["is_grab"]): case "1": ?><input type="text" value="待抢单" class="col-xs-10 col-sm-5" readonly/><?php break;?>
								<?php case "2": ?><input type="text" value="已抢单" class="col-xs-10 col-sm-5" readonly/><?php break;?>
								<?php default: ?><input type="text" value="" class="col-xs-10 col-sm-5" readonly/><?php endswitch;?>
							<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 配送费：  </label>
						<div class="col-sm-7">
							<input type="text" value="<?php echo ($infos["express_money"]); ?>" placeholder="配送费" class="col-xs-10 col-sm-5" readonly/>
							<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 配送时间：  </label>
						<div class="col-sm-7">
							<input type="text" value="<?php echo (date('Y-m-d H:i:s',$infos[express_time])); ?>" placeholder="配送时间" class="col-xs-10 col-sm-5" readonly/>
							<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
						</div>
					</div>
					<div class="space-4"></div>
					<?php if(($$infos[order_status]) == "4"): ?><div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 送达时间：  </label>
						<div class="col-sm-7">
							<input type="text" value="<?php echo (date('Y-m-d H:i:s',$infos[meals_time])); ?>" placeholder="配送时间" class="col-xs-10 col-sm-5" readonly/>
							<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
						</div>
					</div>
					<div class="space-4"></div><?php endif; ?>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 收货人姓名：  </label>
						<div class="col-sm-7">
							<input type="text" value="<?php echo ($infos["username"]); ?>" placeholder="收货人姓名" class="col-xs-10 col-sm-5" readonly/>
							<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 收货手机号：  </label>
						<div class="col-sm-7">
							<input type="text" value="<?php echo ($infos["phone"]); ?>" placeholder="收货手机号" class="col-xs-10 col-sm-5" readonly/>
							<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 收货地址：  </label>
						<div class="col-sm-7">
							<input type="text" value="<?php echo ($infos["address"]); ?>" placeholder="收货地址" class="col-xs-10 col-sm-5" readonly/>
							<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
						</div>
					</div>
					<div class="space-4"></div>
					<?php if(($infos['is_grab']) == "2"): ?><div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 配送员头像：  </label>
						<div class="col-sm-7">
							<div class="col-sm-10">
								<div>
									<img src="<?php echo ($infos["ps_headpic"]); ?>" height="70" width="70" >
								</div>
							</div>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 配送员姓名：  </label>
						<div class="col-sm-7">
							<input type="text" value="<?php echo ($infos["ps_name"]); ?>" placeholder="配送员姓名" class="col-xs-10 col-sm-5" readonly/>
							<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 配送员手机号：  </label>
						<div class="col-sm-7">
							<input type="text" value="<?php echo ($infos["ps_telphone"]); ?>" placeholder="配送员手机号" class="col-xs-10 col-sm-5" readonly/>
							<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
						</div>
					</div>
					<div class="space-4"></div><?php endif; ?>
				<?php else: ?>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 取餐地址：  </label>
						<div class="col-sm-7">
							<input type="text" value="<?php echo ($infos["stall_address"]); ?>" placeholder="取餐地址" class="col-xs-10 col-sm-5" readonly/>
							<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 档口电话：  </label>
						<div class="col-sm-7">
							<input type="text" value="<?php echo ($infos["stall_tel"]); ?>" placeholder="档口电话" class="col-xs-10 col-sm-5" readonly/>
							<span class="lbl col-xs-12 col-sm-7"><span class="red">*</span></span>
						</div>
					</div>
					<div class="space-4"></div><?php endif; ?>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 菜品信息： </label>
					<div class="col-sm-9">
						<table class="table table-striped table-bordered table-hover" style="width:100%;" id="dynamic-table">
							<thead>
							<tr>
								<th class="hidden-xs">菜品名称</th>
								<th class="hidden-xs">所属档口</th>
								<th class="hidden-xs">数量</th>
								<th class="hidden-xs">价格</th>
							</tr>
							</thead>
							<tbody>
							<?php if(is_array($goods_list)): $i = 0; $__LIST__ = $goods_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
								<td class="hidden-xs"><?php echo ($v["dishes_name"]); ?></td>
								<td class="hidden-xs"><?php echo ($infos["stall_name"]); ?></td>
								<td class="hidden-xs"><?php echo ($v["dishes_nums"]); ?></td>
								<td class="hidden-xs"><?php echo ($v["dishes_price"]); ?></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<!--<button class="btn btn-info" type="submit">
							<i class="ace-icon fa fa-check bigger-110"></i>提交
						</button>-->
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<button class="btn btn-info" type="button" onclick="javascript:window.history.back(-1);">
							返回
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div><!-- /.page-content -->
<script src="/public/uploadify/api-uploadify.js" type="text/javascript"></script>
<script>
$('#faculty').change(function(){
    var id = $(this).val();
})
</script>

			<!-- 右侧下主要内容结束 -->
		</div>
	</div><!-- 主要内容结束 -->
	<!-- 页脚开始 -->
	<div class="footer">
	<div class="footer-inner">
		<div class="footer-content">
			<span class="bigger-120">
				<span class="blue bolder"><a href="" target="_blank">时光餐厅</a></span>
				商家管理系统 &copy; 2016-<?php echo date('Y');?>
			</span>
		</div>
	</div>
</div>

	<!-- 页脚结束 -->
	<!-- 返回顶端开始 -->
	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
	<!-- 返回顶端结束 -->
</div><!-- 整个页面内结束 -->

<!-- ace的js,可以通过打包生成,避免引入文件数多 -->
<script src="/public/ace/js/ace.min.js"></script>
<!-- jquery.form、layer、yfcmf的js -->
<script src="/public/others/jquery.form.js"></script>
<script src="/public/others/maxlength.js"></script>
<script src="/public/layer/layer.js"></script>
<?php $t=time(); ?>
<script src="/public/sanmi/sanmi.js?<?php echo ($t); ?>"></script>
<!-- 此页相关插件js -->

<!-- 与此页相关的js -->
</body>
</html>