@extends('layouts.master')
@section('css')
    @toastr_css


@section('title')
    {{ trans('My_Classes_trans.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('My_Classes_trans.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="button" class="button x-small">
                        <a href="{{route('notif.create')}}">{{ trans('notif.add_notif') }} </a>
                    </button>


                    <br><br>


                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox"
                                           onclick="CheckAll('box1', this)"/></th>
                                <th>#</th>
                                <th>{{ trans('main_trans.etab') }}</th>
                                <th>{{ trans('main_trans.entite') }}</th>
                                <th>{{ trans('notif.label') }}</th>

                                <th>{{ trans('notif.num') }}</th>
                                <th>{{ trans('notif.montant') }}</th>
                                <th>{{ trans('main_trans.date') }}</th>
                                <th>{{ trans('main_trans.status') }}</th>
                                <th>{{ trans('main_trans.added_by') }}</th>
                                <th>{{ trans('main_trans.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php $i = 0; ?>

                            @foreach ($notifications as $notif)
                                <tr>
                                    <?php $i++; ?>
                                    <td><input type="checkbox" value="{{ $notif->id }}" class="box1"></td>
                                    <td>{{ $i }}</td>
                                    <td>{{ $notif->getEtab($notif->etablissement_id) }}</td>
                                    <td>{{ $notif->getEtab($notif->etablissement_id) }}</td>
                                    <td>{{ $notif->label }}</td>
                                    <td>{{ $notif->num }}</td>
                                    <td>{{ $notif->montant }}</td>
                                    <td>{{ $notif->date }}</td>
                                    <td>{{ $notif->added_by }}</td>
                                    <td>{{ $notif->status }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $notif->id }}"
                                                title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $notif->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $notif->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('notif.validate_notif') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <!-- حذف مجموعة صفوف -->
    <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('notif.delete_notif') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="#" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {{ trans('My_Classes_trans.Warning_Grade') }}
                        <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ trans('My_Classes_trans.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    </div>

    </div>

    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

    <script type="text/javascript">
        $(function () {
            $("#btn_delete_all").click(function () {
                var selected = new Array();
                $("#datatable input[type=checkbox]:checked").each(function () {
                    selected.push(this.value);
                });
                if (selected.length > 0) {
                    $('#delete_all').modal('show')
                    $('input[id="delete_all_id"]').val(selected);
                }
            });
        });
    </script>




@endsection
