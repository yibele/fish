<?php $__env->startSection('content'); ?>
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class='title'>模板详情</h1>
            </div>
            <div class="column">
                <a href="<?php echo e(route('xinjian.edit',$xinzhi->id)); ?>" class="button is-primary is-pulled-right"><i class="fa fa-user-plus"></i>编辑模板</a>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="name" class="label">模板id / 名称</label>
                    <pre><?php echo e($xinzhi->id); ?>  <?php echo e($xinzhi->name); ?></pre>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <div class="field">
                                <label for="email" class="label">图片</label>
                                <img src="<?php echo e($xinzhi->yincai->file1); ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <div class="field">
                                <label for="email" class="label">相关数据:</label>
                                <b>文本框宽 * 高:</b>
                                <p><?php echo e($xinzhi->width); ?> * <?php echo e($xinzhi->height); ?></p>
                                <b>文本框上，左位置:</b>
                                <p><?php echo e($xinzhi->paddingTop); ?> <?php echo e($xinzhi->paddingLeft); ?></p>
                                <b>文本方向:</b>
                                <p><?php $xinzhi->isCol == 1 ? '行' : '列'; ?></p>
                                <b>条形码款 * 高:</b>
                                <p><?php echo e($xinzhi->txm_width); ?> * <?php echo e($xinzhi->txm_height); ?></p>
                                <b>条形码上，左位置:</b>
                                <p><?php echo e($xinzhi->txm_padding_top); ?> <?php echo e($xinzhi->txm_padding_left); ?></p>
                                <b>模板描述:</b>
                                <p><?php echo e($xinzhi->desc); ?></p>
                            </div>
                            <hr>
                            <button class="button is-primary">查看样式</button>
                        </div>
                    </div>
                </div><!-- end of columns-->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>