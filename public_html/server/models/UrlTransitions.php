<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "url_transitions".
 *
 * @property int $id_url_transitions
 * @property int $url_idurl
 * @property string|null $entry_time
 *
 * @property Url $urlIdurl
 */
class UrlTransitions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'url_transitions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url_idurl'], 'required'],
            [['url_idurl'], 'integer'],
            [['entry_time'], 'safe'],
            [['url_idurl'], 'exist', 'skipOnError' => true, 'targetClass' => Url::className(), 'targetAttribute' => ['url_idurl' => 'idurl']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_url_transitions' => 'Id Url Transitions',
            'url_idurl' => 'Url Idurl',
            'entry_time' => 'Entry Time',
        ];
    }

    /**
     * Gets query for [[UrlIdurl]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUrlIdurl()
    {
        return $this->hasOne(Url::className(), ['idurl' => 'url_idurl']);
    }
}
