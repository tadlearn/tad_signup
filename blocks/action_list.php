<?php
use XoopsModules\Tad_signup\Tad_signup_actions;

// 可報名活動一覽
function action_list()
{
    $block = Tad_signup_actions::get_all(true);
    return $block;
}

// 可報名活動一覽的編輯函式
function action_list_edit()
{

}
