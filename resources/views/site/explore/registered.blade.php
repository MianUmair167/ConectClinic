@extends('site.layouts.default')
@section('content')

    <div class="container margin_120_95">

        <div class="main_title">
            <h2>Como podemos ajudar você?</h2>
            <p>É a principal plataforma que conecta profissionais para espaços de saúde e bem-estar de uma forma prática e inovadora.</p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <a class="box_feat_about" href="<?php echo route('explore.all') ?>">
                    <i class="pe-7s-id"></i>
                    <h2>Quero trabalhar</h2>
                    <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
                </a>
            </div>

            <div class="col-md-6">
                <a class="box_feat_about" href="<?php echo route('spaces.create') ?>">
                    <i class="pe-7s-date"></i>
                    <h2>Quero alugar</h2>
                    <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
                </a>
            </div>
        </div>
    </div>


@endsection