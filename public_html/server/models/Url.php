<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "url".
 *
 * @property int $idurl
 * @property string $url
 * @property string $shorter_url
 * @property int $redirect_limit
 * @property int $shorter_url_lifetime
 * @property string|null $time_create
 *
 * @property UrlTransitions[] $urlTransitions
 */
class Url extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'url';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'shorter_url', 'redirect_limit', 'shorter_url_lifetime'], 'required'],
            [['redirect_limit', 'shorter_url_lifetime'], 'integer'],
            [['time_create'], 'safe'],
            [['url'], 'string', 'max' => 145],
            [['shorter_url'], 'string', 'max' => 8],
            [['shorter_url'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idurl' => 'Idurl',
            'url' => 'Url',
            'shorter_url' => 'Shorter Url',
            'redirect_limit' => 'Redirect Limit',
            'shorter_url_lifetime' => 'Shorter Url Lifetime',
            'time_create' => 'Time Create',
        ];
    }

    /**
     * Gets query for [[UrlTransitions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUrlTransitions()
    {
        return $this->hasMany(UrlTransitions::className(), ['url_idurl' => 'idurl']);
    }
}
