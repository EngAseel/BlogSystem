<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
body {
            background-color: #eeeeee;
        }

        .h7 {
            font-size: 0.8rem;
        }

        .gedf-wrapper {
            margin-top: 0.97rem;
        }

        @media (min-width: 992px) {
            .gedf-main {
                padding-left: 4rem;
                padding-right: 4rem;
            }
            .gedf-card {
                margin-bottom: 2.77rem;
            }
        }

        /**Reset Bootstrap*/
        .dropdown-toggle::after {
            content: none;
            display: none;
        }
        </style>
</head>
<body>

<!------ Include the above in your HEAD tag ---------->


        
 
<nav class="navbar navbar-light bg-white">
        <a href="#" class="navbar-brand">Bootsbook</a>
        <form class="form-inline">
            <div class="input-group">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" id="button-addon2">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </nav>


    <div class="container-fluid gedf-wrapper">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="h5">@ {{\Auth::user()->name}}</div>
                        <div class="h7 text-muted">National ID : {{\Auth::user()->national_id}}</div>
                        @if(\Auth::user()->gender==0)
                        <div class="form-group">
                        Gender : <br>
                        <select name="genderp" class="form-control" id="genderp" >
                        <option value="0" >choose</option>

                        <option value="1">Male</option>
                        <option value="2">FeMale</option>
                        </select>

                        </div>
                        @else
                        <div class="h7 text-muted">Gender : {{\Auth::user()->gender}}</div>

                        @endif
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-6 gedf-main">

                <!--- \\\\\\\Post-->
                <div class="card gedf-card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make
                                    a publication</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Images</a>
                            </li> -->
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                            <div class="form-group">
                                    <label class="sr-only" for="message">title</label>
                                    <input type="text" class="form-control" id="titlep" placeholder="title">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="message">post</label>
                                    <textarea class="form-control" id="bodyp" rows="3" placeholder="What are you thinking?"></textarea>
                                </div>

                            </div>
                            
                        </div>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                                <button type="submit" id="btnsubmit" class="btn btn-primary">share</button>
                            </div>
                            <div class="btn-group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-globe"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> Public</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-users"></i> Friends</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Just me</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post /////-->

                <!--- \\\\\\\Post-->
                <div id="postsp">
                @foreach($posts as $post)
                <div class="card gedf-card" id="post{{$post->id}}">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">@ {{$post->user->name}}</div>
                                    <div class="h7 text-muted">{{$post->user->id}}</div>
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                        <div class="h6 dropdown-header">Configuration</div>
                                        <a class="dropdown-item deletePost" href="#"  data-id="{{$post->id}}">delete</a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>{{$post->created_at}}</div>
                        <a class="card-link" href="#">
                            <h5 class="card-title">{{$post->title}}</h5>
                        </a>

                        <p class="card-text">
                           {{$post->body}}.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                    </div>
                </div>
                @endforeach
                </div>
                <!-- Post /////-->







            </div>
            
        </div>
    </div>
    <script
  src="http://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
       <script>
       $('#btnsubmit').on('click', function(){
            var title=$('#titlep').val();
            var body = $('#bodyp').val();
            var csrf = '{{csrf_token()}}';
            $.ajax({
                url: "{{route('post.store')}}",
                method:'post',
                data:{
                    title:title, body:body , _token:csrf
                },
                success:function (data) {
                   $('#postsp').append(data);
                },
                fail:function (data){
                    alert(data['error']);
                }
                });
       });
       $('#genderp').on('change', function(){
            var gender=$('#genderp').val();
            var id='{{\Auth::user()->id}}'
            
            var csrf = '{{csrf_token()}}';
            $.ajax({
                url: "{{route('updateProfile')}}",
                method:'post',
                data:{
                    gender:gender, id:id , _token:csrf
                },
                success:function (data) {
                    alert(data);
                    location.reload();
                },
                fail:function (data){
                    alert(data);
                }
                });
       });
       $('.deletePost').on('click',function(event){
           event.preventDefault();
            var id=$(this).data('id');
            
            var csrf = '{{csrf_token()}}';
            $.ajax({
                url: "{{route('post.index')}}/"+id,
                method:'DELETE',
                data:{
                     id:id , _token:csrf,_method:'DELETE'
                },
                success:function (data) {
                    
                    location.reload();
                },
                fail:function (data){
                    alert(data);
                }
                });
       })

       </script>
    </body>
    </html>