@extends('layouts.main')
<?php
$title = 'Modules';
?>
@section('title')
{{ $title }}
@endsection
@section('breadcrumb')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ $title }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Gallery</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
@endsection
@section('content')
    <div class="container">
        @php
        $gridData = [
        'dataProvider' => $dataProvider,
        'useFilters' => true,
        'paginatorOptions' => [ // Here you can set some options of paginator Illuminate\Pagination\LengthAwarePaginator, used in a package.
            'pageName' => 'p'
        ],
        'pjax' => true,
        'rowsPerPage' => 10, // The number of rows in one page. By default 10.
        'title' => 'List', // It can be empty ''
        'strictFilters' => true, // If true, then a searching by filters will be strict, using an equal '=' SQL operator instead of 'like'.
        'rowsFormAction' => '/admin/pages/deletion', // Route url to send slected checkbox items for deleting rows, for example.
        'useSendButtonAnyway' => true, // If true, even if there are no checkbox column, the main send button will be displayed.
        'searchButtonLabel' => 'Find',
        'columnFields' => [
                [
                    'class' => Itstructure\GridView\Columns\CheckboxColumn::class,
                    'field' => 'delete',
                    'attribute' => 'id'
                ],
                [
                    'label' => 'First Name', // Column label.
                    'attribute' => 'first_name', // Attribute, by which the row column data will be taken from a model.
                ],
                [
                    'label' => 'Last Name',
                    'attribute' => 'last_name',
                    'value' => function ($row) {
                            return $row->last_name;
                        },
                    'sort' => 'last_name' // To sort rows. Have to set if an 'attribute' is not defined for column.
                ],
                [
                    'label' => 'Actions', // Optional
                    'class' => Itstructure\GridView\Columns\ActionColumn::class, // Required
                    'actionTypes' => [ // Required
                        'view',
                        'edit' => function ($data) {
                            return '/admin/pages/' . $data->id . '/edit';
                        },
                        [
                            'class' => Itstructure\GridView\Actions\Delete::class, // Required
                            'url' => function ($data) { // Optional
                                return '/admin/pages/' . $data->id . '/delete';
                            },
                            'htmlAttributes' => [ // Optional
                                'target' => '_blank',
                                'style' => 'color: yellow; font-size: 16px;',
                                'onclick' => 'return window.confirm("Are you sure you want to delete?");'
                            ]
                        ],
                    ]
                ],
            ],
            // set your toolbar
            'toolbar' =>  [
                'content' => '<button type="button" class="btn btn-success" title="Add Book">Add</button>',
                'resetbtn' => ['class' => 'btn btn-warning ms-2 me-2', 'onclick'=>'dsa'],
                'searchbtn' => ['class' => 'btn btn-primary'],
            ],
        ];
        @endphp
        @gridView($gridData)
    </div>
@endsection
