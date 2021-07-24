<?php
use Xmf\Request;
use XoopsModules\Tadtools\Utility;
use XoopsModules\Tad_signup\Tad_signup_actions;

require_once __DIR__ . '/header.php';

$id = Request::getInt('id');

$action = Tad_signup_actions::get($id);

header("Content-type: text/html");
// header("Content-Disposition: attachment; filename= {$action['title']}.html");

$content = "
<h2 class='my'>
    {$action['title']}
</h2>
<div class='alert alert-info'>
    {$action['detail']}
</div>
{$action['files']}
<h4 class='my'>
    <small>
        <div><i class='fa fa-calendar' aria-hidden='true'></i> 活動日期：{$action['action_date']}</div>
        <div><i class='fa fa-calendar-check-o' aria-hidden='true'></i> 報名截止：{$action['end_date']}</div>
        <div>
            <i class='fa fa-users' aria-hidden='true'></i> 報名狀況：" . count($action['signup']) . "/{$action['number']}
            <span data-toggle='tooltip' title='可候補人數'>({$action['candidate']})</span>
        </div>
    </small>
</h4>

<div class='text-center my-3'>
    <a href='" . XOOPS_URL . "/modules/tad_signup/index.php?op=tad_signup_data_create&action_id={$action['id']}' class='btn btn-lg btn-info'><i class='fa fa-plus' aria-hidden='true'></i> 立即報名</a>
</div>
";

$content = Utility::html5($content, false, true, 4, true, 'container', $action['title'], '<link rel="stylesheet" href="' . XOOPS_URL . '/modules/tad_signup/css/module.css" type="text/css" >');
// echo $content;

if (file_put_contents(XOOPS_ROOT_PATH . "/uploads/tad_signup/{$action['id']}.html", $content)) {
    header("location: " . XOOPS_URL . "/uploads/tad_signup/{$action['id']}.html");
}
exit;
