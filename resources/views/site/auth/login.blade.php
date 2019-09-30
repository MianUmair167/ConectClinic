@extends('site.layouts.default')

@section('content')
    <div class="bg_color_2">
        <div class="container margin_60_35">
            <div id="login-2">
                <h1>Faça login no ConectClinic</h1>

                <form class="box_form form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label for="email" class="control-label">E-Mail</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label for="password" class="control-label">Senha</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar a senha
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                Fazer login
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Esqueceu a senha?
                            </a>
                        </div>
                        <br>
                    </div>
                </form>
                <p class="text-center link_bright">Ainda não tem uma conta? <a href="#0"><strong>Registrar agora!</strong></a></p>
            </div>
            <!-- /login -->
        </div>
    </div>
@endsection
