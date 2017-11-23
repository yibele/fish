<?php
/**
 * Created by PhpStorm.
 * User: yibele
 * Date: 2017/9/16
 * Time: 下午12:24
 */
?>


<?php $__env->startSection('content'); ?>
    <div class="container1" id="container1">
        <div class="publetter" id="publetter">
            <?php $__currentLoopData = $letters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($k != 4): ?>
                <a style="color : #000 ;font-size : 18px;line-height: 1.45;" href="<?php echo e(url("/publetter/".$letter['lid'])); ?>" ><div class="publetter_lt" id="<?php echo e($letter['lid']); ?>" style="background-image:url(<?php echo e(asset('img/public_letter/publetter_03.png')); ?>); padding :20px;">
                        <div style="overflow: hidden; height : 180px;"><?php echo $letter['lt_content']; ?></div>
                    </div></a>
                    <?php else: ?>
                    <div class="publetter_lt" style="background-size:contain;background-image:url(<?php echo e(asset('img/public_letter/public_letter_03.png')); ?>);"></div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('javascript'); ?>
<script>
    $(function () {
        var letter_neirong = $("#container1");
        objchangefont(letter_neirong, "a28d6bc9a592429e93378a6001f9e547")
        console.log('test');
    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>