<?php $__env->startSection('content'); ?>
	<div class="flex-container">
		<div class="columns m-t-10">

			<div class="column">
				<h1 class='title'>模板列表</h1>
			</div>
			<div class="column">
				<a href="<?php echo e(route('xinjian.create')); ?> " class="button is-primary is-pulled-right"><i class="fa fa-user-plus"></i>新建模板</a>
			</div>
		</div>
		<hr>
		<table class="table is-narrow" style="width: 100%">
			<thead>
				<tr>
					<th>id</th>
					<th>模板名称</th>
					<th>印材名称</th>
					<th width="">创建日期</th>
					<th>缩略图</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $xinzhis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xinzhi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($xinzhi->id); ?></td>
					<td><?php echo e($xinzhi->name); ?></td>
					<td><?php echo e($xinzhi->yincai->name); ?></td>
					<td><?php echo e($xinzhi->created_at); ?></td>
                    <td><img src="<?php echo e($xinzhi->yincai->tmb1); ?>" alt="" style="width:150px">
					</td>
					<td class='has-text-right m-r-20'>
						<a href="<?php echo e(route('xinjian.show',$xinzhi->id)); ?>" class="button is-outlined">查看</a>
						<a href="<?php echo e(route('xinjian.edit',$xinzhi->id)); ?>" class="button">编辑</a>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>