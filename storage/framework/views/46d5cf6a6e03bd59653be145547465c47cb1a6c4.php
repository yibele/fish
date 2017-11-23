<?php
/**
 * Created by PhpStorm.
 * User: yibele
 * Date: 2017/9/8
 * Time: 下午3:09
 */
?>

<?php $__env->startSection('content'); ?>
    <div class='container1'>
        <div class='myletter_title'>
            <button style="color:#ffffff">我的慢递</button>
            &nbsp &nbsp| &nbsp &nbsp
            <button>我的明信片</button>
        </div>
        <?php $__currentLoopData = $letters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class='myletter_content'>
            <div class='myletter_content_menu'>
                <div class='time' style="color: #bbbbbb;">
                    写信日期: <?php echo e($letter->created_at); ?>

                </div>
                <div class='menu'>
                    <?php if($letter->status == 0): ?>
                    <button><a href="">修改收信人信息</a></button>
                    <button><a href="<?php echo e(route('private.editLetter',$letter->lid)); ?>" @click="setMessage(<?php echo e($letter->lid); ?>,$event);">继续编辑</a></button>
                    <?php endif; ?>
                        <?php if($letter->status ==1): ?>
                            <button><a href="">修改收信人信息</a></button>
                        <?php endif; ?>
                    <?php if($letter->status != 0): ?><button><a href="">续单</a></button> <?php endif; ?>
                    <button><a href="">下载信件</a></button>
                    <button><a href="<?php echo e(route('private.viewLetter',$letter->lid)); ?>">查看信件</a></button>
                </div>
            </div>
            <div class='myletter_content_detail'>

                <a href="<?php echo e(route('private.viewLetter',$letter->lid)); ?>"><div class='img' style="overflow:hidden;font-size:5px;padding:4px;background-image:url(<?php echo e($letter['ltBackTum']); ?>) ;color:black">
                    <?php echo $letter['lt_content']; ?>

                </div>
                </a>
                <div class='content'>
                    <p>物流单号:</p>
                    <?php if($letter->status == 0): ?>
                    <p>当前状态:草稿</p>
                    <?php elseif($letter->status ==1): ?>
                        <p>当前状态:未寄出
                        <?php if($letter->isPublic == 1): ?>
                            (此信未公开信)<a href="<?php echo e(route('public.pubShow',$letter->lid)); ?>">查看</a><a href="<?php echo e(route('private.canclePub',$letter->lid)); ?>">取消公开</a>
                        <?php else: ?>
                            (此信为私有信) <a href="<?php echo e(route('private.setPub',$letter->lid)); ?>">公开</a>
                        <?php endif; ?>
                    <?php else: ?>
                        <p>当前状态:已寄出
                            <?php if($letter->isPublic == 1): ?>
                                (此信未公开信)<a href="<?php echo e(route('public.pubShow',$letter->lid)); ?>">查看</a><a href="<?php echo e(route('private.canclePub',$letter->lid)); ?>">取消公开</a>
                            <?php else: ?>
                                (此信为私有信) <a href="<?php echo e(route('private.setPub',$letter->lid)); ?>">公开</a>
                            <?php endif; ?>
                        </p>
                    <?php endif; ?>
                    <p>寄信时间:</p>
                    <p>收信人姓名:</p>
                    <p>收信人电话:</p>
                    <p>收信人地址:</p>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php echo e($letters->links()); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>