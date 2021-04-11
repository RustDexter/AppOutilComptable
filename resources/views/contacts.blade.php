@extends('layouts.layout')
@section('content')
    <div>
        <div>
            <div class="row">
                <div class="col-md-12 my-4">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h4 mb-1">Les messages</h2>
                            <button type="button" data-toggle="modal" data-target="#composeMessage"
                                    class="btn btn-primary" style="position: absolute; right: 28px; top: 9px;">
                                Composer un message
                            </button>
                        </div>
                        <div class="card-body">
                            @if (count($errors) > 0 && 2 == $error_index)
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Sorry!</strong> invalid input.<br><br>
                                    <ul style="list-style-type:none;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(count($contacts)!=0)
                                <table class="table table-hover table-borderless border-v">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Message</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $value)
                                        <tr>
                                            <td>{{ $value->name }}</td>
                                            <td>{{$value->message}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                Il n'y a pas de messages
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="composeMessage" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Composer un message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>

                <form method="post" action="{{route('sendMail')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col">
                                <label for="toEmail" class="col-form-label">À: </label>
                                <input type="text" name="toEmail" id="toEmail" class="form-control" placeholder="À: ">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label for="subject" class="col-form-label">Sujet: </label>
                                <input type="text" name="subject" id="subject" class="form-control"
                                       placeholder="Sujet: ">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label for="message" class="col-form-label">Message: </label>
                                <textarea name="message" id="summernote"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section("scriptJs")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"
            integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA=="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"
            integrity="sha512-XKa9Hemdy1Ui3KSGgJdgMyYlUg1gM+QhL6cnlyTe2qzMCYm4nAZ1PsVerQzTTXzonUR+dmswHqgJPuwCq1MaAg=="
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"
            integrity="sha512-+cXPhsJzyjNGFm5zE+KPEX4Vr/1AbqCUuzAS8Cy5AfLEWm9+UI9OySleqLiSQOQ5Oa2UrzaeAOijhvV/M4apyQ=="
            crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#summernote').summernote({
                placeholder: 'Tapez un email',
                tabsize: 2,
                height: 250,
                callbacks: {
                    onImageUpload: function(image) {
                        uploadImage(image[0]);
                    }
                }
            });


            function uploadImage(image) {
                var data = new FormData();
                data.append("image", image);
                console.log('data: ' + data);
                $.ajax({
                    url: '{{route('sendMailImage')}}',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "post",
                    success: function(url) {
                        var image = $('<img>').attr('src', url);
                        $('#summernote').summernote("insertNode", image[0]);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        });
    </script>
@endsection
