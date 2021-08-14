<?php
use Xmf\Request;
use XoopsModules\Tad_signup\Tad_signup_actions;
use \PhpOffice\PhpWord\TemplateProcessor;
/*-----------引入檔案區--------------*/
require_once __DIR__ . '/header.php';
require_once XOOPS_ROOT_PATH . '/modules/tadtools/vendor/autoload.php';

if (!$_SESSION['can_add']) {
    redirect_header($_SERVER['PHP_SELF'], 3, "您沒有權限使用此功能");
}

$id = Request::getInt('id');
$action = Tad_signup_actions::get($id);

$templateProcessor = new TemplateProcessor("signup.docx");
$templateProcessor->setValue('title', $action['title']);
$templateProcessor->setValue('detail', strip_tags($action['detail']));
$templateProcessor->setValue('action_date', $action['action_date']);
$templateProcessor->setValue('end_date', $action['end_date']);
$templateProcessor->setValue('number', $action['number']);
$templateProcessor->setValue('candidate', $action['candidate']);
$templateProcessor->setValue('signup', count($action['signup']));
$templateProcessor->setValue('url', XOOPS_URL . "/modules/tad_signup/index.php?op=tad_signup_data_create&amp;action_id={$action['id']}");
// $templateProcessor->saveAs("{$action['title']}報名名單.docx");

header('Content-Type: application/vnd.ms-word');
header("Content-Disposition: attachment;filename={$action['title']}報名名單.docx");
header('Cache-Control: max-age=0');
$templateProcessor->saveAs('php://output');
