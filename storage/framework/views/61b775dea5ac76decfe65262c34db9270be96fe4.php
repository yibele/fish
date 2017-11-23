
<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <script type="text/javascript" src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/vue.js')); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bulma.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/override.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/start.css')); ?>">
    <script type="text/javascript" src="http://cdn.webfont.youziku.com/wwwroot/js/wf/youziku.api.min.js?"></script>
    <script type="text/javascript" src="http://cdn.webfont.youziku.com/youziku.justtime.js"></script>
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <title></title>
    <?php echo $__env->yieldPushContent('style'); ?>
</head>
<body>
    <?php echo $__env->make("_includes.stars", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div id="app">
        <transition name="slide-fade">
        <span v-show="messageShow" class="messages notification is-danger is-pulled-right" style="position:absolute;right:0px;z-index:1100">
            ${message}
        </span>
        </transition>
        <?php echo $__env->make('_includes.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->yieldPushContent('javascript'); ?>
        <!-- Scripts -->
    <?php echo $__env->make('_includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript" src='<?php echo e(asset('js/app.js')); ?>'></script>
</body>
</html>




