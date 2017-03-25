<?php

/**
 * 用户convertor
 * @author ZXM
 */
class Convertor_User extends Convertor_Base {

    public function __construct() {
        parent::__construct();
    }
    
    public function userInfoConvertor($list){
        $data = array();
        $platformNameList = Enum_Platform::getPlatformNameList();
        $data['id'] = $list['id'];
        $data['hotelid'] = $list['hotelid'];
        $data['groupid'] = $list['groupid'];
        $data['oid'] = $list['oid'];
        $data['createtime'] = $list['createtime'];
        $data['lastlogintime'] = $list['lastlogintime'];
        $data['lastloginip'] = Util_Tools::ntoip($list['lastloginip']);
        $data['platform'] = $list['platform'];
        $data['platformName'] = $platformNameList[$list['platform']];
        $data['identity'] = $list['identity'];
        $data['language'] = $list['language'];
        $data['token'] = $list['token'];
        return $data;
    }
}