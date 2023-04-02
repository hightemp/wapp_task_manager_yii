<?php
namespace app\models;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * @property string title
 * @property int task_id
 * @property int creator_id
 * @property string comment
 */
class Comment extends ActiveRecord {
    public static function tableName()
    {
        return '{{%comments}}';
    }

    public function rules()
    {
        return [
            [['creator_id', 'task_id'], 'integer'],
            [['comment'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'comment' => 'Комментарий',

            'created_at' => 'Создана',
            'updated_at' => 'Обновлена',
        ];
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

    public function getTask()
    {
        return $this->hasOne(User::class, ['id' => 'task_id']);
    }
}