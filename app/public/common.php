<?php
//htmlspecialchars関数
function h($var)
{
    if (!empty($var)) {
        if (is_array($var)) {
            return array_map('h', $var);
        } else {
            return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
        }
    }else{
        return null;
    }
}
//ajaxからのアクセスかどうか
function isAjax(){
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        return true;
    }
    return false;
}

?>