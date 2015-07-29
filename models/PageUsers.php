<?php

namespace app\models;

use Yii;
use yii\base\Model;


class PageUsers extends Model{

    public $countUser;
    public $pageSize = 5;
    public $orderby = 'id asc';
    public $sort = 'asc';
    public $currentPage = 1;
    public $arrow = 'arrow-down';

    public function __construct()
    {
        $users = Yii::$app->db->createCommand('SELECT * FROM user')->queryColumn();
        $this->countUser = count($users);
    }

    public function PageUser($params)
    {

        $orderby = 'id asc';
        $currentPage = 1;

        if(!empty($params['page']) && $params['page'] > 1)
        {
            $currentPage = $params['page'];
        }


        if(!empty($params['orderby'])  && !empty($params['sort']) && $params['orderby'] == 'asc')
        {
            $orderby = $params['sort'].' desc';
            $this->sort = 'desc';
            $this->arrow = 'arrow-up';
        }

        $currentUsers =  ($currentPage-1) * $this->pageSize;

        $this->currentPage = $currentPage;

        $pageUser =  Yii::$app->db->createCommand('SELECT * FROM user order by '.$orderby.' limit '.$currentUsers.','.$this->pageSize)->queryAll();

        return $pageUser;

    }


}