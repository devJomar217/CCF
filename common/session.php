<?php
session_start();
$GLOBALS['login_dir'] = '/public/login/index.php';
$GLOBALS['home_dir'] = '/public/forum/index.php';
$GLOBALS['admin_dir'] = '/public/admin/index.php';
$GLOBALS['user_type_student'] = '1';
$GLOBALS['user_type_admin'] = '2';
$GLOBALS['user_type_special'] = '3';
$GLOBALS['user_type_guest'] = '4';
// DEV
$GLOBALS['page_login'] = 'http://code-connect.tech/public/login/index.php';
$GLOBALS['page_create_special_account'] = 'http://code-connect.tech/public/login/form-create-special-account.php';
$GLOBALS['page_student'] = 'http://code-connect.tech/public/forum/index.php';
$GLOBALS['page_admin'] = 'http://code-connect.tech/public/admin/index.php';

//PROD
// $GLOBALS['page_login'] = 'http://code-connect.tech/public/login/index.php';
// $GLOBALS['page_student'] = 'http://code-connect.tech/public/student/index.php';
// $GLOBALS['page_admin'] = 'http://code-connect.tech/public/admin/index.php';

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
            } else if($_SESSION['user_type'] == $GLOBALS['user_type_student'] ||
            $_SESSION['user_type'] == $GLOBALS['user_type_special'] ||
            $_SESSION['user_type'] == $GLOBALS['user_type_guest']) {
                if(!isHomePage()){
                    redirect($GLOBALS['page_student']);
                }
            }
        }
    }
}

redirectUser();
?>