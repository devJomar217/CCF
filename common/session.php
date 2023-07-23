<?php
session_start();
$GLOBALS['login_dir'] = '/ccf/component/login/index.php';
$GLOBALS['home_dir'] = '/ccf/component/student/index.php';
$GLOBALS['admin_dir'] = '/ccf/component/admin/index.php';
$GLOBALS['user_type_student'] = '1';
$GLOBALS['user_type_admin'] = '2';
$GLOBALS['page_login'] = 'http://localhost/ccf/component/login/index.php';
$GLOBALS['page_student'] = 'http://localhost/ccf/component/student/index.php';
$GLOBALS['page_admin'] = 'http://localhost/ccf/component/admin/index.php';

function redirect($url) {
    header('Location: '.$url);
    exit();
}

function isLoginPage(){
    return $_SERVER['PHP_SELF'] == $GLOBALS['login_dir'];
}

function isHomePage(){
    return $_SERVER['PHP_SELF'] == $GLOBALS['home_dir'];
}

function isAdminPage(){
    return $_SERVER['PHP_SELF'] == $GLOBALS['admin_dir'];
}

function hasLoggedInUser(){
    return isset($_SESSION['user_name']);
}

function isAdminAccount(){
    return $_SESSION['user_type'] == $GLOBALS['user_type_admin'];
}

function redirectUser(){
    // echo print_r($_SESSION);
    // echo print_r($_SERVER);
    if(isLoginPage()){
        if(hasLoggedInUser()){
            if(isAdminAccount()){
                redirect($GLOBALS['page_admin']);
            } else {
                redirect($GLOBALS['page_student']);
            }
        }
    } else {
        if(!hasLoggedInUser()){
            redirect($GLOBALS['page_login']);
        } else {
            if($_SESSION['user_type'] == $GLOBALS['user_type_admin']){
                if(!isAdminPage()){
                    redirect($GLOBALS['page_admin']);
                }
            } else if($_SESSION['user_type'] == $GLOBALS['user_type_student']) {
                if(!isHomePage()){
                    redirect($GLOBALS['page_student']);
                }
            }
        }
    }
}

redirectUser();
?>