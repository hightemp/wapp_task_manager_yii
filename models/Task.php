<?php
namespace app\models;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * @property string title
 * @property int creator_id
 * @property string short_description
 * @property string description
 */
class Task extends ActiveRecord {
    public static function tableName()
    {
        return '{{%tasks}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function getCreator()
    {
        return $this->hasOne(User::class, ['id' => 'creator_id']);
    }
}