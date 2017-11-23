<?php if($paginator->hasPages()): ?>
    <nav class="pagination is-centered" role="pagination" aria-lebel="pagination" style="justify-content:center;margin-top:20px">
        
     
        
        <ul class="pagination-list" style="border:none !important">
        <?php if($paginator->onFirstPage()): ?>
        <?php else: ?>
            <!--<li><a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">&laquo;</a></li>-->
            <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" class="pagination-previous" style="border :none !important">上一页</a>
        <?php endif; ?>
        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <li class="disabled"><span><?php echo e($element); ?></span></li>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <!--<li class="active"><span><?php echo e($page); ?></span></li>-->
                        <li><a class="pagination-link is-current" style="border :none !important"><?php echo e($page); ?></a></li>
                    <?php else: ?>
                        <li><a href="<?php echo e($url); ?>" class="pagination-link" style="border :none !important"><?php echo e($page); ?></a></li>
                        <!--<li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>-->
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <!--<li><a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">&raquo;</a></li>-->
            <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="pagination-next" style="border :none !important">下一页</a>
        <?php else: ?>
        <?php endif; ?>
        </ul>

    </nav>
<?php endif; ?>
