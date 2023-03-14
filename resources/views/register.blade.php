<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="resources/css/login.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style> 
        .login-form {
            padding: 40px;
            background-color: white;
            margin: auto;
            margin-top: 100px;
            width: 400px;
            font-size: 18px;
            border-radius: 10px;
            box-shadow: 0px 0px 8px 5px rgba(0, 0, 0, .4);
            min-height: 100px;
        }
    </style>
</head>
<body>
    <div class="container col-5 pt-5 login-form" >
        <div class="pt-5 pb-5" style="text-align:center">
            <h4>Register</h4>
        </div>
        <form method="POST" action="{{route('postsignup')}}">
        @csrf
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name')}}</span>
                @endif
            </div>
            <div class="mb-3">
                <label  class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" >
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email')}}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" >
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password')}}</span>
                @endif
            </div>
            
           <div style="text-align:center">
                <button type="submit" class="btn btn-success" >Sign Up</button>
           </div>
        </form>
    </div>
</body>
</html>