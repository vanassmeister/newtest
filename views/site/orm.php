<?php
/*
 * @author Ivan Nikiforov
 * Sep 1, 2016
 */
use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'cx',
        'rx',
        'title',
        [
            'label' => '',
            'content' => function($val) {
                $ndcs = array_map(function($val) {
                        return $val->ndc;
                    }, $val->rels);
                // Я предполагаю что атрибут ndc безопасен и не экранирую его
                return join(', ', $ndcs);
            },
            'contentOptions' => ['style' => 'max-width: 200px;']
        ]
    ],
]);
