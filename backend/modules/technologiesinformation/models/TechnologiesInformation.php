<?php

namespace backend\modules\technologiesinformation\models;

use Yii;
use backend\modules\technologies\models\Technologies;

/**
 * This is the model class for table "technologies_information".
 *
 * @property integer $technologyInfoId
 * @property string $technologySiteName
 * @property string $technologyUrl
 * @property string $technologyDescription
 * @property integer $technologyId
 * @property string $status
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property string $createdDate
 * @property string $updatedDate
 * @property string $techinfoMetaTitle
 * @property string $techinfoMetaKey
 * @property string $techinfoMetaDescription
 * @property string $techinfoPageTitle
 *
 * @property Technologies $technology
 */
class TechnologiesInformation extends \yii\db\ActiveRecord
{
	public $technologyList;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'technologies_information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['technologySiteName', 'technologyUrl', 'technologyDescription', 'technologyId', 'status', 'createdBy', 'updatedBy', 'createdDate', 'updatedDate', 'techinfoMetaTitle', 'techinfoMetaKey', 'techinfoMetaDescription', 'techinfoPageTitle','technologyList'], 'safe'],
        	[['technologySiteName', 'technologyUrl', 'technologyDescription', 'technologyId', 'status'], 'required'],
            [['technologyUrl', 'technologyDescription', 'status', 'techinfoMetaTitle', 'techinfoMetaKey', 'techinfoMetaDescription', 'techinfoPageTitle'], 'string'],
            [['technologyId', 'createdBy', 'updatedBy'], 'integer'],
            [['createdDate', 'updatedDate'], 'safe'],
            [['technologySiteName'], 'string', 'max' => 200],
            [['technologyId'], 'exist', 'skipOnError' => true, 'targetClass' => Technologies::className(), 'targetAttribute' => ['technologyId' => 'techId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'technologyInfoId' => 'Technology Info ID',
            'technologySiteName' => 'Technology Site Name',
            'technologyUrl' => 'Technology Url',
            'technologyDescription' => 'Technology Description',
            'technologyId' => 'Technology ID',
            'status' => 'Status',
            'createdBy' => 'Created By',
            'updatedBy' => 'Updated By',
            'createdDate' => 'Created Date',
            'updatedDate' => 'Updated Date',
            'techinfoMetaTitle' => 'Techinfo Meta Title',
            'techinfoMetaKey' => 'Techinfo Meta Key',
            'techinfoMetaDescription' => 'Techinfo Meta Description',
            'techinfoPageTitle' => 'Techinfo Page Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTechnology()
    {
        return $this->hasOne(Technologies::className(), ['techId' => 'technologyId']);
    }
}
