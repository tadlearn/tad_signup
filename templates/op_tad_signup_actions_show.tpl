<h2 class="my">
    <{if $enable}>
        <i class="fa fa-check text-success" aria-hidden="true"></i>
    <{else}>
        <i class="fa fa-times text-danger" aria-hidden="true"></i>
    <{/if}>
    <{$title}>
    <small><i class="fa fa-calendar" aria-hidden="true"></i> 活動日期：<{$action_date}></small>
</h2>

<div class="alert alert-info">
    <{$detail}>
</div>

<h3 class="my">
    已報名表資料
    <small>
        <i class="fa fa-calendar-check-o" aria-hidden="true"></i> 報名截止日期：<{$end_date}>
        <i class="fa fa-users" aria-hidden="true"></i> 報名人數上限：<{$number}>
    </small>
</h3>

<table class="table" data-toggle="table" data-pagination="true" data-search="true" data-mobile-responsive="true">
    <thead>
        <tr>
            <{foreach from=$signup.0.tdc key=col_name item=user name=tdc}>
                <th data-sortable="true"><{$col_name}></th>
            <{/foreach}>
            <th data-sortable="true">報名日期</th>
        </tr>
    </thead>
    <tbody>
        <{foreach from=$signup item=signup_data}>
            <tr>
                <{foreach from=$signup_data.tdc key="col_name" item=user_data}>
                    <td>
                        <{foreach from=$user_data item=data}>
                            <{if !$xoops_isuser && strpos($col_name, '姓名')!==false}>
                                <div><{$data|substr_replace:'O':3:3}></div>
                            <{elseif !$xoops_isuser}>
                                <div>****</div>
                            <{else}>
                                <div><{$data}></div>
                            <{/if}>
                        <{/foreach}>
                    </td>
                <{/foreach}>
                <td><{$signup_data.signup_date}></td>
            </tr>
        <{/foreach}>
    </tbody>
</table>


<{if $smarty.session.tad_signup_adm}>
    <div class="bar">
        <a href="javascript:del_action('<{$id}>')" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> 刪除活動</a>
        <a href="index.php?op=tad_signup_actions_edit&id=<{$id}>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> 編輯活動</a>
    </div>
<{/if}>
