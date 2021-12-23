@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.add_student')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.add_student')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
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

                    <form method="POST" action="{{ route('notif.store') }}" autocomplete="off">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('notif.add_new_notif')}}</h6>
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">{{trans('main_trans.etab')}} : <span
                                                class="text-danger">*</span></label>
                                    <select class="custom-select select2 mr-sm-2" name="etablissement_id" id="etab_id">
                                        <option selected disabled>{{trans('main_trans.choose_etab')}}...</option>
                                        @foreach($etablissement as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nal_id">{{trans('main_trans.entite')}} : <span
                                                class="text-danger">*</span></label>
                                    <select class="custom-select select2 mr-sm-2" name="labo_id" id="labos">
                                        <option selected disabled>{{trans('main_trans.choose_entite')}}...</option>
                                        @foreach($labos as $c)
                                            <option value="{{ $c->id }}">{{ $c->labo_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('notif.libelle')}} : <span class="text-danger">*</span></label>
                                    <input type="text" name="label" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('notif.date')}} :</label>
                                    <input class="form-control" type="text" id="datepicker-action" name="date_notif"
                                           data-date-format="yyyy-mm-dd">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{trans('notif.num')}} : </label>
                                    <input type="text" name="num" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{trans('notif.montant')}} :</label>
                                    <input type="number" name="montant" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{trans('notif.nature_notif')}} :</label>
                                    <select class="custom-select select2 mr-sm-2" name="nature_operation">
                                        <option selected disabled>{{trans('notif.nature_notif')}}...</option>
                                        @foreach($natureOperations as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>


                        <div class="row d-flex justify-content-end">
                            <div class="col col-md-3 d-flex justify-content-end">
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right py-2 my-4"
                                        type="submit">{{trans('notif.submit')}}</button>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

    <script>
        $(document).ready(function () {
            $('#etab_id').on('change', function () {
                var etabID = $(this).val();
                var APP_URL = {!! json_encode(url('/')) !!}
                //console.log(etabID, APP_URL);
                if (etabID) {
                    $.ajax({
                        url: APP_URL + '/admin/getCourse/' + etabID,
                        type: "GET",
                        data: {"_token": "{{ csrf_token() }}"},
                        dataType: "json",
                        success: function (data) {
                            if (data) {
                                $('#labos').empty();
                                $('#labos').append('<option hidden>Choisir une  Entite</option>');
                                $.each(data, function (key, labos) {
                                    $('select[name="labo_id"]').append('<option value="' + key + '">' + labos.labo_name + '</option>');
                                });
                                console.log(data);
                            } else {
                                $('#labos').empty();
                            }
                        }
                    });
                } else {
                    $('#course').empty();
                }
            });
        });
    </script>
@endsection
