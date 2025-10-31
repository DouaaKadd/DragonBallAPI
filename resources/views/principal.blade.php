<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>DragonBall Laravel Cloud</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      min-height: 100vh;
    }
    .header-section {
      background: #d00909;
      border-radius: 16px;
      padding: 3rem 2rem;
      margin-bottom: 3rem;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      border: 1px solid #e9ecef;
    }
    .character-card {
      background: #ffffff;
      border-radius: 14px;
      overflow: hidden;
      transition: all 0.3s ease;
      border: 1px solid #e9ecef;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      height: 100%;
      display: flex;
      flex-direction: column;
      max-width: 100%;
    }
    .character-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
      border-color: #ff0bae;
    }
    .character-card .img-container {
      width: 100%;
      height: 350px;
      overflow: hidden;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #f8f9fa;
    }
    .character-card img {
      max-width: 100%;
      max-height: 100%;
      width: auto;
      height: auto;
      object-fit: contain;
      transition: transform 0.3s ease;
      display: block;
    }
    .character-card:hover img {
      transform: scale(1.05);
    }
    .character-card .card-body {
      padding: 1.5rem;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }
    .character-card .card-title {
      font-size: 1.4rem;
      font-weight: 700;
      color: #212529;
      margin-bottom: 1rem;
    }
    .character-card .card-text {
      color: #6c757d;
      margin-bottom: 0.5rem;
      font-size: 0.95rem;
    }
    .character-card .card-text strong {
      color: #495057;
      font-weight: 600;
    }
    .badge-custom {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 8px;
      font-size: 0.85rem;
      font-weight: 500;
    }
    .stats-row {
      margin-top: auto;
      padding-top: 1rem;
      border-top: 1px solid #e9ecef;
    }
  </style>
</head>
<body>
  <div class="container my-5">
    <div class="header-section text-center">
      <h1 class="display-4 mb-3 fw-bold" style="color: #212529;">DragonBall Laravel Cloud</h1>
      <p class="lead text-muted mb-0">Personajes de Dragon Ball- Activitat AEA 1</p>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach($personajes as $p)
        <div class="col">
          <a href="{{ route('detalle.personaje', $p->id) }}" class="text-decoration-none">
            <div class="character-card">
              <div class="img-container">
                <img src="{{ $p->imagen }}" alt="{{ $p->nombre }}" loading="lazy">
              </div>
              <div class="card-body">
                <h5 class="card-title">{{ $p->nombre }}</h5>
                <div class="stats-row">
                  <p class="card-text mb-2">
                    <strong>Raza:</strong> {{ $p->raza ?? 'Desconocida' }}
                  </p>
                  <p class="card-text mb-0">
                    <strong>Ki:</strong> 
                    <span class="badge-custom">{{ $p->ki ?? 'N/A' }}</span>
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</body>
</html>
