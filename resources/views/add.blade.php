<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/welcome">Lottó</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Statisztika</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Új húzás</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    <form class="row" action="" method="post">
        @csrf
        <h2 class="text-center col-12 my-5">Új lottóhúzás</h2>
        <div class="col-md-6 mx-auto">
          @if($errors->any())
          <div class="alert alert-danger">
            @foreach(array_unique($errors->all()) as $item)
              <li>{{$item}}</li>
            @endforeach
          </div>
          @elseif(Session::has("success"))
            <div class="alert alert-success">
              {{Session::get("success")}}
            </div>
          @endif
          <div class="row">
            <div class="col-12">
              <input type="date" name="date" value="{{@old('date')}}" class="form-control">
              
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <input type="nr1" class="form-control" name="nr1" value="{{@old('nr1')}}">
            </div>
            <div class="col">
              <input type="nr2" class="form-control" name="nr2" value="{{@old('nr2')}}">
            </div>
            <div class="col">
              <input type="nr3" class="form-control" name="nr3" value="{{@old('nr3')}}">
            </div>
            <div class="col">
              <input type="nr4" class="form-control" name="nr4" value="{{@old('nr4')}}">
            </div>
            <div class="col">
              <input type="nr5" class="form-control" name="nr5" value="{{@old('nr5')}}">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 text-center">
              <button class="btn btn-success">Mentés</button>
            </div>
          </div>
        </div>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>