@extends('site.layouts.default')

@section('title')
    Cadastre sua clínica
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet"/>


@endsection

@section('content')

    <input type="hidden" name="table_temp_id" value="<?php $tempId = md5(auth()->user()->toJson() . time()); echo $tempId; ?>">
    <input type="hidden" name="google_map_key" value="{{ env('GOOGLE_MAP_API') }}">

    <input type="hidden" name="lat" v-model="space.lat">
    <input type="hidden" name="lng" v-model="space.lng">

    <div class="container margin_60">

        <div class="main_title">
            <h2>Cadastre a sua clínica</h2>
            <p>Informe o máximo de detalhes</p>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="box_general_3 cart">

                    <div class="form_title">
                        <h3><strong>1</strong>Detalhes do local</h3>
                        <p>Descreva seu local e chame a atenção de quem olha.</p>
                    </div>

                    <div class="row step">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Informe o nome do local</label>
                                        <input type="text" class="form-control" id="title" name="title" v-model="space.title" placeholder="Clínica Conect">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Descreva o local</label>
                                        <textarea id="description" name="description" class="form-control" v-model="space.description" placeholder="Ótima localização e espaço colaborativo."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Você possui um website?</label>
                                        <input id="address" name="address" class="form-control" v-model="space.url" placeholder="www.minhaclinica.com.br"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="form_title">
                        <h3><strong>2</strong>Endereço do local</h3>
                        <p>Preencha o local corretamente para atrair a atenção.</p>
                    </div>

                    <div class="row step">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label>Digite o CEP</label>
                                        <input id="postal_code" name="postal_code" class="form-control" v-model="space.postal_code" placeholder="01234-123"/>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <button class="btn btn-primary mt-4" v-on:click="searchPostalCode()">Buscar CEP</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select id="state_id" name="state_id" class="form-control" v-model="space.state_id">
                                            <option v-for="state in states">@{{ state.name }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <select id="state_id" name="city_id" class="form-control" v-model="space.city_id">
                                            <option v-for="city in cities">@{{ city.name }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Bairro:</label>
                                        <input id="address_neighborhood" name="address_neighborhood" class="form-control" v-model="space.address_neighborhood" placeholder="Paulista"/>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6 col-sm-8">
                                    <div class="form-group">
                                        <label>Digite o endereço</label>
                                        <input id="full_address" name="full_address" class="form-control" v-model="space.full_address" placeholder="Av. Paulista, São Paulo - SP"/>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label>Nº</label>
                                        <input id="address_number" name="address_number" class="form-control" v-model="space.address_number" placeholder="1000"/>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label>Comp.</label>
                                        <input id="address_complement" name="address_complement" class="form-control" v-model="space.address_complement" placeholder="5º andar"/>
                                    </div>
                                </div>
                            </div>

                            <div id="map" style="min-height: 250px"></div>
                        </div>
                    </div>
                    <hr>
                    <!--End step -->

                    <div class="form_title">
                        <h3><strong>3</strong>Defina a grade horária padrão</h3>
                        <p>Fique tranquilo, você poderá editar depois!</p>
                    </div>
                    <div class="step">
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
                    <hr>
                    <!--End step -->

                    <div class="form_title">
                        <h3><strong>4</strong>Coloque as fotos do local</h3>
                        <p>Faça upload das fotos e chame a atenção para o seu espaço.</p>
                    </div>
                    <div class="step">
                        <form action="<?php echo route("api.image.upload_image") ?>" class="dropzone" id="my-awesome-dropzone">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="<?php echo auth()->user()->id ?>">
                            <input type="hidden" name="table" value="spaces">
                            <input type="hidden" name="table_temp_id" value="<?php echo $tempId ?>">
                            <input type="hidden" name="slug" value="image">
                        </form>
                    </div>
                    <hr>
                    <!--End step -->
                    <div id="policy">
                        <h5>Política de privacidade</h5>
                        <div class="form-group mt-3">
                            <div class="checkboxes">
                                <label class="container_check">Eu aceito os <a href="#0">termos e condições da política de privacidade.</a>
                                    <input name="terms" type="checkbox" v-model="space.terms">
                                    <span for="terms" id="terms" class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary" v-on:click="submit()">
                            <i class="fa fa-check"></i> Cadastrar meu espaço
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>


@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="{{asset('site/modules/spaces/create/init.js')}}" type="text/javascript"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo env('GOOGLE_MAP_API') ?>&callback=page.initMap&libraries=places" type="text/javascript"></script>
@endsection