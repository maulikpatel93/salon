@extends('layouts.main')
@php
    $title = 'Modules';
    $title_single = 'Module';
    $unique_title = str_replace(' ', '_', strtolower($title_single));; //without space
    $createbtn = '<a href="'.route('admin.modules.create').'" class="btn btn-primary showbsmodal" title="Add '.$title_single.'" data-bs-toggle="modal" data-bs-target="#crud_form_modal">Add</a>';
    $applydropdown = '<select class="form-select w-auto" id="applyoption">
        <option value="">--Select--</option>
        <option value="Active">Active</option>
        <option value="Inactive">InActive</option>
        <option value="Delete">InActive</option>
        </select>';

@endphp
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

        @php
        $gridData = [
         'id' => 'gridtable',
        'dataProvider' => $dataProvider,
        'useFilters' => true,
        'paginatorOptions' => [ // Here you can set some options of paginator Illuminate\Pagination\LengthAwarePaginator, used in a package.
            'pageName' => 'p'
        ],
        'pjax' => true,
        'rowsPerPage' => 10, // The number of rows in one page. By default 10.
        'title' => 'List', // It can be empty ''
        'strictFilters' => false, // If true, then a searching by filters will be strict, using an equal '=' SQL operator instead of 'like'.
        'rowsFormAction' => '/admin/pages/deletion', // Route url to send slected checkbox items for deleting rows, for example.
        'useSendButtonAnyway' => false, // If true, even if there are no checkbox column, the main send button will be displayed.
        'searchButtonLabel' => 'Find',
        'columnFields' => [
                [
                    'class' => Itstructure\GridView\Columns\CheckboxColumn::class,
                    'field' => 'delete',
                    'attribute' => 'id'
                ],
                [
                    'label' => 'Title', // Column label.
                    'attribute' => 'title', // Attribute, by which the row column data will be taken from a model.
                ],
                [
                    'label' => 'Type',
                    'attribute' => 'type',
                    'value' => function ($row) {
                            return $row->type;
                        },
                    'sort' => 'type' // To sort rows. Have to set if an 'attribute' is not defined for column.
                ],
                [
                    'label' => 'Functionality', // Column label.
                    'attribute' => 'functionality', // Attribute, by which the row column data will be taken from a model.
                ],
                [
                    'label' => 'Active', // Column label.
                    'value' => function ($model) { // You can set 'value' as a callback function to get a row data value dynamically.
                            $btnbg = ($model->is_active == 1) ? 'success' : 'danger';
                            $active = ($model->is_active == 1) ? 'Active' : 'InActive';
                            return Html::link('javascript:void(0)',
                                            $active,
                                            [
                                                'class' => 'btn btn-' . $btnbg . ' btn-sm',
                                                'id' => 'is_active_' . $model->id,
                                                'title' => $model->is_active,
                                                'onclick' => '$.post({
                                                    url: "'.route('admin.modules.isactive').'",
                                                    success: function (response) {
                                                    // $.pjax.reload({container: "#gridtable-pjax"});
                                                },
                                            }); return false;'
                                    ]
                            );
                        return '<span class="icon fas '.($row->is_active == 1 ? 'fa-check' : 'fa-times').'"></span>';
                    },
                    'filter' => [ // For dropdown it is necessary to set 'data' array. Array keys are for html <option> tag values, array values are for titles.
                        'class' => Itstructure\GridView\Filters\DropdownFilter::class, // REQUIRED. For this case it is necessary to set 'class'.
                        'name' => 'active', // REQUIRED if 'attribute' is not defined for column.
                        'data' => [ // REQUIRED.
                            0 => 'No active',
                            1 => 'Active',
                        ]
                    ],
                    'format' => 'html', // To render column content without lossless of html tags, set 'html' formatter.
                    'sort' => 'active' // To sort rows. Have to set if an attribute is not defined for column.
                ],
                [
                    'label' => 'Actions', // Optional
                    'class' => Itstructure\GridView\Columns\ActionColumn::class, // Required
                    'actionTypes' => [ // Required
                        [
                            'class' => Itstructure\GridView\Actions\View::class, // Required
                            'url' => function ($model) { // Optional
                                return route('admin.modules.view', ['id' => encode($model->id)]);
                            },
                            'htmlAttributes' => [ // Optional
                                'class' => 'showbsmodal',
                                'title' => 'View '.$title_single,
                                'data-bs-toggle' => "modal",
                                'data-bs-target' => "#crud_form_modal"
                            ]
                        ],
                        [
                            'class' => Itstructure\GridView\Actions\Edit::class, // Required
                            'url' => function ($model) { // Optional
                                return route('admin.modules.edit', ['id' => encode($model->id)]);
                            },
                            'htmlAttributes' => [ // Optional
                                'class' => 'showbsmodal',
                                'title' => 'Update '.$title_single,
                                'data-bs-toggle' => "modal",
                                'data-bs-target' => "#crud_form_modal"
                            ]
                        ],
                        [
                            'class' => Itstructure\GridView\Actions\Delete::class, // Required
                            'url' => function ($model) { // Optional
                                return route('admin.modules.delete', ['id' => encode($model->id)]);
                            },
                            'htmlAttributes' => [ // Optional
                                'target' => '_blank',
                                'title' => 'Delete '.$title_single,
                                'class' => '',
                                'onclick' => 'return window.confirm("Are you sure you want to delete?");'
                            ]
                        ],
                    ]
                ],
            ],
            // set your toolbar
            'toolbar' =>  [
                'content' => '<div class="btn-group" role="group">
                                '.$createbtn.'
                                <a href="'.route("admin.modules.index").'" class="btn btn-secondary" title="Refresh Module" data-trigger-pjax=1
                           data-pjax-target="#gridtable-pjax"><i class="fas fa-refresh"></i></a>
                            </div>
                            ',
                'resetbtn' => ['class' => 'btn btn-warning ms-2'],
                'searchbtn' => ['class' => 'btn btn-primary'],
                'applybtn' => $applydropdown.'<button type="button" class="btn btn-success ms-2" title="Add Book">Apply</button>',
            ],
        ];
        @endphp
        @gridView($gridData)
@endsection

@section('modal')
{!! Modal::start([
    'options' => ['id' => 'crud_form_modal'],
    'title' => 'Create Module',
    'header' => true,
    'size' => 'modal-md',
    'clientOptions' => [
        'backdrop' => true,
        'keyboard' => true
    ]
  ]) !!}
 @include('layouts.loadercontent', ['name' => $unique_title, 'loader' => 'div'])
<div id="modalContent"></div>
{!! Modal::end() !!}
@endsection

@section('pagescript')
<script>
    $(document).ready(function() {
        var nameloader = '.{!! $unique_title !!}_loader';
        $('.showbsmodal').click(function(){
            $('#crud_form_modal').find('#crud_form_modal-label').html($(this).attr('title'));
            var data = {
                "_token": "{{ csrf_token() }}",
            }
            $.ajax({
                type: 'POST',
                url: $(this).attr('href'),
                data: data,
                beforeSend: function() {
                    $(nameloader).show();
                },
                success: function(response) {
                    $('#crud_form_modal').find('#modalContent').html(response);
                    
                },
                complete: function() {
                    $(nameloader).hide();
                },
                dataType: 'html'
            });
        });
    });

</script>
@endsection

