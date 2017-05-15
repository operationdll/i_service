<?php

/**
 * Class RoomtypePicModel
 * 房型图片
 */
class RoomtypePicModel extends \BaseModel {

    private $dao;

    public function __construct(){
        parent::__construct();
        $this->dao = new Dao_RoomtypePic();
    }
    
    /**
     * 获取RoomtypePic列表信息
     * @param array param 查询条件
     * @return array
     */
    public function getRoomtypePicList(array $param){
        $paramList['limit'] = $param['limit'];
        $paramList['page'] = $param['page'];
        return $this->dao->getRoomtypePicList($paramList);
    }

    /**
     * 根据id查询RoomtypePic信息
     * @param int id 查询的主键
     * @return array
     */
    public function getRoomtypePicDetail($id){
        $result = array();
        if ($id){
            $result = $this->dao->getRoomtypePicDetail($id);
        }
        return $result;
    }

    /**
     * 根据id更新RoomtypePic信息
     * @param array param 需要更新的信息
     * @param int id 主键
     * @return array
     */
    public function updateRoomtypePicById($param,$id){
        $result = false;
        if ($id){
            $info['age'] = intval($param['age']);
            $result = $this->dao->updateRoomtypePicById($info,$id);
        }
        return $result;
    }

    /**
     * RoomtypePic新增信息
     * @param array param 需要增加的信息
     * @return array
     */
    public function addRoomtypePic($param){
        $info['age'] = intval($param['age']);
        return $this->dao->addRoomtypePic($info);
    }
}
