<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>{{ $personaje->nombre }} - DragonBall</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      min-height: 100vh;
    }
    .info-card {
      background: #ffffff;
      color: #212529;
      border-radius: 14px;
      padding: 2rem;
      margin-bottom: 2rem;
      border: 1px solid #e9ecef;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    }
    .detail-section {
      background: #ffffff;
      border-radius: 14px;
      padding: 1.5rem;
      margin-bottom: 1rem;
      border: 1px solid #e9ecef;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }
    
    .img-container {
      width: 100%;
      background: #f8f9fa;
      border-radius: 14px;
      padding: 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid #e9ecef;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }
    .img-container img {
      max-width: 100%;
      max-height: 500px;
      width: auto;
      height: auto;
      object-fit: contain;
      border-radius: 10px;
    }
    .badge-custom {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 8px;
      font-size: 0.85rem;
      font-weight: 500;
    }
    .section-title {
      font-size: 1.25rem;
      font-weight: 700;
      color: #212529;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>
  <div class="container my-5">
    <a href="{{ route('inicio') }}" class="btn btn-secondary mb-4">← Volver</a>

    <div class="row mb-4">
      <div class="col-md-4">
        <div class="img-container">
          <img src="{{ $personaje->imagen }}" alt="{{ $personaje->nombre }}">
        </div>
      </div>

      <div class="col-md-8">
        <div class="info-card">
          <h1 class="display-4 mb-3 fw-bold">{{ $personaje->nombre }}</h1>
          @if(isset($infoAdicional['description']))
            <p class="lead text-muted">{{ $infoAdicional['description'] }}</p>
          @endif
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="detail-section">
          <h3 class="section-title"> Información Básica</h3>
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none; padding: 0.75rem 0;">
              <strong style="color: #495057; font-weight: 600;">Raza:</strong>
              <span style="color: #6c757d;">{{ $personaje->raza ?? ($infoAdicional['race'] ?? 'Desconocida') }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none; padding: 0.75rem 0;">
              <strong style="color: #495057; font-weight: 600;">Ki:</strong>
              <span class="badge-custom">{{ $personaje->ki ?? ($infoAdicional['ki'] ?? 'N/A') }}</span>
            </li>
            @if(isset($infoAdicional['gender']))
            <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none; padding: 0.75rem 0;">
              <strong style="color: #495057; font-weight: 600;">Género:</strong>
              <span style="color: #6c757d;">{{ $infoAdicional['gender'] }}</span>
            </li>
            @endif
            @if(isset($infoAdicional['birthDate']))
            <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none; padding: 0.75rem 0;">
              <strong style="color: #495057; font-weight: 600;">Fecha de Nacimiento:</strong>
              <span style="color: #6c757d;">{{ $infoAdicional['birthDate'] }}</span>
            </li>
            @endif
            @if(isset($infoAdicional['height']))
            <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none; padding: 0.75rem 0;">
              <strong style="color: #495057; font-weight: 600;">Altura:</strong>
              <span style="color: #6c757d;">{{ $infoAdicional['height'] }}</span>
            </li>
            @endif
            @if(isset($infoAdicional['weight']))
            <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none; padding: 0.75rem 0;">
              <strong style="color: #495057; font-weight: 600;">Peso:</strong>
              <span style="color: #6c757d;">{{ $infoAdicional['weight'] }}</span>
            </li>
            @endif
          </ul>
        </div>
      </div>

      <div class="col-md-6">
        <div class="detail-section">
          <h3 class="section-title">⚔️ Características de Combate</h3>
          <ul class="list-group list-group-flush">
            @if(isset($infoAdicional['maxKi']))
            <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none; padding: 0.75rem 0;">
              <strong style="color: #495057; font-weight: 600;">Ki Máximo:</strong>
              <span class="badge-custom">{{ $infoAdicional['maxKi'] }}</span>
            </li>
            @endif
            @if(isset($infoAdicional['baseForm']))
            <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none; padding: 0.75rem 0;">
              <strong style="color: #495057; font-weight: 600;">Forma Base:</strong>
              <span style="color: #6c757d;">{{ $infoAdicional['baseForm'] }}</span>
            </li>
            @endif
            @if(isset($infoAdicional['transformations']) && is_array($infoAdicional['transformations']) && count($infoAdicional['transformations']) > 0)
            <li class="list-group-item" style="border: none; padding: 0.75rem 0;">
              <strong style="color: #495057; font-weight: 600;">Transformaciones:</strong>
              <div class="mt-2">
                @foreach($infoAdicional['transformations'] as $transformacion)
                  <span class="badge-custom me-1 mb-1">{{ $transformacion }}</span>
                @endforeach
              </div>
            </li>
            @endif
          </ul>
        </div>

        @if(isset($infoAdicional['affiliations']) && is_array($infoAdicional['affiliations']) && count($infoAdicional['affiliations']) > 0)
        <div class="detail-section mt-3">
          <h3 class="section-title"> Afiliaciones</h3>
          <div class="d-flex flex-wrap gap-2">
            @foreach($infoAdicional['affiliations'] as $afiliacion)
              <span class="badge-custom">{{ $afiliacion }}</span>
            @endforeach
          </div>
        </div>
        @endif

        @if(isset($infoAdicional['skills']) && is_array($infoAdicional['skills']) && count($infoAdicional['skills']) > 0)
        <div class="detail-section mt-3">
          <h3 class="section-title"> Técnicas</h3>
          <div class="d-flex flex-wrap gap-2">
            @foreach($infoAdicional['skills'] as $tecnica)
              <span class="badge-custom">{{ $tecnica }}</span>
            @endforeach
          </div>
        </div>
        @endif
      </div>
    </div>

    @if(isset($infoAdicional['universe']) || isset($infoAdicional['universeId']))
    <div class="row mt-3">
      <div class="col-12">
        <div class="detail-section">
          <h3 class="section-title"> Universo</h3>
          <ul class="list-group list-group-flush">
            @if(isset($infoAdicional['universe']))
            <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none; padding: 0.75rem 0;">
              <strong style="color: #495057; font-weight: 600;">Universo:</strong>
              <span style="color: #6c757d;">{{ $infoAdicional['universe'] }}</span>
            </li>
            @endif
            @if(isset($infoAdicional['universeId']))
            <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none; padding: 0.75rem 0;">
              <strong style="color: #495057; font-weight: 600;">ID del Universo:</strong>
              <span style="color: #6c757d;">{{ $infoAdicional['universeId'] }}</span>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
    @endif
  </div>
</body>
</html>
