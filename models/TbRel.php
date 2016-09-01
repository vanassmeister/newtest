<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_rel".
 *
 * @property integer $id
 * @property string $cx
 * @property string $ndc
 */
class TbRel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_rel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cx'], 'string', 'max' => 10],
            [['ndc'], 'string', 'max' => 20],
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
            'ndc' => 'Ndc',
        ];
    }
}
