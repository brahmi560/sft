<?php

namespace backend\modules\techcategories\models;

use Yii;

/**
 * This is the model class for table "tech_categories".
 *
 * @property integer $techCatId
 * @property string $techCategoryName
 * @property string $techCatDescription
 * @property string $status
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property string $createdDate
 * @property string $updatedDate
 */
class TechCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tech_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['techCategoryName', 'techCatDescription', 'status', 'createdBy', 'updatedBy', 'createdDate', 'updatedDate'], 'required'],
            [['techCatDescription', 'status'], 'string'],
            [['createdBy', 'updatedBy'], 'integer'],
            [['createdDate', 'updatedDate'], 'safe'],
            [['techCategoryName'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'techCatId' => 'Tech Cat ID',
            'techCategoryName' => 'Tech Category Name',
            'techCatDescription' => 'Tech Cat Description',
            'status' => 'Status',
            'createdBy' => 'Created By',
            'updatedBy' => 'Updated By',
            'createdDate' => 'Created Date',
            'updatedDate' => 'Updated Date',
        ];
    }
}
