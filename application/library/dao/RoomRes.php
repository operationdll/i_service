<?php
class Dao_RoomRes extends Dao_Base{
    
    public function __construct(){
        parent::__construct();
    }
    
    /**
     * 查询hotel_room_res列表
     * @param array 入参
     * @return array
     */
    public function getRoomResList(array $param):array {
        $limit = $param['limit']?intval($param['limit']):0;
        $page = $this->getStart($param['page'],$limit);
        $sql = "select * from hotel_room_res limit {$page},{$limit}";
        $result = $this->db->fetchAll($sql, array());
        return is_array($result)?$result:array();
    }

    /**
     * 根据id查询hotel_room_res详情
     * @param int id 
     * @return array
     */
    public function getRoomResDetail (int $id):array{
        $result = array ();
        
        if ($id){
            $sql = "select * from hotel_room_res where id=?";
            $result = $this->db->fetchAssoc($sql,array($id));
        }

        return $result;
    }

    /**
     * 根据id更新hotel_room_res
     * @param array 需要更新的数据
     * @param int id 
     * @return array
     */
    public function updateRoomResById(array $info,int $id){
        $result = false;

        if ($id){
            $result = $this->db->update('hotel_room_res',$info,$id);
        }

        return $result;
    }

    /**
     * 单条增加hotel_room_res数据
     * @param array
     * @return int id
     */
    public function addRoomRes(array $info){
        $this->db->insert('hotel_room_res', $info);
        return $this->db->lastInsertId();
    }
}