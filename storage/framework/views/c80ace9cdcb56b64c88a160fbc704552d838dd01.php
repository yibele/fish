<?php
/**
 * Created by PhpStorm.
 * User: yibele
 * Date: 2017/9/14
 * Time: 下午8:01
 */
?>


<?php $__env->startSection('content'); ?>

    <div class="notification is-danger " style="width:400px;margin:0 auto;text-align: center;">
        <?php echo e($messages); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>