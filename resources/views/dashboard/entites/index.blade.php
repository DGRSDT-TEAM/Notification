.@extends('layouts.master')
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
                                <th>{{ trans('main_trans.entite') }}</th>
                                <th>Type</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php $i = 0; ?>

                            @foreach ($entites as $entite)
                                <tr>
                                    <?php $i++; ?>


                                    <td></td>
                                    <td></td>

                                </tr>


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
