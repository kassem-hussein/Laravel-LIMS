<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body>

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <form action="{{route('login')}}" method="post" class="w-50">
            <h4 class="text-center mb-2">AL-KAFI LIMS</h4>
            @if (Session::get('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            @csrf
            <div class="input-item">
                <label for="username" class="form-label require">username</label>
                <input type="text" id="username" name="username" class="form-control">
                @if($errors->has('username'))
                    <div class="form-text text-danger">
                        {{$errors->first('username')}}
                    </div>
                @endif
            </div>
            <div class="input-item">
                <label for="password" class="form-label require">password</label>
                <input type="password" id="password" name="password" class="form-control">
                @if($errors->has('password'))
                    <div class="form-text text-danger">
                       {{$errors->first('password')}}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-danger w-100 mt-3">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
