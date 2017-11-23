 
<?php $__env->startSection('content'); ?>
<div id='letter' class="container1">
  <div class="letter_menu">
    <!-- drop down button -->
    <div class='dropdown is-active'>
      <ul id="commen-font-style">
        <li class="active menu-item" aria-haspopup="true" aria-controls="dropdown-menu">信纸 <span class='fa fa-sort-desc'></span></li>
        <li class="menu-item">字体 <span class="fa fa-sort-desc"></span></li>
        <li class="menu-item">字号 <span class="fa fa-sort-desc"></span></li>
        <li class="menu-item">A <span class="fa fa-sort-desc"></span></li>
        <li class="menu-item">添加图片 <span class="fa fa-sort-desc"></span></li>
      </ul>
      <div>
      <ul style="margin-left: 360px; line-height: 38px;">
        <li class="float_rt" style="padding-top: 8px;">
          <img src="img/letter/letter_menu_13.png" alt="">
        </li>
        <li class="float_rt" style="padding-top: 8px;">
          <img src="img/letter/letter_menu_11.png" alt="" >
        </li>
        <li class="float_rt" style="padding-top: 8px;" >
                <img src="img/letter/letter_menu_09.png" alt="">
        </li>
        <li class="float_rt" style="padding-top: 8px;">
          <img src="img/letter/letter_menu_07.png" alt="">
        </li>
      </ul>
      </div>
    </div>
  </div>

  <?php echo $__env->make('public.letterMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div id="letter_content">

    <div id="letter_container" :style="letter_content_background">
      <div id="letter_neirong" contenteditable="true" name='letter_neirong'>
        亲爱的______ : 
      </div>
    </div>
  </div>
</div>
<button class="btn1" onclick='createLetter()'>下一步：设置收信信息</button>


<?php $__env->startPush('javascript'); ?>
<script src='js/colorpicker.js'></script>
<script src='js/letter.js'></script>
<script src='js/jquery-ui.min.js'></script>
<script src='js/jquery.slides.min.js'></script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('style'); ?>
<link rel="stylesheet" href="js/jquery-ui.min.css">
<link rel="stylesheet" href="css/colorpicker.css">
<?php $__env->stopPush(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>