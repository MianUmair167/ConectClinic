@extends('site.layouts.default')
@section("title")Encontre a melhor clínica para você!@endsection

@section('content')

    <div class="hero_home version_1">
        <div class="content">
            <h3>A clínica perfeita para você!</h3>
            <p>
                É a principal plataforma que conecta profissionais para espaços de saúde e bem-estar de uma forma prática e inovadora
            </p>
            <form method="get" action="<?php echo route('explore.all') ?>">
                <div id="custom-search-input">
                    <div class="input-group">
                        <input type="text" class="search-query" placeholder="Ex. Cidade, Bairro ou Nome da clínica ....">
                        <input type="submit" class="btn_search" value="Buscar">
                    </div>
                    <ul>
                        <li>
                            <input type="radio" id="all" name="radio_search" value="all" checked>
                            <label for="all">Todos</label>
                        </li>
                        <li>
                            <input type="radio" id="doctor" name="radio_search" value="clinic">
                            <label for="doctor">Clínicas</label>
                        </li>
                        <li>
                            <input type="radio" id="clinic" name="radio_search" value="cities">
                            <label for="clinic">Cidades</label>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    <!-- /Hero -->

    <div class="container margin_120_95">
        <div class="main_title">
            <h2>Descubra tudo <strong>online!</strong></h2>
            <p>Agora com o Conect Clinic ficou fácil.</p>
        </div>
        <div class="row add_bottom_30">
            <div class="col-lg-4">
                <div class="box_feat" id="icon_1">
                    <span></span>
                    <h3>Encontre um local</h3>
                    <p>Busque um local pela proximidade, nome, tipo de equipamentos e muito mais.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_feat" id="icon_2">
                    <span></span>
                    <h3>Analise</h3>
                    <p>Compare com outros locais, escolha o melhor para você!</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_feat" id="icon_3">
                    <h3>Agende uma visita</h3>
                    <p>Veja na prática se é o local ideal para você e agende!</p>
                </div>
            </div>
        </div>
        <!-- /row -->
        <p class="text-center">
            <a href="<?php echo route('explore.all') ?>" class="btn_1 medium">Explorar locais</a>
        </p>

    </div>
    <!-- /container -->

    <div class="bg_color_1">
        <div class="container margin_120_95">
            <div class="main_title">
                <h2>Últimas clínicas cadastradas</h2>
            </div>
            <div id="reccomended" class="owl-carousel owl-theme">
                <div class="item">
                    <a href="detail-page.html">
                        <div class="views"><i class="icon-eye-7"></i>140</div>
                        <div class="title">
                            <h4>Dr. Julia Holmes<em>Pediatrician - Cardiologist</em></h4>
                        </div><img src="http://via.placeholder.com/350x500.jpg" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="detail-page.html">
                        <div class="views"><i class="icon-eye-7"></i>120</div>
                        <div class="title">
                            <h4>Dr. Julia Holmes<em>Pediatrician</em></h4>
                        </div><img src="http://via.placeholder.com/350x500.jpg" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="detail-page.html">
                        <div class="views"><i class="icon-eye-7"></i>115</div>
                        <div class="title">
                            <h4>Dr. Julia Holmes<em>Pediatrician</em></h4>
                        </div><img src="http://via.placeholder.com/350x500.jpg" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="detail-page.html">
                        <div class="views"><i class="icon-eye-7"></i>98</div>
                        <div class="title">
                            <h4>Dr. Julia Holmes<em>Pediatrician</em></h4>
                        </div><img src="http://via.placeholder.com/350x500.jpg" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="detail-page.html">
                        <div class="views"><i class="icon-eye-7"></i>98</div>
                        <div class="title">
                            <h4>Dr. Julia Holmes<em>Pediatrician</em></h4>
                        </div><img src="http://via.placeholder.com/350x500.jpg" alt="">
                    </a>
                </div>
            </div>
            <!-- /carousel -->
        </div>
        <!-- /container -->
    </div>
    <!-- /white_bg -->


    <div id="app_section">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <p>
                        <br>
                        <br>
                        <img src="/site/img/conect-logo-w.png" alt="" class="img-fluid" width="400" height="200"></p>
                </div>
                <div class="col-md-6">
                    <small>Uma nova plataforma</small>
                    <h3>Tecnologia e facilidade com <strong>Conect Clinic</strong></h3>
                    <p class="lead">
                        É a principal plataforma que conecta profissionais para espaços de saúde e bem-estar de uma forma prática e inovadora
                    </p>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /app_section -->


@endsection