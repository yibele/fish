<div class="letter_img_lt menu_active" id="xinzhi">
  <div class='btn_lf slidesjs-previous  slidesjs-navigation'>
    <i class="fa fa-chevron-left fa-3x" aria-hidden="true"></i>
  </div>
  <div class="letter_img_lt1" id='letter_tums'>
    <?php $__currentLoopData = $xinzhis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xinzhi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <img src="<?php echo e($xinzhi->src); ?>" class='letter_img_detail' alt="" @click='changeLetterBackground'>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>

  <div class="btn_rt slidesjs-next  slidesjs-navigation">
    <i class="fa fa-chevron-right fa-3x" aria-hidden="true"></i>
  </div>
</div>

<div class="letter_img_lt menu_active" id="ziti" >
  <div class='btn_lf slidesjs-previous  slidesjs-navigation'>
  </div>
  <?php $__currentLoopData = $fonts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="fonts">
    <?php $__currentLoopData = $f; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $font): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="fonts_lt">
      <img src="/img/fonts/<?php echo e($font['imgSrc']); ?>" alt="<?php echo e($font['fname']); ?>" class='font_img' onclick='changeFontFamily(event,"<?php echo e($font['fname']); ?>","<?php echo e($font['accesskey']); ?>","<?php echo e($font['lineHeight']); ?>");'>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="btn_rt slidesjs-next  slidesjs-navigation">
  </div>
</div>

<div class="letter_img_lt" id="zihao">
  <div id="slider_container">
    <label for="slider" style=' display:inline-block;margin-right : 20px;color:#ccc;font-size : 16px;'>字号</label> -
    <div id="slider" class="slider"></div> +
    <input type="text" id='amount' readonly style='display:inline-block'>
  </div>
</div>

<div class="letter_img_lt" id="A">

  <div class="btn_lf">
    <span class='fa fa-chevron-left fa-5x'></span>
  </div>

  <div class="" id="colors">
    <div id="letter_all_colors" style="background-image:url(/img/letter/all_colors_03.png)"></div>
    <div id="colorpickerHolder"></div>
    <?php $__currentLoopData = $fontColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="letter_color" style="background-color: <?php echo e($color['value']); ?>"></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <div class="btn_rt">
    <span class="fa fa-chevron-right fa-5x"></span>
  </div>
</div>
<div class="letter_img_lt" id="tianjia"></div>