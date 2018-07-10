<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $offers_id
 * @property string $comment
 * @property string $user
 * @property int $isapproved
 * @property string $created_at
 *
 * @property Offers $offers
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['offers_id', 'isapproved'], 'integer'],
            [['created_at'], 'safe'],
            [['comment', 'user'], 'string', 'max' => 255],
            [['offers_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Offers::className(),
                'targetAttribute' => ['offers_id' => 'admin_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'offers_id' => 'Offers ID',
            'comment' => 'Comment',
            'user' => 'User',
            'isapproved' => 'Isapproved',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffers()
    {
        return $this->hasOne(Offers::className(), ['admin_id' => 'offers_id']);
    }

    public function saveComment($offers_id) {
        $comment = new Comments();
        $comment->comment = $this->comment;

        if (Yii::$app->user->isGuest) {
            $comment->user = "guest";
        } else {
<<<<<<< HEAD
            $comment->user = Yii::$app->user->identity->username;
=======
            $comment->user = Yii::$app->user->identityClass->username;
>>>>>>> 2950e937746f0931d0afe4ab045a6a0d6d4c0bbb
        }
        $comment->offers_id = $offers_id;
        $comment->isapproved = 0;
        echo var_export($comment);
        return $comment->save();


    }
}
