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

                            <form method="post" action="#" autocomplete="off"
                                  enctype="multipart/form-data">
                                @csrf
                                <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students_trans.personal_information')}}</h6>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{trans('Students_trans.name_ar')}} : <span
                                                        class="text-danger">*</span></label>
                                            <input type="text" name="name_ar" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{trans('Students_trans.name_en')}} : <span
                                                        class="text-danger">*</span></label>
                                            <input class="form-control" name="name_en" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{trans('Students_trans.email')}} : </label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{trans('Students_trans.password')}} :</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="gender">{{trans('Students_trans.gender')}} : <span
                                                        class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="gender_id">
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nal_id">{{trans('Students_trans.Nationality')}} : <span
                                                        class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="nationalitie_id">
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="bg_id">{{trans('Students_trans.blood_type')}} : </label>
                                            <select class="custom-select mr-sm-2" name="blood_id">
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>{{trans('Students_trans.Date_of_Birth')}} :</label>
                                            <input class="form-control" type="text" id="datepicker-action"
                                                   name="Date_Birth"
                                                   data-date-format="yyyy-mm-dd">
                                        </div>
                                    </div>

                                </div>

                                <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students_trans.Student_information')}}</h6>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('Students_trans.Grade')}} : <span
                                                        class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="Grade_id">
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span
                                                        class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="Classroom_id">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="section_id">{{trans('Students_trans.section')}} : </label>
                                            <select class="custom-select mr-sm-2" name="section_id">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="parent_id">{{trans('Students_trans.parent')}} : <span
                                                        class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="parent_id">
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>

                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <br>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="academic_year">{{trans('Students_trans.Attachments')}} : <span
                                                    class="text-danger">*</span></label>
                                        <input type="file" accept="image/*" name="photos[]" multiple>
                                    </div>
                                </div>


                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                        type="submit">{{trans('Students_trans.submit')}}</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- row closed -->

        </div>
    </div>
</div>

