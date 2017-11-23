<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
  <script src="<?php echo e(asset('js/vue.js')); ?>"></script>
  <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Buefy CSS -->
  <link rel="stylesheet" href="https://unpkg.com/buefy/lib/buefy.min.css">
  <!-- Buefy JavaScript -->
  <script src="https://unpkg.com/buefy"></script>
  <?php echo $__env->yieldPushContent('style'); ?>
</head>
<body>
  <?php echo $__env->make('_includes.nav.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <aside class="menu side-menu m-t-30 m-l-20">
      <ul class="menu-list">
        <p class="menu-label">管理相关</p>
        <li><a href="<?php echo e(route('manage.dd')); ?>">订单管理</a></li>
        <?php if(auth::user()->role == 1): ?>
        <li><a class="has-submenu ">权限管理</a>
          <ul class="submenu">
            <li><a href="">角色管理</a></li>
            <li><a href="">权限管理</a></li>
          </ul>
        </li>
      <li><a href="<?php echo e(route('admin.index')); ?>">管理员管理</a>
      </li>
        <?php endif; ?>
        <li><a class="has-submenu">印材管理</a>
          <ul class="submenu">
            <li><a href="<?php echo e(route('yincais.create')); ?>">添加印材</a></li>
            <li><a href="<?php echo e(route('yincais.index')); ?>">管理印材</a></li>
          </ul>
        </li>
        <li><a class="has-submenu">信件模板</a>
          <ul class="submenu">
            <li><a href="<?php echo e(route('xinjian.create')); ?>">新建模板</a></li>
            <li><a href="<?php echo e(route('xinjian.index')); ?>">模板列表</a></li>
          </ul>
        </li>
        <li><a class="has-submenu">明信片模板</a>
          <ul class="submenu">
            <li><a href="<?php echo e(route('postcard.create')); ?>">新建模板</a></li>
            <li><a href="<?php echo e(route('postcard.index')); ?>">模板列表</a></li>
            <li><a href="">标签管理</a></li>
          </ul>
        </li>
        <li><a class="has-submenu" >字体管理</a>
            <ul class="submenu">
              <li><a href="<?php echo e(route('ziti.index')); ?>">主字体</a></li>
              <li><a href="">附属字体</a></li>
            </ul>
        </li>
        <li><a href="">用户管理</a></li>
        <li><a href="<?php echo e(route('manage.jg')); ?>">价格管理</a></li>
        <li><a href="<?php echo e(route('manage.djq')); ?>">代金券管理</a></li>
        <p class="menu-label">运营相关</p>
        <li><a href="<?php echo e(route('manage.yy')); ?>">运营相关</a></li>
        <li><a href="<?php echo e(route('manage.xx')); ?>">信息推送</a></li>
      </ul>
    </aside>
  <div id='app'>
    <div class="management-area">
      <?php if(Session::has('success')): ?>
        <article class="message is-success">
          <div class="message-body">
            <?php echo e(Session::get('success')); ?>

          </div>
        </article>
      <?php endif; ?>
      <?php if(Session::has('fail')): ?>
          <article class="message is-danger">
            <div class="message-body">
              <?php echo e(Session::get('fail')); ?>

            </div>
          </article>
      <?php endif; ?>
      <?php echo $__env->yieldContent('content'); ?>
        <footer class="footer" style="padding-bottom : 45px;text-align:center;background-color: inherit">
          <div>
            Copyright © 2015-2017mandifish.com.蒙ICP备15003789
          </div>
          <div class="copyright"  >
            <a href="">版权声明</a>
            &nbsp;
            &nbsp;
            |
            &nbsp;
            &nbsp;
            <a href="">关于价格</a>
            &nbsp;
            &nbsp;
            |
            &nbsp;
            &nbsp;
            <a href="">常见问题</a>
            &nbsp;
            &nbsp;
            |
            &nbsp;
            &nbsp;
            <a href="">联系我们</a>
          </div>
        </footer>
    </div>

  </div>
  </div>
  <script>
    Vue.use(Buefy.default);
  </script>
  <script src="<?php echo e(asset('js/manage.js')); ?>"></script>
  <?php echo $__env->yieldPushContent('javascript'); ?>
</body>
</html>
