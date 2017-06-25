<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:40 PM
 */
if(!defined('SITE_NAME'))
{
    require_once '../../config.php';
}

require_once DIR.'/common/upload_image.php';
require_once(DIR."/common/hash_pass.php");
require_once(DIR."/common/redict.php");
require_once (DIR.'/view/default/index.php');
require_once (DIR.'/model/dangki.php');
require_once (DIR.'/model/dangkiService.php');
$data =array();

if(isset($_POST['title']))
{
    $data['title']=  $title=addslashes(strip_tags($_POST['title']));
    $data['name']= $name=addslashes(strip_tags($_POST['name']));
    $data['phone'] =$phone=addslashes(strip_tags($_POST['phone']));
    $data['email'] =$email=addslashes(strip_tags($_POST['email']));
    $data['region'] = $region=addslashes(strip_tags($_POST['region']));






    if($title==""||$name==""||$phone==""||$email=="")
    {

            echo "<script>alert('Quý khách vui lòng nhập đầy đủ thông tin ')</script>";

    }
    else
    {

        $new = new dangki();

        $new->Title=$title;
        $new->Name=$email;
        $new->Phone=$phone;
        $new->Email=$email;
        $new->Region=$region;
        $new->Created=date(DATETIME_FORMAT);
        dangki_insert($new);
        $link_web=SITE_NAME;

        echo "<script>alert('Qúy khách đăng kí thành công')</script>";


    }
}
show_index($data,'');
