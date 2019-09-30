@extends('site.layouts.default')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <link href="/site/modules/explore/view/init.css" rel="stylesheet"/>
@endsection

@section('content')

    <input type="hidden" name="space_id" value="{{$space->id}}">
    <input type="hidden" name="hour_preference" value="{{$space->hour_preference}}">

    <div class="row">
        <div class="col-md-12">
            <div class="images">
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">

                    @foreach ($space->images as $image)
                        <!-- Slides -->
                            <div class="swiper-slide">
                                <img height="400px" src="/images/{{$image->image_name}}">
                            </div>
                        @endforeach
                    </div>
                    <!-- If we need navigation buttons -->

                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="container margin_60">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <nav id="secondary_nav">
                    <div class="container">
                        <h1 class="text-white">{{ $space->title }}</h1>
                    </div>
                </nav>
                <div id="section_1">
                    <div class="box_general_3">
                        <div class="profile">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <p>{{ $space->description }}</p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- /profile -->
                        <div class="indent_title_in">
                            <i class="pe-7s-map"></i>
                            <ul class="contacts">
                                <li>
                                    <h3>Endereço</h3>
                                    <p class="mt-2">{{ $space->full_address }}</p>
                                </li>
                            </ul>
                            <div id="map" class="mt-3" style="height: 300px"></div>
                        </div>

                        <hr>

                        <div class="indent_title_in">
                            <i class="pe-7s-news-paper"></i>
                            <h3>Grade horária disponível</h3>

                            <div class="table-responsive">
                                <table class="table table-light">
                                    <tr>
                                        <td></td>
                                        <td v-for="hour in hours">@{{ hour.hour }}</td>
                                    </tr>
                                    <tr v-for="day in days">
                                        <td>@{{ day.name }}</td>
                                        <td v-for="(hour, index) in day.hours">
                                            <input type="checkbox" v-model="hour.value">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /section_1 -->
                </div>
                <!-- /box_general -->

                <?php /*
                <div id="section_2">
                    <div class="box_general_3">
                        <div class="reviews-container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div id="review_summary">
                                        <strong>4.7</strong>
                                        <div class="rating">
                                            <i class="icon_star voted"></i>
                                            <i class="icon_star voted"></i>
                                            <i class="icon_star voted"></i>
                                            <i class="icon_star voted"></i>
                                            <i class="icon_star"></i>
                                        </div>
                                        <small>Baseado em x reviews</small>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                </div>
                            </div>
                            <!-- /row -->

                            <hr>

                            <div class="review-box clearfix">
                                <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg" alt="">
                                </figure>
                                <div class="rev-content">
                                    <div class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                    </div>
                                    <div class="rev-info">
                                        Admin – April 03, 2016:
                                    </div>
                                    <div class="rev-text">
                                        <p>
                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End review-box -->

                            <div class="review-box clearfix">
                                <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg" alt="">
                                </figure>
                                <div class="rev-content">
                                    <div class="rating">
                                        <i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                    </div>
                                    <div class="rev-info">
                                        Ahsan – April 01, 2016
                                    </div>
                                    <div class="rev-text">
                                        <p>
                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End review-box -->

                            <div class="review-box clearfix">
                                <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg" alt="">
                                </figure>
                                <div class="rev-content">
                                    <div class="rating">
                                        <i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                    </div>
                                    <div class="rev-info">
                                        Sara – March 31, 2016
                                    </div>
                                    <div class="rev-text">
                                        <p>
                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End review-box -->
                        </div>
                        <!-- End review-container -->
                        <hr>
                        <div class="text-right"><a href="submit-review.html" class="btn_1">Submit review</a></div>
                    </div>
                </div>
                <?php */ ?>

            </div>
            <!-- /col -->
            <aside class="col-xl-4 col-lg-4" id="sidebar">
                <div class="box_general_3 booking">
                    <form>
                        <div class="title">
                            <h3>Agende uma visita</h3>
                            <small>Escreva sua mensagem e agende a visita.</small>
                        </div>

                        @auth
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea v-model="message" class="form-control" id="booking_date" placeholder="Olá, gostaria de agendar uma visita..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <button id="messageButton" type="button" v-bind:disabled="messageButtonDisabled" v-on:click="sendMessage()" class="btn_1 full-width">Enviar mensagem</button>

                        @else

                            <div class="text-center">
                                <p>Faça login ou registre-se para enviar uma mensagem.</p>

                                <a class="btn " href="{{ route('login') }}">Login</a>
                                <a class="btn " href="{{ route('register') }}">Registrar</a>
                            </div>
                        @endif

                    </form>
                </div>
                <!-- /box_general -->
            </aside>
            <!-- /asdide -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

@endsection


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
    <script src="/site/modules/explore/view/init.js" type="text/javascript"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo env('GOOGLE_MAP_API') ?>&callback=page.initMap&libraries=places" type="text/javascript"></script>
@endsection