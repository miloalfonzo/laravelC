<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<h1>Editar nota {{$nota->id}}</h1>
@if (session('mensaje'))
    <div class="alert alert-success">{{session('mensaje')}}</div>
@endif
<form action="{{ route('notas.update', $nota->id) }}" method="POST">
    @method('PUT')
      @csrf

      @error('nombre')
          <div class="alert alert-danger">
              El nombre es obligatorio
          </div>
      @enderror

      @error('descripcion')
          <div class="alert alert-danger">
              La descripción es obligatoria
          </div>
      @enderror
        <input type="text" name="nombre" value="{{$nota->nombre}}" placeholder="Nombre" class="form-control mb-2">
        <input type="text" name="descripcion" value="{{$nota->descripcion}}" placeholder="Descripcion" class="form-control mb-2">   
        <button type="submit" class=" btn btn-warning btn-block">Editar</button>     
</form>
</body>
</html>