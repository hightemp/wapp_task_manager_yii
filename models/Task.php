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

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['creator_id'], 'integer'],
            [['title', 'short_description', 'description', 'status'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'short_description' => 'Краткое описание',
            'description' => 'Описание',
            'status' => 'Статус',
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
}