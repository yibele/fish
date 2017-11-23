<?php $__env->startSection('content'); ?>
<div class="flex-container">
		<div class="columns m-t-10">

			<div class="column">
				<h1 class='title'>信件模板</h1>
			</div>
		</div>
		<hr>

        <form action="<?php echo e(route('xinjian.store')); ?>" method="POST" class="form" >
			<div class="columns">
				<div class="column" style="width:450px;">
					<?php echo e(csrf_field()); ?>

					<div class="field">
						<div class="label" for="name">模板名称:</div>
						<p class="control">
							<input type="text" class="input" required name="name" id="name" v-model="name">
						</p>
					</div>

					<div class="field">
						<div class="label" for="yincai">选择印材:</div>
						<p class="control">
							<input type="text" class="input" placeholder="请输入印材id" required name="yincai" id="yincai">
						<p class="message"></p>
						<a href="<?php echo e(route('yincais.index')); ?>" class="button">查看印材</a>
						<button type="button" class="button" v-on:click="addbackground">添加印材</button>
						</p>
					</div>
					<div class="field">
						<div class="label" for="wenbenkuang">文本框设置:</div>
						宽度 ：<input type="text" name="width" v-model="styleObj.width" required>
						高度 ： <input type="text" name="height" v-model="styleObj.height" required>
						<br />
						上边界: <input type="text" name="padding_top" v-model="paddingTop" required  placeholder="输入像素值，以px结尾，如：200px">
						左边界: <input type="text" name="padding_left" v-model="paddingLeft" required>
					</div>
				</div>
				<div class="column">
					<div class="field">
						<div class="label" for="isCol">文字方向:</div>
						<b-radio v-model="isCol" name="isCol" native-value="1">行</b-radio>
						<b-radio v-model="isCol" name="isCol" native-value="0">列</b-radio>
					</div>
                    <div class="field">
						<div class="label" for="tiaoxingma">条形码:</div>
						宽度 ：<input type="text" name="txm_width" v-model="tiaoxingma.width" required>
						高度 ： <input type="text" name="txm_height" v-model="tiaoxingma.height" required>
						<br />
						上边界: <input type="text" name="txm_padding_top" v-model="tiaoxingma.top" required placeholder="输入像素值，以px结尾，如：200px">
						左边界: <input type="text" name="txm_padding_left" v-model="tiaoxingma.left" required>
					</div>
					<button class="button m-r-20 is-primary">保存模板</button>
				</div>
			</div>
			<hr>

        </form>
		<div class="m-t-30" style="height:1585px;width:1120px;" :style="getBackground" id="xinzhi_edit_background">
			<div class="content_area" id="content_area" contenteditable="true" style="border:1px red solid;" v-bind:style="styleObj"></div>
			<div id="tiaoxingma" v-bind:style="tiaoxingma"></div>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascript'); ?>
<script>
	const vm = new Vue({
		el : '#app',
		data : {
			background : '',
			styleObj : {
                width : '900px',
                height : '1400px',
			},
			paddingTop : '100px',
			paddingLeft : '100px',
			name : '',
			isCol: '1',
			tiaoxingma : {
			    width:'200px',
				height : '100px',
				top : '0px',
				left:'0px',
				border : '1px blue solid',
				position: 'absolute'
			},
		},
		methods : {
		    // 添加背景图片
			addbackground : function() {
				var yincaiid = document.getElementById('yincai').value;
				var vm = this;
				axios.get('/admin/yincais/getxinzhiyincai/'+yincaiid).then(res => {
					this.background = res.data;
				}).catch( e=> {
					alert('没有找到印材，请输入正确的印材id')
				})
			},
			//设置文本框框

		},
		computed : {
			getBackground : function () {
				var yincai = document.getElementById('yincai').value;
				return 'background-image:url("'+this.background+'");background-size:cover ;display:block;padding-top:'+this.paddingTop+';padding-left:'+this.paddingLeft+';position:relative';
			},
		},

	})
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>