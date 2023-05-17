@extends('admin.master')
@section('css')
@endsection

@section('title')
    Logo
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6"> Logos <h4 class="mb-0"> </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color"> Logos </a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('message')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <button class="btn btn-success btn-sm" title="create" data-toggle="modal"
                            data-target="#createfile" >
                        Create Logo</button>
                    @include('uploads.create')
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <theadcreatefile>
                            <tr>
                                <th>#</th>
                                <th>Logo</th>
                                <th>Processes</th>
                            </tr>
                            </theadcreatefile>
                            <tbody>
                            @foreach($upload as $upload)
                                <tr>
                                    <td>{{ $loop -> iteration }}</td>

                                    <td>
                                        <img style="width: 30%; height:30%;"
                                             src="
                                                {{--  مسار الصور --}}
                                             {{ asset('storage/'. $upload -> logo) }}"
                                        ></td>
                                    </td>

                                    <td>
                                        <button class="btn btn-danger btn-sm" data-upload_id="{{$upload->id}}"
                                                data-toggle="modal" data-target="#deletedfile"><i
                                                class="fa fa-trash"></i></button>

                                        <button class="btn btn-success btn-sm" title="Edit" data-toggle="modal"
                                                data-target="#Editfile{{$upload->id}}" ><i
                                                class="fa fa-edit"></i></button>

                                        @include('uploads.deleted')

                                        @include('uploads.edit')

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script>
        $('#deletedfile').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var upload_id = button.data('upload_id')
            var modal = $(this)
            modal.find('.modal-body #upload_id').val(upload_id);
        })
    </script>
@endsection
