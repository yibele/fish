<?php
/**
 * Created by PhpStorm.
 * User: yibele
 * Date: 2017/9/18
 * Time: 下午5:36
 */
?>


<?php $__env->startSection('content'); ?>
    <div class='container1'>
        <div class='charges_content'>
            <div class='charges_col1'>
                <div class='charges_detail'>
                    <h4>
                        <img src="<?php echo e(asset('img/charges/charges_icon_03.png')); ?>" class="charges_icon" alt="">
                        慢递鱼是什么?</h4>
                    <p style="padding:10px 20px 30px 47px">慢递鱼是什么？ 慢递鱼是一个专业在线编辑信件和明信片并邮寄的平台。 用户在这里写信、编辑明信片，选择寄信日期和填写收信人，慢递鱼会在用户指定的日期将信件寄出。<br>慢递鱼有着强大的在线编辑功能，提供独特精美的信纸和明信片版式，用户轻松就可以编辑一封唯美精致的信件或明信片，寄给自己、朋友、客户或粉丝。<br>在这里写信或者编辑明信片，选择朋友、亲人的生日或节日寄出，再也不用担心忘记这些重要的日子了，也是最有意义和诚心的礼物。</p>
                </div>
                <div class='charges_detail'>
                    <h4>
                        <img src="<?php echo e(asset('img/charges/charges_icon_03.png')); ?>" alt="" class="charges_icon">
                        资费是多少，怎样邮寄?
                    </h4>

                    <p style="padding:10px 20px 30px 47px">信件和明信片邮寄价格均为19.9元。2年内免费保管，超出2年保管费为每年5元。信件采用顺丰快递邮寄，最大限度保证收到信件。</p>
                </div>
                <div class='charges_detail'>
                    <h4>
                        <img src="<?php echo e(asset('img/charges/charges_icon_03.png')); ?>" alt="" class="charges_icon">
                        怎样寄明信片和写信？</h4>
                    <p style='padding:10px 20px 30px 47px'>1. 点击导航中的“寄明信片”或“写信”按钮进入界面进行编辑。
                        2. 点击下一步选择信件寄出日期并填写收信人。如果明信片或信件要寄给多人，可选择批量添加。还提供分享至社交平台让收信人自己领取的功能，这样有粉丝的朋友就可以让粉丝自己领取了。<br>
                        3.完成以上就可以去支付了，支持支付宝或微信支付。然后就安心等待收信吧！</p>
                </div>
                <div class='charges_detail'>
                    <h4>
                        <img src="<?php echo e(asset('img/charges/charges_icon_03.png')); ?>" alt="" class="charges_icon">
                        公开信是什么？</h4>
                    <p style='padding:10px 20px 30px 47px'>公开信是用户授权慢递鱼公开分享的信件。你也可以在写信结束后选择公开自己的信件和别人分享。</p>
                </div>
                <div class='charges_detail'>
                    <h4>
                        <img src="<?php echo e(asset('img/charges/charges_icon_03.png')); ?>" alt="" class="charges_icon">
                        可以补充或修改收信人吗？</h4>
                    <p style='padding:10px 20px 30px 47px'>可以。寄信前一个月可以进入“我的慢递”，点击编辑明信片或编辑信件进行补充或更改。为了避免遗忘，你可以绑定慢递鱼公众号，慢递鱼会在寄信前一个月提醒你。公众号还可以查询物流。</p>
                </div>
                <div class='charges_detail'>
                    <h4>
                        <img src="<?php echo e(asset('img/charges/charges_icon_03.png')); ?>" alt="" class="charges_icon">
                        无法寄送的信件怎样处理？</h4>
                    <p style='padding:10px 20px 30px 47px'>免费保存2年，期间寄信人可以通过慢递鱼站内客服或者公众号留言)取得联系重新投递，若2年后仍未完成投递，则将信件销毁，保护您的隐私。</p>
                </div>
            </div>
            <div class='charges_col2'>
                <h4 style='margin-bottom:20px;'>联系我们</h4>
                <p>客服邮件: <?php echo e($kefu->email); ?></p>
                <p>意见建议: <?php echo e($kefu->email2); ?></p>
                <p>微信公众号: <?php echo e($kefu->wechat); ?></p>
                <img src="<?php echo e(asset('img/index/erweima_07.png')); ?>" style="margin-top:40px" alt="">
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>