<?php
xoops_loadLanguage('main', 'tadtools');

define('_MD_TAD_SIGNUP_ID', '編號');
define('_MD_TAD_SIGNUP_TITLE', '活動名稱');
define('_MD_TAD_SIGNUP_DETAIL', '活動說明');
define('_MD_TAD_SIGNUP_ACTION_DATE', '活動日期');
define('_MD_TAD_SIGNUP_NUMBER', '報名人數');
define('_MD_TAD_SIGNUP_NUMBER_OF_APPLIED', '已報名人數');
define('_MD_TAD_SIGNUP_END_DATE', '報名截止');
define('_MD_TAD_SIGNUP_END_DATE_COL', '報名截止日');
define('_MD_TAD_SIGNUP_STATUS', '報名狀況');
define('_MD_TAD_SIGNUP_CANDIDATES_QUOTA', '可候補人數');
define('_MD_TAD_SIGNUP_SETUP', '欄位設定');
define('_MD_TAD_SIGNUP_ENABLE', '是否啟用');
define('_MD_TAD_SIGNUP_UPLOADS', '上傳附件');
define('_MD_TAD_SIGNUP_APPLY_NOW', '立即報名');
define('_MD_TAD_SIGNUP_CANDIDATE', '候補');
define('_MD_TAD_SIGNUP_ACCEPT', '錄取');
define('_MD_TAD_SIGNUP_NOT_ACCEPT', '未錄取');
define('_MD_TAD_SIGNUP_ACCEPT_NOT_YET', '尚未設定');
define('_MD_TAD_SIGNUP_ANNOUNCEMENT_NOT_YET', '尚未公佈');
define('_MD_TAD_SIGNUP_APPLY_LIST', '報名名單');
define('_MD_TAD_SIGNUP_APPLY_DATE', '報名日期');
define('_MD_TAD_SIGNUP_IDENTITY', '身份');
define('_MD_TAD_SIGNUP_ADMIN', '活動報名管理');
define('_MD_TAD_SIGNUP_CREATE_SUCCESS', '成功建立活動！');
define('_MD_TAD_SIGNUP_UPDATE_SUCCESS', '成功修改活動！');
define('_MD_TAD_SIGNUP_DESTROY_SUCCESS', '成功刪除活動！');
define('_MD_TAD_SIGNUP_DESTROY_ACTION', '刪除活動');
define('_MD_TAD_SIGNUP_EDIT_ACTION', '編輯活動');
define('_MD_TAD_SIGNUP_EXPORT_HTML', '匯出 HTML');
define('_MD_TAD_SIGNUP_APPLY_SUCCESS', '成功報名活動！');
define('_MD_TAD_SIGNUP_APPLY_UPDATE_SUCCESS', '成功修改報名資料！');
define('_MD_TAD_SIGNUP_APPLY_DESTROY_SUCCESS', '成功刪除報名資料！');
define('_MD_TAD_SIGNUP_ACCEPT_SUCCESS', '成功設定錄取狀態！');
define('_MD_TAD_SIGNUP_IMPORT_SUCCESS', '成功匯入報名資料！');
define('_MD_TAD_SIGNUP_MY_RECORD', '我的報名紀錄');
define('_MD_TAD_SIGNUP_SIGNIN_TABLE', '簽到表');
define('_MD_TAD_SIGNUP_SIGNIN', '簽名');
define('_MD_TAD_SIGNUP_ACTION_SETTING', '活動設定');
define('_MD_TAD_SIGNUP_KEYIN', '請輸入');
define('_MD_TAD_SIGNUP_ACTION_LIST', '活動列表');
define('_MD_TAD_SIGNUP_IN_PROGRESS', '報名中');
define('_MD_TAD_SIGNUP_CANT_APPLY', '無法報名');
define('_MD_TAD_SIGNUP_ADD_ACTION', '新增活動');
define('_MD_TAD_SIGNUP_APPLIED_DATA', '已報名表資料');
define('_MD_TAD_SIGNUP_APPLY_MAX', '報名人數上限');
define('_MD_TAD_SIGNUP_NAME', '姓名');
define('_MD_TAD_SIGNUP_CHANGE_TO', '改成');
define('_MD_TAD_SIGNUP_EXPORT_SIGNIN_TABLE', '產生簽到表');
define('_MD_TAD_SIGNUP_EXPORT_APPLY_LIST', '匯出報名名單');
define('_MD_TAD_SIGNUP_IMPORT_APPLY_LIST', '匯入報名名單');
define('_MD_TAD_SIGNUP_IMPORT', '匯入');
define('_MD_TAD_SIGNUP_DOWNLOAD', '下載');
define('_MD_TAD_SIGNUP_IMPORT_FILE', '匯入格式檔');
define('_MD_TAD_SIGNUP_APPLY_FORM', '報名表');
define('_MD_TAD_SIGNUP_ACCEPT_STATUS', '錄取狀況');

// class\Tad_signup_data.php
define('_MD_TAD_SIGNUP_CANNOT_BE_MODIFIED', '查無報名無資料，無法修改');
define('_MD_TAD_SIGNUP_END', '已報名截止，無法再進行報名或修改報名');
define('_MD_TAD_SIGNUP_CLOSED', '該報名已關閉，無法再進行報名或修改報名');
define('_MD_TAD_SIGNUP_FULL', '人數已滿，無法再進行報名');
define('_MD_TAD_SIGNUP_CANT_WATCH', '查無報名資料，無法觀看');
define('_MD_TAD_SIGNUP_NO_TITLE', '無標題');
define('_MD_TAD_SIGNUP_NO_CONTENT', '無內容');
define('_MD_TAD_SIGNUP_UNABLE_TO_SEND', '無編號，無法寄送通知信');
define('_MD_TAD_SIGNUP_DESTROY_TITLE', '「%s」取消報名通知');
define('_MD_TAD_SIGNUP_DESTROY_HEAD', '<p>您於 %s 報名「%s}」活動已於 %s 由 %s 取消報名。</p>');
define('_MD_TAD_SIGNUP_DESTROY_FOOT', '欲重新報名，請連至 ');
define('_MD_TAD_SIGNUP_STORE_TITLE', '「%s」報名完成通知');
define('_MD_TAD_SIGNUP_STORE_HEAD', '<p>您於 %s 報名「%s」活動已於 %s 由 %s 報名完成。</p>');
define('_MD_TAD_SIGNUP_FOOT', '完整詳情，請連至 ');
define('_MD_TAD_SIGNUP_UPDATE_TITLE', '「%s」修改報名資料通知');
define('_MD_TAD_SIGNUP_UPDATE_HEAD', '<p>您於 %s 報名「%s」活動已於 %s 由 %s 修改報名資料如下：</p>');
define('_MD_TAD_SIGNUP_ACCEPT_TITLE', '「%s」報名錄取狀況通知');
define('_MD_TAD_SIGNUP_ACCEPT_HEAD1', '<p>您於 %s 報名「%s」活動經審核，<h2 style="color:blue">恭喜錄取！</h2>您的報名資料如下：</p>');
define('_MD_TAD_SIGNUP_ACCEPT_HEAD0', '<p>您於 %s 報名「%s」活動經審核，很遺憾的通知您，因名額有限，<span style="color:red;">您並未錄取。</span>您的報名資料如下：</p>');
define('_MD_TAD_SIGNUP_FAILED_TO_SEND', '通知信寄發失敗！');
define('_MD_TAD_SIGNUP_UNABLE_TO_OPEN', '無法開啟');
