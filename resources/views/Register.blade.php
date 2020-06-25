<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">

    <title>Register User</title>
</head>

<body class="container">
    <div class="col-md-offset-3 col-sm-6">
        <div class="card ">
            <div class="card-header">
                <h1>Register</h1>
            </div>
            <div class="card-body">
                <form action="/Registerme" method="post">
                    {{ csrf_field() }}
                    <label>Name :</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Your Name" />
                    <br>
                    <label>Email :</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Your Email" />
                    <br>
                    <label>Password :</label>
                    <input type="text" name="pass" class="form-control" placeholder="Enter Your Password" />
                    <br>
                    <center>
                        <input type="submit" class="btn btn-primary" value="Register" />
                    </center>
                </form>
            </div>
        </div>
</body>

</html>
