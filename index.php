<?php
use Xmf\Request;
use XoopsModules\Tadtools\Utility;
use XoopsModules\Tad_signup\Tad_signup_actions;
use XoopsModules\Tad_signup\Tad_signup_data;

/*-----------引入檔案區--------------*/
require_once __DIR__ . '/header.php';
$GLOBALS['xoopsOption']['template_main'] = 'tad_signup_index.tpl';
require_once XOOPS_ROOT_PATH . '/header.php';

/*-----------變數過濾----------*/
$op = Request::getString('op');
$id = Request::getInt('id');
$action_id = Request::getInt('action_id');
$accept = Request::getInt('accept');

/*-----------執行動作判斷區----------*/
switch ($op) {

    //新增活動表單
    case 'tad_signup_actions_create':
        Tad_signup_actions::create();
        break;

    //新增活動資料
    case 'tad_signup_actions_store':
        $id = Tad_signup_actions::store();
        // header("location: {$_SERVER['PHP_SELF']}?id=$id");
        redirect_header($_SERVER['PHP_SELF'] . "?id=$id", 3, "成功建立活動！");
        exit;

    //修改用表單
    case 'tad_signup_actions_edit':
        Tad_signup_actions::create($id);
        $op = 'tad_signup_actions_create';
        break;

    //更新資料
    case 'tad_signup_actions_update':
        Tad_signup_actions::update($id);
        // header("location: {$_SERVER['PHP_SELF']}?id=$id");
        redirect_header($_SERVER['PHP_SELF'] . "?id=$id", 3, "成功修改活動！");
        exit;

    //刪除資料
    case 'tad_signup_actions_destroy':
        Tad_signup_actions::destroy($id);
        // header("location: {$_SERVER['PHP_SELF']}");
        redirect_header($_SERVER['PHP_SELF'], 3, "成功刪除活動！");
        exit;

    //新增報名表單
    case 'tad_signup_data_create':
        Tad_signup_data::create($action_id);
        break;

    //新增報名資料
    case 'tad_signup_data_store':
        $id = Tad_signup_data::store();
        Tad_signup_data::mail($id, 'store');
        redirect_header("{$_SERVER['PHP_SELF']}?op=tad_signup_data_show&id=$id", 3, "成功報名活動！");
        break;

    //顯示報名表
    case 'tad_signup_data_show':
        Tad_signup_data::show($id);
        break;

    //修改報名表單
    case 'tad_signup_data_edit':
        Tad_signup_data::create($action_id, $id);
        $op = 'tad_signup_data_create';
        break;

    //更新報名資料
    case 'tad_signup_data_update':
        Tad_signup_data::update($id);
        Tad_signup_data::mail($id, 'update');
        redirect_header($_SERVER['PHP_SELF'] . "?op=tad_signup_data_show&id=$id", 3, "成功修改報名資料！");
        exit;

    //刪除報名資料
    case 'tad_signup_data_destroy':
        $uid = $_SESSION['can_add'] ? null : $xoopsUser->uid();
        $signup = Tad_signup_data::get($id, $uid);
        Tad_signup_data::destroy($id);
        Tad_signup_data::mail($id, 'destroy', $signup);
        redirect_header($_SERVER['PHP_SELF'] . "?id=$action_id", 3, "成功刪除報名資料！");
        exit;

    //更改錄取狀態
    case 'tad_signup_data_accept':
        Tad_signup_data::accept($id, $accept);
        Tad_signup_data::mail($id, 'accept');
        redirect_header($_SERVER['PHP_SELF'] . "?id=$action_id", 3, "成功設定錄取狀態！");
        exit;

    // 複製活動
    case 'tad_signup_actions_copy':
        $new_id = Tad_signup_actions::copy($id);
        header("location: {$_SERVER['PHP_SELF']}?op=tad_signup_actions_edit&id=$new_id");
        exit;

    default:
        if (empty($id)) {
            Tad_signup_actions::index($xoopsModuleConfig['only_enable']);
            $op = 'tad_signup_actions_index';
        } else {
            Tad_signup_actions::show($id);
            $op = 'tad_signup_actions_show';
        }
        break;
}

/*-----------function區--------------*/

/*-----------秀出結果區--------------*/
unset($_SESSION['api_mode']);
$xoopsTpl->assign('toolbar', Utility::toolbar_bootstrap($interface_menu));
$xoopsTpl->assign('now_op', $op);
$xoTheme->addStylesheet(XOOPS_URL . '/modules/tad_signup/css/module.css');
require_once XOOPS_ROOT_PATH . '/footer.php';
