<?php if (!defined('THINK_PATH')) exit(); if(empty($channelList)): ?><p class="goods_title">抱歉暂时没有相关结果！</p>
<?php else: ?>
<form method="post" enctype="multipart/form-data" target="_blank" id="form-order">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <td class="text-center">
                    ID
                </td>

                <td class="text-center">
                    渠道名称
                </td>

                <td class="text-center">
                    渠道分成比例
                </td>

                <td class="text-center">
                    总收益（元）
                </td>

                <td class="text-center">
                    已结算（元）
                </td>

                <td class="text-center">
                    待结算（元）
                </td>

                <?php if($ischannel != 1): ?><td class="text-center">
                        操作
                    </td><?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($channelList)): $i = 0; $__LIST__ = $channelList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                    <td class="text-center">
                        <?php echo ($list["channelid"]); ?>
                    </td>

                    <td class="text-center">
                        <a href="<?php echo U('Channel/getChannelInfo',array('id' => $list['channelid']));?>">
                            <?php echo ($list["channelname"]); ?>
                        </a>
                    </td>

                    <td class="text-center">
                        <?php echo ($list["proportion"]); ?>
                    </td>

                    <td class="text-center">
                        <?php echo ($list["summoney"]); ?>
                    </td>

                    <td class="text-center">
                        <?php echo ($list["paidmoney"]); ?>
                    </td>

                    <td class="text-center">
                        <?php echo ($list["remainmoney"]); ?>
                    </td>

                    <td class="text-center">
                        <?php if($ischannel != 1): ?><a href="<?php echo U('Admin/Channel/settlement',array('id' => $list['channelid']));?>" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="查看详情" target="rightContent">
                                <span>结算</span>
                            </a>

                            <a href="<?php echo U('Admin/Channel/addEditChannel',array('id' => $list['channelid'],'action' => 'edit'));?>" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="编辑信息" target="rightContent">
                                <span>编辑信息</span>
                            </a>

                            <a href="<?php echo U('Admin/Channel/bindUserChannel',array('id' => $list['channelid'],'channelname' => $list['channelname']));?>" data-toggle="tooltip" title="" class="btn btn-warning" data-original-title="绑定账号" target="rightContent">
                                <span>绑定账号</span>
                            </a>

                            <a href="javascript:void(0);" onclick="del('<?php echo ($list['channelid']); ?>')" id="button-delete6" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="删除渠道">
                                <span>删除渠道</span>
                            </a><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
</form>
<div class="row">
    <div class="col-sm-3 text-left"></div>
    <div class="col-sm-9 text-right"><?php echo ($page); ?></div>
</div><?php endif; ?>
<script>

    // 点击分页触发的事件
    $(".pagination  a").click(function()
    {
        cur_page = $(this).data('p');

        ajax_get_table('search-form2',cur_page);
    });

    // 删除操作
    function del(id)
    {
        if(!confirm('确定要删除吗?'))
        {
            return false;
        }

        $.ajax(
        {
            url     : "/index.php?m=Admin&c=Channel&a=delChannel&id="+id,
            success : function(v)
            {
                var v =  eval('('+v+')');

                if(v.hasOwnProperty('status') && (v.status == 1))
                {
                    ajax_get_table('search-form2',cur_page);
                }
                else
                {
                    layer.msg(v.msg, {icon: 2,time: 1000}); //alert(v.msg);
                }
            }
        });

        return false;
    }

</script>