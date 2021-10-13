<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
    <style>
        table>tr>td{
            white-space: nowrap;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
    @include('admin.navbar')
    <!-- partial -->
        <div class="container-fluid pt-5 mt-4">
            <div class="container">
                <h1 class="mt-3 text-center" style="font-size: 2em;">Doctors List</h1>
                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success mb-2 text-center font-weight-bolder">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{session()->get('message')}}
                        </div>
                    @endif
                    <table class="table table-striped table-hover table-dark">
                        <thead>
                        <tr>
                            <th>Profile</th>
                            <th>Doctor Name</th>
                            <th>Phone</th>
                            <th>Room</th>
                            <th>Speciality</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($doctors as $doctor)
                            <tr>
                                <td>
                                    <img src="{{asset('doctor_image/'.$doctor->image)}}" alt="" style="width: 60px;height: 60px;border-radius: 50%;background-size: contain">
                                </td>
                                <td>{{$doctor->name}}</td>
                                <td>{{$doctor->phone}}</td>
                                <td>{{$doctor->room}}</td>
                                <td class="text-uppercase"><span class="badge badge-info">{{$doctor->speciality}}</span></td>
                                <td>
                                    <div class="">
                                        <a href="{{url('edit-doctor',$doctor->id)}}" class="btn btn-outline-warning"><i class="fas fa-edit mr-0"></i></a>
                                        <a href="{{url('delete-doctor',$doctor->id)}}"  onclick="return confirm('Are you sure to want to delete this doctor list?')" class="btn btn-outline-danger"><i class="fas fa-trash-alt mr-0"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.script')
<!-- End custom js for this page -->
</body>
</html>
