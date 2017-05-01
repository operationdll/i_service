<?php

class RoomtypeController extends \BaseController {

    /**
     * @var RoomtypeModel
     */
    private $model;
    /**
     * @var Convertor_Roomtype
     */
    private $convertor;

    public function init() {
        parent::init();
        $this->model = new RoomtypeModel();
        $this->convertor = new Convertor_Roomtype();
    }

    /**
     * 获取Roomtype列表
     *
     * @return Json
     */
    public function getRoomtypeListAction() {
        $param = array();
        $param['page'] = intval($this->getParamList('page', 1));
        $param['limit'] = intval($this->getParamList('limit', 5));
        $param['id'] = intval($this->getParamList('id'));
        $param['hotelid'] = intval($this->getParamList('hotelid'));
        $param['title'] = trim($this->getParamList('title'));
        if (is_null($param['status'])) {
            unset($param['status']);
        }
        $data = $this->model->getRoomtypeList($param);
        $count = $this->model->getRoomtypeCount($param);
        $data = $this->convertor->getRoomtypeListConvertor($data, $count, $param);
        $this->echoSuccessData($data);
    }


    /**
     * 根据id获取Roomtype详情
     * @param int id 获取详情信息的id
     * @return Json
     */
    public function getRoomtypeDetailAction() {
        $id = intval($this->getParamList('id'));
        if ($id) {
            $data = $this->model->getRoomtypeDetail($id);
            $data = $this->convertor->getRoomtypeDetail($data);
        } else {
            $this->throwException(1, '查询条件错误，id不能为空');
        }
        $this->echoJson($data);
    }

    /**
     * 根据id修改Roomtype信息
     * @param int id 获取详情信息的id
     * @param array param 需要更新的字段
     * @return Json
     */
    public function updateRoomtypeByIdAction() {
        $id = intval($this->getParamList('id'));
        if ($id) {
            $param = array();
            $param['title_lang1'] = $this->getParamList('title_lang1');
            $param['title_lang2'] = $this->getParamList('title_lang2');
            $param['title_lang3'] = $this->getParamList('title_lang3');
            $param['size'] = $this->getParamList('size');
            $param['detail_lang1'] = $this->getParamList('detail_lang1');
            $param['detail_lang2'] = $this->getParamList('detail_lang2');
            $param['detail_lang3'] = $this->getParamList('detail_lang3');
            $param['panoramic'] = $this->getParamList('panoramic');
            $param['bedtype_lang1'] = $this->getParamList('bedtype_lang1');
            $param['bedtype_lang2'] = $this->getParamList('bedtype_lang2');
            $param['bedtype_lang3'] = $this->getParamList('bedtype_lang3');
            $param['hotelid'] = $this->getParamList('hotelid');
            $param['resid_list'] = $this->getParamList('resid_list');
            $data = $this->model->updateRoomtypeById($param, $id);
            $data = $this->convertor->statusConvertor($data);
        } else {
            $this->throwException(1, 'id不能为空');
        }
        $this->echoSuccessData($data);
    }

    /**
     * 添加Roomtype信息
     * @param array param 需要新增的信息
     * @return Json
     */
    public function addRoomtypeAction() {
        $param = array();
        $param['title_lang1'] = trim($this->getParamList('title_lang1'));
        $param['title_lang2'] = trim($this->getParamList('title_lang2'));
        $param['title_lang3'] = trim($this->getParamList('title_lang3'));
        $param['size'] = floatval($this->getParamList('size'));
        $param['panoramic'] = trim($this->getParamList('panoramic'));
        $param['hotelid'] = intval($this->getParamList('hotelid'));
        $param['bedtype_lang1'] = trim($this->getParamList('bedtype_lang1'));
        $param['bedtype_lang2'] = trim($this->getParamList('bedtype_lang2'));
        $param['bedtype_lang3'] = trim($this->getParamList('bedtype_lang3'));
        $data = $this->model->addRoomtype($param);
        $data = $this->convertor->statusConvertor(array(
            'id' => $data
        ));
        $this->echoSuccessData($data);
    }

}
