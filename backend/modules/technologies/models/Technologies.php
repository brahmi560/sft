<?php

namespace backend\modules\technologies\models;

use Yii;
use backend\modules\techcategories\models\TechCategories;

/**
 * This is the model class for table "{{%technologies}}".
 *
 * @property integer $techId
 * @property string $techName
 * @property integer $techCategoryId
 * @property string $techDescription
 * @property string $status
 * @property string $techMetaTitle
 * @property string $techMetaKey
 * @property string $techMetaDescription
 * @property string $techPageTitle
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property string $createdDate
 * @property string $updatedDate
 *
 * @property TechCategories $techCategory
 * @property TechnologiesInformation[] $technologiesInformations
 */
class Technologies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%technologies}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['techName', 'techCategoryId', 'techDescription', 'status', 'techMetaTitle', 'techMetaKey', 'techMetaDescription', 'techPageTitle', 'createdBy', 'updatedBy', 'createdDate', 'updatedDate'], 'required'],
            [['techCategoryId', 'createdBy', 'updatedBy'], 'integer'],
            [['techDescription', 'status', 'techMetaTitle', 'techMetaKey', 'techMetaDescription', 'techPageTitle'], 'string'],
            [['createdDate', 'updatedDate'], 'safe'],
            [['techName'], 'string', 'max' => 200],
            [['techCategoryId'], 'exist', 'skipOnError' => true, 'targetClass' => TechCategories::className(), 'targetAttribute' => ['techCategoryId' => 'techCatId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'techId' => 'Tech ID',
            'techName' => 'Tech Name',
            'techCategoryId' => 'Tech Category ID',
            'techDescription' => 'Tech Description',
            'status' => 'Status',
            'techMetaTitle' => 'Tech Meta Title',
            'techMetaKey' => 'Tech Meta Key',
            'techMetaDescription' => 'Tech Meta Description',
            'techPageTitle' => 'Tech Page Title',
            'createdBy' => 'Created By',
            'updatedBy' => 'Updated By',
            'createdDate' => 'Created Date',
            'updatedDate' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTechCategory()
    {
        return $this->hasOne(TechCategories::className(), ['techCatId' => 'techCategoryId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /* public function getTechnologiesInformations()
    {
        return $this->hasMany(TechnologiesInformation::className(), ['technologyId' => 'techId']);
    } */
}
