<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $auth_id
 * @property integer $post_id
 * @property string $auth_nick
 * @property string $auth_email
 * @property string $title
 * @property string $text
 * @property string $short_text
 * @property string $status
 * @property string $date
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auth_nick', 'title', 'text', 'auth_email'], 'required', 'on' => 'create'],
            [['title', 'text'], 'required', 'on' => 'update'],
            [['auth_id', 'post_id'], 'integer'],
            [['text', 'status'], 'string'],
            [['date'], 'safe'],
            ['auth_email', 'email'],
            [['auth_nick'], 'string', 'max' => 20],
            [['auth_email', 'title'], 'string', 'max' => 30],
            [['short_text'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth_id' => 'Auth ID',
            'post_id' => 'Post ID',
            'auth_nick' => 'Auth Nick',
            'auth_email' => 'Auth Email',
            'title' => 'Title',
            'text' => 'Text',
            'short_text' => 'Short Text',
            'status' => 'Status',
            'date' => 'Date',
        ];
    }
}
