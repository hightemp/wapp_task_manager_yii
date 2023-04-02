<?php

namespace app\controllers;

use app\models\User;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $usersDataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $usersDataProvider->setSort([
            'defaultOrder' => [
                'id' => SORT_DESC,
            ],
        ]);

        return $this->render('index', [
            'usersDataProvider' => $usersDataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = User::findOne($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionLoadData($q = null)
    {
        $data = User::find()
            ->andWhere(['like', 'username', $q])
            ->select(['id', 'username as text'])
            ->asArray()
            ->limit(10)
            ->all();

        return Json::encode(['results' => $data]);
    }
}
