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
            'label' => 'NDC\'s',
            'content' => function($row) use ($ndcs) {
                return $ndcs[$row['cx']]['ndcs'];
            },
            'contentOptions' => ['style' => 'max-width: 200px;']
        ]
    ],
]);
