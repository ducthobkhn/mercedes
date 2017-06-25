<?php
require_once DIR.'/view/default/public.php';
function show_index($data=array())
{
    $asign=array();

//    $asign['trangchu_mn'] = ($data['active'] == 'trangchu') ? 'active' : '';

    print_template($asign,'index');
}
