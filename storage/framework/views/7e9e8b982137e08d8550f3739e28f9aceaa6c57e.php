<nav class="navbar has-shadow" >
  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item is-paddingless brand-item" href="<?php echo e(route('admin.dashboard')); ?>">
        慢递鱼
      </a>

      <?php if(Request::segment(1) == "manage"): ?>
        <a class="navbar-item is-hidden-desktop" id="admin-slideout-button">
          <span class="icon">
            <i class="fa fa-arrow-circle-right"></i>
          </span>
        </a>
      <?php endif; ?>

      <button class="button navbar-burger">
       <span></span>
       <span></span>
       <span></span>
     </button>
    </div>
    <div class="navbar-menu">
     
      <div class="navbar-end nav-menu" style="overflow: visible">
        <?php if(auth()->guard()->guest()): ?>
          <a href="<?php echo e(route('admin.login.submit')); ?>" class="navbar-item is-tab">登录</a>
        <?php else: ?>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">Hey <?php echo e(Auth::user()->name); ?></a>
            <div class="navbar-dropdown is-right" >
              <a href="<?php echo e(route('admin.dashboard')); ?>" class="navbar-item">
                <span class="icon">
                  <i class="fa fa-fw fa-cog m-r-5"></i>
                </span>Manage
              </a>
              <hr class="navbar-divider">
              <a href="<?php echo e(route('logout')); ?>" class="navbar-item" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <span class="icon">
                  <i class="fa fa-fw fa-sign-out m-r-5"></i>
                </span>
                Logout
              </a>
              <?php echo $__env->make('_includes.forms.logout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>

  </div>
</nav>
