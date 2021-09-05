<?php

namespace app\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;

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


    public function token(): string
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($chars);
        $random_string = '';
        for ($i = 0; $i < 8; $i++) {
            $random_character = $chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'redirect_limit', 'shorter_url_lifetime'], 'required'],
            [['redirect_limit', 'shorter_url_lifetime'], 'integer'],
            [['shorter_url_lifetime'], 'LifeTimeFormat'],
            [['time_create'], 'safe'],
            [['time_create'], 'default', 'value' => date("Y-m-d H:i:s")],
            [['url'], 'string', 'max' => 145],
            [['shorter_url'], 'string', 'max' => 8],
            [['shorter_url'], 'unique'],
            [['shorter_url'], 'default', 'value' => $this->token()],
        ];
    }

    public function LifeTimeFormat($attribute)
    {
        if (!preg_match('/^[0-9]{24}$/', $this->$attribute)) {
            $this->addError($attribute, 'Please provide values only no more than 24.');
        }
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
