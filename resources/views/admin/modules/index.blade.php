@extends('layouts.main')
@php
    $title = 'Modules';
    $title_single = 'Module';
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
                        [
                            'class' => Itstructure\GridView\Actions\View::class, // Required
                            'url' => function ($model) { // Optional
                                return route('admin.modules.view', ['id' => $model->id]);
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
                                return route('admin.modules.edit', ['id' => $model->id]);
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
                                return route('admin.modules.delete', ['id' => $model->id]);
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
                                <a href="'.route("admin.modules.index").'" class="btn btn-secondary" title="Refresh Module"><i class="fas fa-refresh"></i></a>
                            </div>
                            ',
                'resetbtn' => ['class' => 'btn btn-warning ms-2'],
                'searchbtn' => ['class' => 'btn btn-primary'],
                'applybtn' => $applydropdown.'<button type="button" class="btn btn-success ms-2" title="Add Book">Apply</button>',
            ],
        ];
        @endphp
        @gridView($gridData)
    </div>
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
 @include('layouts.loadercontent', ['name' => $title_single, 'loader' => 'div'])
<div id="modalContent"></div>
{!! Modal::end() !!}
@endsection

@section('pagescript')
<script>
    $(document).ready(function() {
        var nameloader = '.{!! $title_single !!}_loader';
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

