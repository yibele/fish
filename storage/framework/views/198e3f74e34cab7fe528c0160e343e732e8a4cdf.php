<?php $__env->startSection('content'); ?>
	<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class='title'>权限管理</h1>
			</div>
			<div class="column">
				<a href="<?php echo e(route('manager.create')); ?>" class="button is-primary is-pulled-right m-r-10"><i class="fa fa-user-plus"></i>添加管理员</a>
				<a href="" class="button is-primary is-pulled-right m-r-10"><i class="fa fa-user-plus"></i>修改权限</a>
			</div>
		</div>
		<hr>

		<table class="table is-narrow" style="width: 100%">
			<thead>
				<tr>
					<th>id</th>
					<th>姓名</th>
					<th>邮箱</th>
					<th>创建日期</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($user->id); ?></td>
					<td><?php echo e($user->name); ?></td>
					<td><?php echo e($user->email); ?></td>
					<td><?php echo e($user->created_at); ?></td>
					<td class='has-text-right m-r-20'>
						<a href="<?php echo e(route('manager.show',$user->id)); ?>" class="button is-outlined">查看</a>
						<a href="<?php echo e(route('manager.edit',$user->id)); ?>" class="button">编辑</a>
					
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>