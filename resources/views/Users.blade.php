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
    <form action="/LogOut" method="GET">
        <input type="submit" class="btn btn-warning" value="Logout" />
        <br>
    </form>
    <br>
    <div class="container-fluid">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <th>Name</th>
                <th>Email</th>
            </thead>
            @foreach ($users as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
