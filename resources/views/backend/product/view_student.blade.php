@extends('backend.layout.app')
@section('content')
    <div class="section">
        <div class="row">
            <div class="col s12 m12 l12">
                <div id="highlight-table" class="card card card-default scrollspy">
                    <div class="card-content">

                        <h4 class="card-title">All Family Groups</h4>

                        <form action="{{ route('store.student.info') }}" method="post" enctype="multipart/form-data">
                            <button type="submit" class="waves-effect waves-light btn mb-1 mr-1">Store Data</button>
                        <div class="row">
                            <div class="col s12 ">
                            </div>
                            <div class="col s12">
                                <table class="highlight">
                                    <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Gender</th>
                                        <th>Image</th>
                                        <th>Fathers Name</th>
                                        <th>Mothers Name</th>
                                        <th>Religion</th>
                                        <th>ID No</th>
                                        <th>Date of Birth</th>
                                        <th>Code</th>
                                        <th>Added On</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($student_info as $key => $student)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->mobile }}</td>
                                                <td>{{ $student->address }}</td>
                                                <td>{{ $student->gender }}</td>
                                                <td><img src="{{  (!empty($student->image))? url('upload/student_images/'.$student->image):url('upload/no_image.jpg') }}" style="width: 60px; height: 60px; border: 1px solid #000000;"></td>
                                                <td>{{ $student->fname }}</td>
                                                <td>{{ $student->mname }}</td>
                                                <td>{{ $student->religion }}</td>
                                                <td>{{ $student->id_no }}</td>
                                                <td>{{ $student->dob }}</td>
                                                <td>{{ $student->code }}</td>
                                                <td>{{ $student->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

