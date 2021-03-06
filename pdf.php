<?php
use Xmf\Request;
use XoopsModules\Tad_signup\Tad_signup_actions;
use XoopsModules\Tad_signup\Tad_signup_data;
/*-----------引入檔案區--------------*/
require_once __DIR__ . '/header.php';

if (!$_SESSION['can_add']) {
    redirect_header($_SERVER['PHP_SELF'], 3, _TAD_PERMISSION_DENIED);
}

$id = Request::getInt('id');

$action = Tad_signup_actions::get($id);

if ($action['uid'] != $xoopsUser->uid()) {
    redirect_header($_SERVER['PHP_SELF'], 3, _TAD_PERMISSION_DENIED);
}

$title = $action['title'];

$html[] = "<h1>{$title}" . _MD_TAD_SIGNUP_APPLY_LIST . "</h1>";
$html[] = '<table border="1" cellpadding="3">';

$head = Tad_signup_data::get_head($action);

$html[] = "<tr><th>" . implode("</th><th>", $head) . "</th></tr>";

$signup = Tad_signup_data::get_all($action['id']);
foreach ($signup as $signup_data) {
    $iteam = [];
    foreach ($signup_data['tdc'] as $user_data) {
        $iteam[] = implode('|', $user_data);
    }

    if ($signup_data['accept'] === '1') {
        $iteam[] = _MD_TAD_SIGNUP_ACCEPT;
    } elseif ($signup_data['accept'] === '0') {
        $iteam[] = _MD_TAD_SIGNUP_NOT_ACCEPT;
    } else {
        $iteam[] = _MD_TAD_SIGNUP_ACCEPT_NOT_YET;
    }
    $iteam[] = $signup_data['signup_date'];
    $iteam[] = $signup_data['tag'];

    $html[] = "<tr><td>" . implode("</td><td>", $iteam) . "</td></tr>";
}

$html[] = "</table>";

$html_content = implode('', $html);

require_once XOOPS_ROOT_PATH . '/modules/tadtools/tcpdf/tcpdf.php';
$pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);
$pdf->setPrintHeader(false); //不要頁首
$pdf->setPrintFooter(false); //不要頁尾
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM); //設定自動分頁
$pdf->setFontSubsetting(true); //產生字型子集（有用到的字才放到文件中）
$pdf->SetFont('droidsansfallback', '', 11, '', true); //設定字型
$pdf->SetMargins(15, 15); //設定頁面邊界，
$pdf->AddPage(); //新增頁面，一定要有，否則內容出不來

$pdf->writeHTML($html_content);

$pdf->Output("{$title}.pdf", 'D');
