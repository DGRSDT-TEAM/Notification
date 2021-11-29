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
                                    <select class="custom-select mr-sm-2" name="etablissement_id">
                                        <option selected disabled>{{trans('main_trans.choose_etab')}}...</option>
                                        @foreach($etablissement as $c)
                                            <option  value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nal_id">{{trans('main_trans.entite')}} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="entite_benif_id">
                                        <option selected disabled>{{trans('main_trans.choose_entite')}}...</option>
                                        @foreach($labos as $c)
                                            <option  value="{{ $c->id }}">{{ $c->labo_name }}</option>
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
                                    <input class="form-control" type="text"  id="datepicker-action" name="date_notif" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{trans('notif.num')}} : </label>
                                    <input type="number" name="num" class="form-control">
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
                                    <select class="custom-select mr-sm-2" name="nature_operation">
                                        <option selected disabled>{{trans('notif.nature_notif')}}...</option>
                                        @foreach($natureOperations as $c)
                                            <option  value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>




                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                type="submit">{{trans('notif.submit')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
