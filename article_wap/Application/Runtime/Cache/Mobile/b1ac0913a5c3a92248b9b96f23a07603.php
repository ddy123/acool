<?php if (!defined('THINK_PATH')) exit();?><div class="md-modal md-effect-3" id="modal-3" xmlns="http://www.w3.org/1999/html">
    <form class="md-content" action="<?php echo U('Article/buyVipChapter');?>" id="buy_info_form" method="post">
    <!--<form class="md-content" action="/index.php">-->
        <input  type="hidden" name="m" value="Mobile">
        <input  type="hidden" name="c" value="Article">
        <input  type="hidden" name="a" value="buyVipChapter">
        <h3>书籍订单</h3>
        <div id="startBuy">
            您将从<span class="defaultColor"><?php echo ($chaptername); ?></span> 开始购买
        </div>
        <div class="flex">
            <div class="item selected <?php echo ($buylist[0]['show']? able:disable); ?>" buy_index="0" need_money="<?php echo ($buylist[0]['totalprice']); ?>"><?php echo ($buylist[0]['buynum']); ?></div>
            <div class="item <?php echo ($buylist[1]['show']? able:disable); ?>" buy_index="1" need_money="<?php echo ($buylist[1]['totalprice']); ?>"><?php echo ($buylist[1]['buynum']); ?></div>
            <div class="item <?php echo ($buylist[2]['show']? able:disable); ?>" buy_index="2" need_money="<?php echo ($buylist[2]['totalprice']); ?>"><?php echo ($buylist[2]['buynum']); ?></div>
            <div class="item <?php echo ($buylist[3]['show']? able:disable); ?>" buy_index="3" need_money="<?php echo ($buylist[3]['totalprice']); ?>"><?php echo ($buylist[3]['buynum']); ?></div>
        </div>
        <input id="selItem" type="hidden" name="buy_index" value="0">
        <div class="money">需支付：<span class="defaultColor ndmy"></span><span> <?php echo ($eglodname); ?></span></div>
        <div class="money">现有余额：<span id ="yue"><?php echo ($userbalance); ?></span> <?php echo ($eglodname); ?></div>
        <div class="subscription">
            <input id="subscibe" name="auto_buy" value="1" type=checkbox>自动订阅该书</input>
        </div>
        <button class="md-close">确认支付</button>
        <p></p>
    </form>
</div>
<div class="md-overlay"></div>
<!--<script src="/Template/mobile/default/Static/js/wapmfds/cssParser.js"></script>-->
<!--<script src="/Template/mobile/default/Static/js/wapmfds/css-filters-polyfill.js"></script>-->