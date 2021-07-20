<?php
namespace XoopsModules\Tad_signup;

class Update
{
    // 建立群組
    public static function mk_group($name = "")
    {
        global $xoopsDB;
        $sql = "select groupid from " . $xoopsDB->prefix("groups") . " where `name`='$name'";
        $result = $xoopsDB->query($sql) or Utility::web_error($sql, __FILE__, __LINE__);
        list($groupid) = $xoopsDB->fetchRow($result);
        if (empty($groupid)) {
            $sql = "insert into " . $xoopsDB->prefix("groups") . " (`name`) values('{$name}')";
            $xoopsDB->queryF($sql) or Utility::web_error($sql, __FILE__, __LINE__);
            //取得最後新增資料的流水編號
            $groupid = $xoopsDB->getInsertId();
        }
        return $groupid;
    }

    // 進行某些檢查
    public static function chk_1()
    {
        global $xoopsDB;
        // $sql = 'SELECT count(*) FROM ' . $xoopsDB->prefix('資料表名') . ' ';
        // $result = $xoopsDB->query($sql);
        // if (empty($result)) {
        //     return true;
        // }

        return false;
    }

    // 執行某些調整
    public static function go_1()
    {
        global $xoopsDB;
        // $sql = 'ALTER TABLE ' . $xoopsDB->prefix('資料表名') . '';
        // $xoopsDB->queryF($sql) or redirect_header(XOOPS_URL . '/modules/system/admin.php?fct=modulesadmin', 30, $xoopsDB->error());
    }
}
