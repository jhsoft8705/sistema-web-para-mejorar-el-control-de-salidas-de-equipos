@extends('index')

@section('template_title')
    DASHBOARD
@endsection
@section('contenedorsiderbar')
<p>DATA</p>
@endsection
@section('content')
    <div class="app-content">
        <section class="section">
            <div class="row">
                <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                    <div class="card bg-warning text-white ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="icon1 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                                            <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                                            <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
                                          </svg>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mt-3 text-center">
                                        <span class="text-white">ENTRADAS</span>
                                        <h2 class="text-white mb-0">    @if($estados)
                                            {{count($estados)}}
                                            @elseif($estados!=0)
                                            0
                                            @endif</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                    <div class="card bg-warning text-white ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="icon1 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                                            <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                                            <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
                                          </svg>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mt-3 text-center">
                                        <span class="text-white">SALIDAS</span>
                                        <h2 class="text-white mb-0">     @if($estados_fuera)
                                            {{count($estados_fuera)}}
                                            @elseif($estados_fuera!=0)
                                            0
                                            @endif</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                    <div class="card bg-primary text-white ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="icon1 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                          </svg>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mt-3 text-center">
                                        <span class="text-white">USUARIOS</span>
                                        <h2 class="text-white mb-0">{{$users->count() }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                    <div class="card bg-primary text-white ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="icon1 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-house-check" viewBox="0 0 16 16">
                                            <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708L7.293 1.5Z"/>
                                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547 1.17-1.951a.5.5 0 1 1 .858.514Z"/>
                                          </svg>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mt-3 text-center">
                                        <span class="text-white">SITES</span>
                                        <h2 class="text-white mb-0">{{ $sites->count() }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>






@endsection
