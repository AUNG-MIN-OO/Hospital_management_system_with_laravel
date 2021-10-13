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
                <h1 class="mt-3 text-center" style="font-size: 2em;">Appointments</h1>
                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success mb-2 text-center font-weight-bolder">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{session()->get('message')}}
                        </div>
                    @endif
                    <table class="table table-striped table-dark table-hover">
                        <thead>
                        <tr class="text-center">
                            <th>Customer Name</th>
                            <th>Customer Phone</th>
                            <th>Doctor Name</th>
                            <th>Date</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr class="text-center">
                                <td>{{$data->name}}</td>
                                <td>{{$data->getUser->phone}}</td>
                                <td>{{$data->getDoctor->name}}</td>
                                <td><i class="fas fa-calendar mr-2"></i>{{$data->date}}</td>
                                <td>{{\Illuminate\Support\Str::substr($data->message,0,20)}}</td>
                                <td>
                                    <span class="badge badge-pill font-weight-bolder text-lg @if($data->status == 'Pending') badge-warning @else badge-success @endif">{{$data->status}}</span>
                                </td>
                                <td>
                                    <div class="">
                                        @if($data->status != 'Approved')
                                            <a href="{{url('approved',$data->id)}}" class="btn btn-success btn-sm">Approve</a>
                                        @else

                                        @endif
                                        <a href="{{url('cancel',$data->id)}}" class="btn btn-danger btn-sm">Cancel</a>
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
