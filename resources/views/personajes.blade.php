<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DragonDex (Base de datos)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container my-5">
  <h1 class="text-center mb-4">Personajes de Dragon Ball guardados en BD</h1>
  <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
    @foreach($personajes as $p)
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="{{ asset($p->imagen) }}" class="card-img-top" alt="{{ $p->nombre }}">
          <div class="card-body">
            <h5 class="card-title">{{ $p->nombre }}</h5>
            <p class="card-text">Raza: {{ $p->raza }}</p>
            <p class="card-text">Ki: {{ $p->ki }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="d-flex justify-content-center">
    {!! $personajes->links() !!}
  </div>
</body>
</html>
