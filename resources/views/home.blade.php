<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}">
            <h3>ApiTp</h3>
          </a>
        </div>
      </nav>
      <button><a href="{{ route('Contents.getlist', ['modalidad' => 'EMAIL']) }}">Lista Mails</a></button>
      @csrf
      <button><a href="{{ route('Contents.getlist', ['modalidad' => 'SMS_CORTO']) }}">Lista SMS</a></button>
      @csrf
      <button><a href="{{ route('Contents.getlist', ['modalidad' => 'IVR']) }}">Lista IVR</a></button>
      @csrf
      <button><a href="{{ route('Contents.getmails')}}">Get Mails</a></button>
      @csrf
      <button><a href="{{ route('Contents.linkshort')}}">Link Short</a></button>
      @csrf
      @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>