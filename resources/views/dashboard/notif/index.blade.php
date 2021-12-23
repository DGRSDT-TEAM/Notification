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
                                    <td>{{ $notif->getEtab() }} <span
                                                class="badge badge-success"> Code: {{$notif->getEtabCode()}}</span></td>
                                    <td>{{ $notif->getLabo() }} <span
                                                class="badge badge-info">{{$notif->getLaboCode_dprep()}}</span>
                                    </td>
                                    <td>{{ $notif->label }}</td>
                                    <td><span class="badge badge-pill badge-danger"> {{ $notif->num }}</span></td>
                                    <td>{{ $notif->montant }} <strong>DZ</strong></td>
                                    <td>{{ $notif->date }}</td>
                                    <td>{{ $notif->addedBy() }}</td>
                                    <td style="display: flex">
                                        <button type="button" class="btn btn-info btn-sm mr-2" data-toggle="modal"
                                                data-target="#edit{{ $notif->id }}"
                                                title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i>
                                        </button>

                                        <button type="button" class="btn btn-success btn-sm mr-2" data-toggle="modal"
                                                data-target="#detail{{ $notif->id }}"
                                                title="{{ trans('Grades_trans.Edit') }}" {{count($notif->inscriptions) >0 ?" " : "disabled "}}>
                                            <i class="fa fa-info"></i>
                                        </button>

                                        <button type="button" class="btn btn-danger btn-sm mr-2" data-toggle="modal"
                                                data-target="#delete{{ $notif->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>


                                    </td>
                                </tr>

                                <!-- inscription notification -->
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
                                            <div class="modal-body">
                                                <!-- Edit Form -->
                                                <form action="{{route('inscription.store')}}" method="post">

                                                    @csrf
                                                    <div class="row">

                                                        <div class="col col-md-12 mb-2">
                                                            <label for="num_inscription"
                                                                   class="mr-sm-2">{{ trans('notif.num_inscription') }}
                                                                :</label>

                                                            <input class="form-control" type="text"
                                                                   id="num_inscription" name="num_inscription" required>

                                                            <input id="id" type="hidden" name="id_notification"
                                                                   class="form-control"
                                                                   value="{{ $notif->id}}">
                                                        </div>


                                                        <div class="col">
                                                            <label for="date_inscription"
                                                                   class="mr-sm-2">{{ trans('notif.date_inscription') }}:<br/></label>

                                                            <input class="form-control" type="text"
                                                                   id="datepicker-action" name="date_inscription"
                                                                   data-date-format="yyyy-mm-dd" required>

                                                            <input id="id" type="hidden" name="id_notification"
                                                                   class="form-control"
                                                                   value="{{ $notif->id}}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="montant_inscription"
                                                                   class="mr-sm-2">{{ trans('notif.montant_inscription') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value=""
                                                                   name="montant_inscription" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                                for="exampleFormControlTextarea1">{{ trans('notif.note_inscription') }}
                                                            :</label>
                                                        <textarea class="form-control" name="note_inscription"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3"></textarea>
                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('notif.cancel_inscription') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ trans('notif.save_inscription') }}</button>
                                                    </div>
                                                </form>

                                            </div>


                                        </div>
                                    </div>
                                </div>



                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $notif->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('notif.delete_notif') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('notif.destroy')}}" method="post">

                                                    @csrf
                                                    {{ trans('notif.warning_delete_notif') }}: <b>{{$notif->num}}</b>
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{$notif->id}}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('notif.cancel_delete_notif') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ trans('notif.delete_notif') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Details notification -->
                                @if(count($notif->inscriptions)>0)
                                    <div class="modal fade" id="detail{{ $notif->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        Notification : <b>{{$notif->num}}</b>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>


                                                <div class="modal-body">

                                                    @foreach($notif->inscriptions as $inscription )
                                                        <div class="card text-center">
                                                            <div class="card-header bg-info">
                                                            </div>
                                                            <div class="card-body">
                                                                <p class="card-title"><b>Num:</b> {{$inscription->num}}
                                                                </p>
                                                                <p class="card-text"><b>Montant
                                                                        :</b> {{$inscription->montant}} DZ</p>
                                                                <span class="badge badge-info">Le : {{$inscription->date}}</span>
                                                            </div>

                                                        </div>

                                                        <hr>
                                                    @endforeach
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                            @endif

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
