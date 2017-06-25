<?php
require_once DIR . '/common/paging.php';
require_once DIR . '/common/cls_fast_template.php';
function view_index($data)
{
    $ft = new FastTemplate(DIR . '/view/admin/templates');
    $ft->assign('USER-NAME', isset($data['username']) ? $data['username'] : '');
    $ft->define('header', 'header.tpl');
    $ft->define('body', 'body.tpl');
    $ft->define('footer', 'footer.tpl');

    $ft->assign('TAB1-CLASS', "");
    $ft->assign('TAB2-CLASS', "current");


    $ft->assign('NOTIFICATION-CONTENT', isset($data['notififation_content']) ? $data['notififation_content'] : '');
    $ft->assign('TABLE-HEADER', '');
    $ft->assign('PAGING', '');
    $ft->assign('TABLE-BODY', '');
    $ft->assign('TABLE-NAME', ' Dashboard');
    $ft->assign('CONTENT-BOX-LEFT', isset($data['content_box_left']) ? $data['content_box_left'] : '');
    $ft->assign('CONTENT-BOX-RIGHT', isset($data['content_box_right']) ? $data['content_box_right'] : ' ');
    $ft->assign('NOTIFICATION', isset($data['notification']) ? $data['notification'] : ' ');
    $ft->assign('SITE-NAME', isset($data['sitename']) ? $data['sitename'] : SITE_NAME);
    $ft->assign('an', 'hidden');
    $ft->assign('kichhoat', 'active');
    $ft->assign('FORM', showFrom('', ''));
    //
    print $ft->parse_and_return('header');
    print $ft->parse_and_return('body');
    print $ft->parse_and_return('footer');
}

function showFrom($form, $ListKey = array())
{
    $str_from = '';
    $str_from .= '<div class="row-fluid">';
    $str_from .= '<div class="span12">';
    $str_from .= '<ul class="widgeticons row-fluid">';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/admin.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/admin.png" alt="" class=""><span>Tài khoản quản trị</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/dangki.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/user.png" alt="" class=""><span>Đăng kí nhận quà</span></a></li>';

    $str_from .= '</ul></div></div>';
    return $str_from;
}
