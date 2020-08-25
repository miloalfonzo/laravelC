<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <h4 class="display-4">Notas</h4>
      
      @if (session('mensaje'))
          <div class="alert alert-success">
            {{session('mensaje')}}
          </div>
      @endif

      <form action="{{ route('notas.crear') }}" method="POST">
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
        <input type="text" name="nombre" value="{{old('nombre')}}" placeholder="Nombre" class="form-control mb-2">
        <input type="text" name="descripcion" value="{{old('descripcion')}}" placeholder="Descripcion" class="form-control mb-2">   
        <button type="submit" class=" btn btn-primary btn-block">Agregar</button>     
      </form>        
<table class="table">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($notas as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>
        <a href="{{route('notas.detalle', $item) }}">
          {{$item->nombre}}
          </a>
      </td>
      <td>{{$item->descripcion}}</td>
      <td>
        <a href="{{route('notas.editar', $item)}}" class="btn btn-warning btn-sm">Editar</a>
        <form action="{{route('notas.eliminar', $item)}}"
         method="POST"
         class="d-inline">
          @method('DELETE')
          @csrf
          <button class="btn btn-danger btn-sm" type="submit">
           Eliminar 
           </button>
        </form>
      </td>
    </tr>
    @endforeach()
  </tbody>
</table>
  {{$notas->links()}}
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>