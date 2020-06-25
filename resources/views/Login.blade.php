<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
</head>

<body class="container">
    <br>
    <br>

    <div class="col-md-offset-3 col-sm-offset-3 col-md-6 col-sm-6">
        <div class="card">
            <div class="card-header">
                <center>
                    <h1>Login</h1>
                </center>
            </div>
            <div class="card-body">
                <form action="/Loginme" method="POST">
                    {{ csrf_field() }}
                    <label>UserName/ Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter UserName or Email" />
                    <br />

                    <label>Password</label>
                    <input type="text " name="pass" class="form-control" placeholder="ENter password" />
                    <br>

                    <input type="submit" class="btn btn-primary" value="Login" />
                </form>
            </div>
        </div>
    </div>

</body>

</html>
