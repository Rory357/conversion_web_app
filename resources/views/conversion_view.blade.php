<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Conversion Web App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" src="{{url('css/css.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="{{url('js/js.js')}}"></script>
</head>
  <body>
  <header>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container">
          <a href="https://www.linkedin.com/in/c-prinsloo123" class="navbar-brand w-100">
            <div class="row">
              <div class="col-md-6">  
                <i class="bi bi-box"></i>
                  <strong> Converter Web App</strong>
              </div>
            
              <div class="col-md-6" style="text-align: right">
                <i class="bi bi-c-square"></i>  
                <strong>Chane Prinsloo</strong>
              </div>
            </div>
          </a>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Convert Units</h1>
          <p class="lead text-muted">Select from the dropdowns from which unit to another unit to convert accordingly</p>
          <p>
          <div class="row">
            <div class="col-md-5">
                <div class="input-group">
                    <input type="text" class="form-control" id="fromConvertValue" onChange="getValueConversion()" value="" placeholder="Value From which to convert" aria-label="Text input with dropdown button">
                    <div class="input-group-btn">
                    <select class="form-select" id="fromConvertUnit" onChange="getValueConversion()" aria-label="Default select example">
                    <option selected>From Unit</option>

                        @foreach ($users as $user)
                            <option value="{{ $user->unit }}">{{ $user->unit }}</option>
                        @endforeach

                    </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            <span class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"></path>
              </svg>
            </span>
            </div>
            <div class="col-md-5">
                <div class="input-group">
                    <input readonly type="text" class="form-control" id="toConvertValue" value="" placeholder="Value converted" aria-label="Text input with dropdown button">
                    <div class="input-group-btn">
                    <select class="form-select" id="toConvertUnit" onChange="getValueConversion()" aria-label="Default select example">
                    <option selected>To Unit</option>

                    @foreach ($users as $user)
                        <option value="{{ $user->unit }}">{{ $user->unit }}</option>
                    @endforeach

                    </select>
                    </div>
                </div>
            </div>
        </div>
          </p>
        </div>
      </section>
    </main>
    <!-- <div class="container text-center">
        <div class="row">
            <div class="alert alert-info" role="alert">
                Convert Metric to Imperial
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-5">
                <div class="input-group">
                    <input type="text" class="form-control" id="fromConvertValue" onChange="getValueConversion()" value="" aria-label="Text input with dropdown button">
                    <div class="input-group-btn">
                    <select class="form-select" id="fromConvertUnit" onChange="getValueConversion()" aria-label="Default select example">
                    <option selected>choose an option</option>

                        @foreach ($users as $user)
                            <option value="{{ $user->unit }}">{{ $user->unit }}</option>
                        @endforeach

                    </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
            <button type="button" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"></path>
                </svg></button>
            </div>
            <div class="col-lg-5">
                <div class="input-group">
                    <input readonly type="text" class="form-control" id="toConvertValue" value="" aria-label="Text input with dropdown button">
                    <div class="input-group-btn">
                    <select class="form-select" id="toConvertUnit" onChange="getValueConversion()" aria-label="Default select example">
                    <option selected>choose an option</option>

                    @foreach ($users as $user)
                        <option value="{{ $user->unit }}">{{ $user->unit }}</option>
                    @endforeach

                    </select>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

