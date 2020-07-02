<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{asset('js/JS_Validation.js')}}"></script>

    <script type="text/javascript">
        var _formData = [];
        $(document).ready(function(){
                $("#title").blur(function(){
                                var title = document.getElementById("title").value;
                                checkNull_OnlyText_WithSpace(title,"title_error","blog title");
                                });

                $("#blogContent").blur(function(){
                                var blogContent = document.getElementById("blogContent").value;
                                checkNull_OnlyText_WithSpace(blogContent,"blogContent_error","blog content");
                                });

                $('#upload_form').on('submit', function(event){
                                event.preventDefault();

                                var blogContent = document.getElementById("blogContent").value;
                                var title = document.getElementById("title").value;
                                var File = $('#bimg').prop('files')[0];

                                //Validations Start
                                var IsError = false;
                                IsError = checkNull_OnlyText_WithSpace(title,"title_error","Title");
                                IsError = checkNull_OnlyText_WithSpace(blogContent,"blogContent_error","Blog Content");
                                if(IsError == true)
                                    return;
                                //Validations End

                                //_formData = new FormData(this);
                                _formData = new FormData();
                                _formData.append("title",title);
                                _formData.append("blogContent",blogContent);
                                _formData.append('file', File);

                                  $.ajax({
                                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                            url:'/insertBlog',
                                            type:'POST',
                                            data:_formData,
                                            contentType:false,
                                            dataType:'json',
                                            processData:false,
                                                success:function(data)
                                                {
                                                    hideLoader();
                                                    console.log(data.msg);
                                                },
                                                error:function(data)
                                                {   
                                                    console.log(data);
                                                }
                                        });
                });
        });

            function insertBlog()
            {
                var title = document.getElementById("title").value;
                var blogContent = document.getElementById("blogContent").value;

                //Validations Start
                var IsError = false;
                IsError = checkNull_OnlyText_WithSpace(title,"title_error","Title");
                IsError = checkNull_OnlyText_WithSpace(blogContent,"blogContent_error","Blog Content");
                if(IsError == true)
                    return;
                //Validations End

                showLoader();
                let _token = $('meta[name="csrf-token"]').attr('content');

                var formData = new FormData();
                formData.append('token',_token);
                formData.append('file',$("#bimg")[0].files[0]);
                formData.append('title',title);
                formData.append('blogContent',blogContent);

                var Files = $("#bimg").prop('files')[0];;
                console.log(Files);

                $.post({
                    url:'/insertBlog',
                data:{"_token":_token,
                        "title":title,
                        "blogContent":blogContent,
                        "File":Files
                },
                processData:false,
                    success:function(data)
                    {
                        hideLoader();
                        alert(data.msg);
                        console.log(data.msg);
                    },
                    error:function(data)
                    {
                        console.log(data);
                    }
                });
            }
    </script>
</head>

<body class="container" id="b">
    <br>
    <br>
    <div class="col-md-offset-3 col-sm-offset-3 col-md-6 col-sm-6">
        <div class="card">
            <div class="card-header">
                <center>
                    <h1>Hello ...
                        @foreach ($user as $item)
                        {{$item->email}}
                        @endforeach
                    </h1>
                    <h3>Welcome to the blog listing syetm</h3>
                </center>
            </div>
            <div class="card-body">
                <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Add blog</button>
                <a href="#" class="btn btn-default">View blog</a>
                <a href="/LogOut" class="btn btn-warning">Logout</a>
                <br>
                <br>
                <h3>
                    @foreach ($user as $item)
                    <label>Name:</label><label>{{$item->name}}</label><br>
                    <label>Email:</label><label>{{$item->email}}</label><br>
                    <label>Total Blogs:</label><label>{{$item->name}}</label><br>
                    @endforeach
                </h3>
            </div>
        </div>

    </div>
    <!-- Bootstrap Model -->

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>

                </div>
                <div class="modal-body">
                    <form method="post" action="javascript:void(0)" id="upload_form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title" />
                        <label id="title_error"></label>
                        <br>
                        <textarea class="form-control" id="blogContent" name="blogContent" rows="5"
                            cols="35"></textarea>
                        <label id="blogContent_error"></label>
                        <br>
                        <input type="file" id="bimg" name="bimg" />
                        <br>
                        <center>
                            <input type="button" class="btn btn-primary " onclick="insertBlog()" value="Add Blog" />
                            <div id="Loader" style="display: none">
                                <img src="Loaders/Loader1.gif" height="37px">
                            </div>
                        </center>
                        <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload">
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>

    </div>

</body>




</html>
