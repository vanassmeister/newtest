<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_source".
 *
 * @property integer $id
 * @property string $cx
 * @property string $rx
 * @property string $title
 * 
 * @property TbRel[] $rels
 */
class TbSource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cx', 'rx'], 'string', 'max' => 10],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cx' => 'Cx',
            'rx' => 'Rx',
            'title' => 'Title',
        ];
    }
    
    /**
     * Связанные атрибуты NDC
     * @return \yii\db\ActiveQuery
     */
    public function getRels()
    {
        return $this->hasMany(TbRel::className(), ['cx' => 'cx']);
    }
}
