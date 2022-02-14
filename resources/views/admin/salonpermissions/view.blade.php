@detailView([
    'model' => $model,
    // 'title' => 'Detail title', // It can be empty ''
    'htmlAttributes' => [
        'class' => 'table table-bordered table-striped'
    ],
    'captionColumnConfig' => [
        'label' => 'title',
        'htmlAttributes' => [
            'class' => 'th-title-class'
        ]
    ],
    'valueColumnConfig' => [
        'label' => 'value',
        'htmlAttributes' => [
            'class' => 'th-value-class'
        ]
    ],
    'showHead' => false,
    'rowFields' => [
        'title',
        'name',
        'controller',
        'action',
    ]
])