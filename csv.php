<?php
use Xmf\Request;
use XoopsModules\Tad_signup\Tad_signup_actions;

require_once __DIR__ . '/header.php';

if (!$_SESSION['can_add']) {
    redirect_header($_SERVER['PHP_SELF'], 3, "您沒有權限使用此功能");
}

$id = Request::getInt('id');
$action = Tad_signup_actions::get($id);

if ($action['uid'] != $xoopsUser->uid()) {
    redirect_header($_SERVER['PHP_SELF'], 3, "您沒有權限使用此功能");
}

$csv = [];

$head_row = explode("\n", $action['setup']);
$head = [];
foreach ($head_row as $head_data) {
    $cols = explode(',', $head_data);
    if (strpos($cols[0], '#') === false) {
        $head[] = str_replace('*', '', trim($cols[0]));
    }
}
$head[] = '錄取';
$head[] = '報名日期';
$head[] = '身份';

$csv[] = implode(',', $head);

$content = implode("\n", $csv);
$content = mb_convert_encoding($content, 'Big5');

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename= {$action['title']}報名名單.csv");
echo $content;
exit;
