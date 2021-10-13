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
        <div class="container-fluid page-body-wrapper">
            <div class="container">
                <h1 class="mt-2" style="font-size: 2em;">Add Doctor</h1>
                <div class="row">
                    <div class="col-6 mt-4">
                        @if(session()->has('message'))
                            <div class="alert alert-success mb-2">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{session()->get('message')}}
                            </div>
                        @endif
                        <form action="{{url('upload_doctor')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="name">Doctor Name</label>
                                <input type="text" name="name" id="name" class="form-control bg-background text-white" required="">
                            </div>
                            <div class="form-group mb-4">
                                <label for="phone">Doctor Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control bg-background text-white" required="">
                            </div>
                            <div class="form-group mb-4">
                                <label for="special">Speciality</label>
                                <select name="speciality" id="special" required="" class="form-control custom-select text-white">
                                    <option value="skin">Skin</option>
                                    <option value="heart">Heart</option>
                                    <option value="eye">Eye</option>
                                    <option value="ear">Ear</option>
                                    <option value="nose">Nose</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="room">Room No</label>
                                <input type="text" name="room" id="room" class="form-control bg-background text-white" required="">
                            </div>
                            <div class="form-group mb-4">
                                <label for="image">Doctor Image</label>
                                <input type="file" name="image" id="image" class="form-control bg-background text-white p-1" required>
                            </div>
                            <button class="btn btn-primary float-right">Submit</button>
                        </form>
                    </div>
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
