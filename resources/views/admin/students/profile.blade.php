@extends('admin.layouts.app')
@section('title')
    {{ $item->name }}
@endsection
<?php $menu = 'Students';
$submenu = $item->c_class; ?>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if ($item->photo)
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('images/students') . '/' . $item->photo }}" alt="profile picture">
                            @else
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('images/asset_img/user-icon.png') }}" alt="profile picture">
                            @endif
                        </div>

                        <h3 class="profile-username text-center">{{ $item->name }}</h3>
                        <p class="text-muted text-center"><i class="bi bi-telephone"></i> <a
                                href="tel:{{ $item->phone }}">{{ $item->phone }}</a>
                        </p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>ID</b> <a class="float-right">{{ $item->st_id }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Class</b> <a class="float-right">{{ $item->c_class }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Group</b> <a class="float-right">{{ $item->department }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Session</b> <a class="float-right">{{ $item->session }}</a>
                            </li>
                        </ul>

                        <a href="{{ route('admin.students.idcard.generate', $item->id) }}"
                            class="btn btn-primary btn-block" target="blank"><i class="bi bi-person-badge"></i>
                            Generate ID Card</a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header attachment-block p-3 d-flex justify-content-between">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#information" data-toggle="tab"><i
                                        class="bi bi-info-square"></i> Details</a></li>
                            <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab"><i
                                        class="bi bi-pencil-square"></i> Edit</a>
                            </li>
                        </ul>

{{--                        @if ($item->c_class == 'XI' || $item->c_class == 'XII')--}}
{{--                            <button type="button" class="btn btn-primary ml-auto" data-toggle="modal"--}}
{{--                                data-target="#{{ $item->department . $item->id . 'modal' }}">--}}
{{--                                <i class="fas fa-hourglass-half"></i> Exam--}}
{{--                            </button>--}}
{{--                        @endif--}}

                    </div><!-- /.card-header -->

                    <div class="card-body pt-1">
                        <div class="tab-content">
                            <div class="active tab-pane" id="information">
                                <!-- Post -->
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item border-top-0">
                                        <b>Father's name</b> <a class="float-right">{{ $item->fathers_name }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Mother's name</b> <a class="float-right">{{ $item->mothers_name }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Gender</b> <a class="float-right">{{ $item->gender }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Date of birth</b> <a
                                            class="float-right">{{ date('d F, Y', strtotime($item->dob)) }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Present address</b> <a class="float-right">{{ $item->present_address }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Permanent address</b> <a class="float-right">{{ $item->permanent_address }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>NID / Birth certificate no.</b> <a
                                            class="float-right">{{ $item->birth_reg_nid }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ $item->email }}</a>
                                    </li>
                                </ul>








{{--                                <div class="card my-4">--}}
{{--                                    <div class="card-header attachment-block px-3 py-2 bg-gray-dark">--}}
{{--                                        <b>SSC information</b>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-body table-responsive p-0">--}}
{{--                                        <table class="table table-bordered">--}}
{{--                                            <thead>--}}
{{--                                                <tr>--}}
{{--                                                    <th>GPA</th>--}}
{{--                                                    <th>Board</th>--}}
{{--                                                    <th>Group</th>--}}
{{--                                                    <th>Year</th>--}}
{{--                                                    <th>School</th>--}}
{{--                                                    <th>Evidence</th>--}}
{{--                                                </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody>--}}
{{--                                                <tr>--}}
{{--                                                    <td>{{ $item->ssc_res }}</td>--}}
{{--                                                    <td>{{ $item->ssc_board }}</td>--}}
{{--                                                    <td>{{ $item->ssc_dept }}</td>--}}
{{--                                                    <td>{{ $item->ssc_year }}</td>--}}
{{--                                                    <td>{{ $item->ssc_school }}</td>--}}
{{--                                                    <td>--}}
{{--                                                        <a href="{{ asset('images/testimonials/ssc') . '/' . $item->ssc_testimonial }}"--}}
{{--                                                            class="btn btn-sm btn-info" target="blank">Testimonial</a>--}}
{{--                                                        <a href="{{ asset('images/marksheets') . '/' . $item->ssc_marksheet }}"--}}
{{--                                                            class="btn btn-sm btn-info" target="blank">Marksheet</a>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                @if ($item->c_class != 'Old_Student')
                                    <div class="text-center mt-4">
                                        <a href="{{ route('students.transfer-class', $item->id) }}"
                                            class="btn btn-primary btn-block confirm">
                                            Transfer to next class <i class="far fa-arrow-alt-circle-right ml-1"></i></a>
                                    </div>
                                @endif
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="edit">

                                <div class="d-flex justify-content-end">
                                    <form action="{{ route('students.destroy', $item->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-outline-danger btn-sm py-1 mb-2 delete"><i
                                                class="bi bi-trash"></i> Delete</button>
                                    </form>
                                </div>

                                <form action="{{ route('students.update', $item->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="put">

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" st_id">Student ID</label>
                                            <input class="form-control @error('st_id') is-invalid @enderror"
                                                type="text" name=" st_id" value="{{ $item->st_id }}">
                                            @error('st_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=" name">Name</label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                                name=" name" value="{{ $item->name }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" session">Session</label>
                                            <input class="form-control @error('session') is-invalid @enderror"
                                                type="text" name=" session" value="{{ $item->session }}">
                                            @error('session')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=" department">Department</label>
                                            <select name="department" class="form-control">
                                                <option value="Science" @if ($item->department == 'Science') selected @endif>
                                                    Science</option>
                                                <option value="IT"
                                                    @if ($item->department == 'IT') selected @endif>IT</option>
                                                <option value="Business"
                                                    @if ($item->department == 'Business') selected @endif>
                                                    Business</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" fathers_name">Father's name</label>
                                            <input class="form-control @error('fathers_name') is-invalid @enderror"
                                                type="text" name=" fathers_name" value="{{ $item->fathers_name }}">
                                            @error('fathers_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" mothers_name">Mother's name</label>
                                            <input class="form-control @error('mothers_name') is-invalid @enderror"
                                                type="text" name=" mothers_name" value="{{ $item->mothers_name }}">
                                            @error('mothers_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" c_class">Current Class</label>
                                            <select name="c_class" class="form-control">
                                                <option value="XI" @if ($item->c_class == 'XI') selected @endif>
                                                    XI
                                                </option>
                                                <option value="XII" @if ($item->c_class == 'XII') selected @endif>
                                                    XII
                                                </option>
{{--                                                <option value="HSC_Examinee"--}}
{{--                                                    @if ($item->c_class == 'HSC_Examinee') selected @endif>HSC Examinee--}}
{{--                                                </option>--}}
                                                <option value="Old_Student"
                                                    @if ($item->c_class == 'Old_Student') selected @endif>Old Student</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" dob">Date of birth</label>
                                            <input class="form-control @error('dob') is-invalid @enderror" type="date"
                                                name=" dob" value="{{ $item->dob }}">
                                            @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" gender">Gender</label>
                                            <select name="gender" class="form-control">
                                                <option value="Male" @if ($item->gender == 'Male') selected @endif>
                                                    Male
                                                </option>
                                                <option value="Female" @if ($item->gender == 'Female') selected @endif>
                                                    Female</option>
                                                <option value="Other" @if ($item->gender == 'Other') selected @endif>
                                                    Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" phone">Phone</label>
                                            <input class="form-control @error('phone') is-invalid @enderror"
                                                type="text" name=" phone" value="{{ $item->phone }}">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" email">Email</label>
                                            <input class="form-control @error('email') is-invalid @enderror"
                                                type="email" name=" email" value="{{ $item->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" photo">Photo</label>
                                            <input class="form-control p-1" type="file" name="photo">
                                            <input type="hidden" name="old_photo" value="{{ $item->photo }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" present_address">Present address</label>
                                            <input class="form-control @error('present_address') is-invalid @enderror"
                                                type="text" name=" present_address"
                                                value="{{ $item->present_address }}">
                                            @error('present_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" permanent_address">Permanent address</label>
                                            <input class="form-control @error('permanent_address') is-invalid @enderror"
                                                type="text" name=" permanent_address"
                                                value="{{ $item->permanent_address }}">
                                            @error('permanent_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" birth_reg_nid">NID / Birth certificate no.</label>
                                            <input class="form-control @error('birth_reg_nid') is-invalid @enderror"
                                                type="text" name=" birth_reg_nid"
                                                value="{{ $item->birth_reg_nid }}">
                                            @error('birth_reg_nid')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" ssc_res">SSC GPA</label>
                                            <input class="form-control @error('ssc_res') is-invalid @enderror"
                                                type="text" name=" ssc_res" value="{{ $item->ssc_res }}">
                                            @error('ssc_res')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" ssc_board">SSC board</label>
                                            <select name="ssc_board" class="form-control">
                                                <option value="Sylhet" @if ($item->ssc_board == 'Sylhet') selected @endif>
                                                    Sylhet</option>
                                                <option value="Dhaka" @if ($item->ssc_board == 'Dhaka') selected @endif>
                                                    Dhaka</option>
                                                <option value="Rajshahi"
                                                    @if ($item->ssc_board == 'Rajshahi') selected @endif>Rajshahi</option>
                                                <option value="Chittagong"
                                                    @if ($item->ssc_board == 'Chittagong') selected @endif>Chittagong</option>
                                                <option value="Comilla"
                                                    @if ($item->ssc_board == 'Comilla') selected @endif>
                                                    Comilla</option>
                                                <option value="Dinajpur"
                                                    @if ($item->ssc_board == 'Dinajpur') selected @endif>Dinajpur</option>
                                                <option value="Jessore"
                                                    @if ($item->ssc_board == 'Jessore') selected @endif>
                                                    Jessore</option>
                                                <option value="Barisal"
                                                    @if ($item->ssc_board == 'Barisal') selected @endif>
                                                    Barisal</option>
                                                <option value="Mymensingh"
                                                    @if ($item->ssc_board == 'Mymensingh') selected @endif>Mymensingh</option>
                                                <option value="Madrasah"
                                                    @if ($item->ssc_board == 'Madrasah') selected @endif>Madrasah</option>
                                                <option value="Technical"
                                                    @if ($item->ssc_board == 'Technical') selected @endif>Technical</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" ssc_dept">SSC department</label>
                                            <select name="ssc_dept" class="form-control">
                                                <option value="Science"
                                                    @if ($item->ssc_dept == 'Science') selected @endif>
                                                    Science</option>
                                                <option value="IT"
                                                    @if ($item->ssc_dept == 'IT') selected @endif>IT</option>
                                                <option value="Business"
                                                    @if ($item->ssc_dept == 'Business') selected @endif>Business</option>
                                                <option value="Vocational"
                                                    @if ($item->ssc_dept == 'Vocational') selected @endif>Vocational</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" ssc_school">SSC School</label>
                                            <input class="form-control @error('ssc_school') is-invalid @enderror"
                                                type="text" name=" ssc_school" value="{{ $item->ssc_school }}">
                                            @error('ssc_school')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" ssc_year">SSC passing year</label>
                                            <input class="form-control @error('ssc_year') is-invalid @enderror"
                                                type="text" name="ssc_year" value="{{ $item->ssc_year }}">
                                            @error('ssc_year')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

{{--                                    <div class="row">--}}
{{--                                        <div class="form-group col-md-6">--}}
{{--                                            <label for=" ssc_testimonial">SSC testimonial</label>--}}
{{--                                            <input class="form-control p-1" type="file" name="ssc_testimonial">--}}
{{--                                            <input type="hidden" name="old_ssc_testimonial"--}}
{{--                                                value="{{ $item->ssc_testimonial }}">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group col-md-6">--}}
{{--                                            <label for="ssc_marksheet">SSC marksheet</label>--}}
{{--                                            <input class="form-control p-1" type="file" name="ssc_marksheet">--}}
{{--                                            <input type="hidden" name="old_ssc_marksheet"--}}
{{--                                                value="{{ $item->ssc_marksheet }}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="d-flex justify-content-end mt-2">
                                        <button type="submit" class="btn  btn-primary"><i
                                                class="bi bi-check2-square"></i>
                                            Update info</button>
                                    </div>
                                </form>

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->


    @php
    $mt_mark = DB::table('model_test_exam')
        ->where('c_class', $item->c_class)
        ->where('st_id', $item->id)
        ->first();
    $hy_mark = DB::table('half_yearly_exam')
        ->where('c_class', $item->c_class)
        ->where('st_id', $item->id)
        ->first();
    $fnl_mark = DB::table('final_exam')
        ->where('c_class', $item->c_class)
        ->where('st_id', $item->id)
        ->first();
    @endphp

    @include('admin.students.exam_modals.science')
    @include('admin.students.exam_modals.IT')
    @include('admin.students.exam_modals.business')

@endsection
