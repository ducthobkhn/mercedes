<?php
require_once DIR.'/model/dangki.php';
require_once DIR.'/model/sqlconnection.php';
//
function dangki_Get($command)
{
            $array_result=array();
    $key=md5($command);
    if(CACHE)
    {
        $mycache=ConnectCache();
        $cachecommand=$mycache->get($key);
        if($cachecommand)
        {
            $array_result=$cachecommand;
        }
        else
        {
          $result=mysqli_query(ConnectSql(),$command);
            if($result!=false)while($row=mysqli_fetch_array($result))
            {
                $new_obj=new dangki($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'dangki');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new dangki($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function dangki_getById($Id)
{
    return dangki_Get('select * from dangki where Id='.$Id);
}
//
function dangki_getByAll()
{
    return dangki_Get('select * from dangki');
}
//
function dangki_getByTop($top,$where,$order)
{
    return dangki_Get("select * from dangki ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function dangki_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return dangki_Get("SELECT * FROM  dangki ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function dangki_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return dangki_Get("SELECT dangki.Id, dangki.Title, dangki.Name, dangki.Phone, dangki.Email, dangki.Region, dangki.Created FROM  dangki ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function dangki_insert($obj)
{
    return exe_query("insert into dangki (Title,Name,Phone,Email,Region,Created) values ('$obj->Title','$obj->Name','$obj->Phone','$obj->Email','$obj->Region','$obj->Created')",'dangki');
}
//
function dangki_update($obj)
{
    return exe_query("update dangki set Title='$obj->Title',Name='$obj->Name',Phone='$obj->Phone',Email='$obj->Email',Region='$obj->Region',Created='$obj->Created' where Id=$obj->Id",'dangki');
}
//
function dangki_delete($obj)
{
    return exe_query('delete from dangki where Id='.$obj->Id,'dangki');
}
//
function dangki_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(Id) as count from dangki '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
