<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Grand Velas</title>
    {{-- importacion login --}}

    {{-- comment <link rel="stylesheet" href="{{ asset('assets/css/mestilo.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
    {{-- aqui ira login --}}
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                   {{-- div form --}}
                   <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 border mt-2">
                    <form class="mt-4" method="POST" action="">
                        @csrf
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 lead">Somos el equipo KRUZRD</p>
                        </div>
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Iniciar sesion</p>
                        </div>
                        <!-- error input -->
                        @error('mensaje')
                            <div class="form-outline mb-3">
                                <label class="alert alert-danger my" for="error">{{ $message }}</label>
                            </div>
                        @enderror
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input name="email"type="email" id="email" class="form-control form-control-lg"
                                placeholder="Usuario" />
                            <label class="form-label" for="email">Ingrese su Email</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input name="password"type="password" id="password" class="form-control form-control-lg"
                                placeholder="Clave" />
                            <label class="form-label" for="password">Ingrese Contraseña</label>
                        </div>
                        <button class="btn btn-outline-danger btn-lg mty-lg-0"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;" type="submit">Ingresar al
                            sistema</button>
                    </form>
                </div>
                {{-- end div from --}}
                <div class="col-md-9 col-lg-6 col-xl-5 mt-2" >
                    <img width="500" src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Sample image">
                </div>

            </div>
        </div>
    </section>

</body>

</html>


<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>
