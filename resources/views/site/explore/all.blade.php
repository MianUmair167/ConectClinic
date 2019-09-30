@extends('site.layouts.default')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <link href="/site/modules/explore/all/init.css" rel="stylesheet"/>
@endsection

@section('content')

    <form action="?" type="GET">
        <div id="results">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>Mostrando 12</strong> de {{$spaces->total()}} resultados</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="search_bar_list">
                            <input type="text" name="term" class="form-control" placeholder="Ex. Clínica Conect, São Paulo..." v-model="search.term">
                            <input type="submit" class="search-query"  value="Buscar..." v-on:click="search()">
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /results -->
    </form>

    <!--div class="filters_listing">
        <div class="container">
            <ul class="clearfix">
                <li>
                    <h6>Type</h6>
                    <div class="switch-field">
                        <input type="radio" id="all" name="type_patient" value="all" checked>
                        <label for="all">All</label>
                        <input type="radio" id="doctors" name="type_patient" value="doctors">
                        <label for="doctors">Doctors</label>
                        <input type="radio" id="clinics" name="type_patient" value="clinics">
                        <label for="clinics">Clinics</label>
                    </div>
                </li>
                <li>
                    <h6>Layout</h6>
                    <div class="layout_view">
                        <a href="grid-list.html"><i class="icon-th"></i></a>
                        <a href="#0" class="active"><i class="icon-th-list"></i></a>
                        <a href="list-map.html"><i class="icon-map-1"></i></a>
                    </div>
                </li>
                <li>
                    <h6>Sort by</h6>
                    <select name="orderby" class="selectbox">
                        <option value="Closest">Closest</option>
                        <option value="Best rated">Best rated</option>
                        <option value="Men">Men</option>
                        <option value="Women">Women</option>
                    </select>
                </li>
            </ul>
        </div>
    </div-->

    <div class="container margin_60_35">
        @if(sizeof($spaces) > 0)
            <div class="row">
                @foreach($spaces as $space)
                    <div class="col-md-4">
                        <div class="box_list wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                            <a href="#0" class="wish_bt"></a>
                            <figure>
                                <div class="images">
                                    <!-- Slider main container -->
                                    <div class="swiper-container">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">

                                        @foreach ($space->images as $image)
                                            <!-- Slides -->
                                                <div class="swiper-slide">
                                                    <img src="/images/{{$image->image_name}}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- If we need navigation buttons -->
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>
                                </div>
                            </figure>
                            <div class="wrapper">
                                <small>{{ $space->full_address }}</small>
                                <h3><a href="{{ route('explore.view', [$space->id, 'slug']) }}">{{ $space->title }}</a></h3>

                                <p>{{ substr(strip_tags($space->description), 0, 120) }}{{  strlen(strip_tags($space->description)) > 120 ? "..." : "" }}</p>
                                <!--span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span-->
                            </div>
                            <ul>
                                <li><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank"><i class="icon_pin_alt"></i>Ver no mapa</a></li>
                                <li><a href="{{ route('explore.view', [$space->id, 'slug']) }}">Ver mais</a></li>
                            </ul>
                        </div>
                    </div>

                @endforeach
            </div>

            <nav class="add_top_20">
                <ul class="pagination pagination-sm">
                    {{ $spaces->links() }}
                </ul>
            </nav>
        </div>
        @else

            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center mt-5 mb-5">Nenhum resultado encontrado :/</h4>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
    <script src="/site/modules/explore/all/init.js" type="text/javascript"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API') }}&callback=page.initMap&libraries=places" type="text/javascript"></script>
@endsection