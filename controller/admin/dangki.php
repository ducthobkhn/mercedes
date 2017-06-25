<?php
require_once '../../config.php';
require_once DIR.'/model/dangkiService.php';
require_once DIR.'/view/admin/dangki.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["Id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new dangki();
            $new_obj->Id=$_GET["Id"];
            dangki_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/dangki.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=dangki_getById($_GET["Id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/dangki.php');
        }
        else
        {
            $data['tab1_class']='default-tab current';
        }
    }
    else
    {
        $data['tab1_class']='default-tab current';
    }
    if(isset($_GET["action_all"]))
    {
        if($_GET["action_all"]=="ThemMoi")
        {
            $data['tab2_class']='default-tab current';
            $data['tab1_class']=' ';
        }
        else
        {
            $List_dangki=dangki_getByAll();
            foreach($List_dangki as $dangki)
            {
                if(isset($_GET["check_".$dangki->Id])) dangki_delete($dangki);
            }
            header('Location: '.SITE_NAME.'/controller/admin/dangki.php');
        }
    }
    if(isset($_POST["Title"])&&isset($_POST["Name"])&&isset($_POST["Phone"])&&isset($_POST["Email"])&&isset($_POST["Region"])&&isset($_POST["Created"]))
    {
       $array=$_POST;
       if(!isset($array['Id']))
       $array['Id']='0';
       if(!isset($array['Title']))
       $array['Title']='0';
       if(!isset($array['Name']))
       $array['Name']='0';
       if(!isset($array['Phone']))
       $array['Phone']='0';
       if(!isset($array['Email']))
       $array['Email']='0';
       if(!isset($array['Region']))
       $array['Region']='0';
       if(!isset($array['Created']))
       $array['Created']='0';
      $new_obj=new dangki($array);
        if($insert)
        {
            dangki_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/dangki.php');
        }
        else
        {
            $new_obj->Id=$_GET["Id"];
            dangki_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/dangki.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=dangki_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=dangki_getByPagingReplace($data['page'],20,'Id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_dangki($data);
}
else
{
     header('location: '.SITE_NAME);
}
