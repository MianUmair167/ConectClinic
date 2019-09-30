@extends('admin.layouts.main')



@section('extracss')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet"/>
@endsection

@section('content')

    <div class="container">
        <div class="block-content">
            <nav class="breadcrumb push">
                <a class="breadcrumb-item" href="{{ route('admin') }}">Dashboard</a>
                <a class="breadcrumb-item" href="{{ route('spaces') }}">Spaces</a>
                <span class="breadcrumb-item active">Create Space</span>

            </nav>
        </div>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">User Type Data</h3>
            </div>
            <div class="block-content block-content-full">

                <input type="hidden" name="table_temp_id" value="<?php $tempId = md5(auth()->user()->toJson() . time()); echo $tempId; ?>">
                <input type="hidden" name="google_map_key" value="{{ env('GOOGLE_MAP_API') }}">

                <input type="hidden" name="lat" v-model="space.lat">
                <input type="hidden" name="lng" v-model="space.lng">

                <div class="container margin_60">

                    <div class="main_title">
                        <h2>Register clinic</h2>
                        <p>Enter as much detail</p>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="box_general_3 cart">

                                <div class="form_title">
                                    <h3><strong>1</strong>Location Details</h3>
                                    <p>Describe the location and catch the eye of the beholder.</p>
                                </div>

                                <div class="row step">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Enter location name</label>
                                                    <input type="text" class="form-control" id="title" name="title" v-model="space.title" placeholder="Clínica Conect">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Describe location</label>
                                                    <textarea id="description" name="description" class="form-control" v-model="space.description" placeholder="Ótima localização e espaço colaborativo."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Enter Website</label>
                                                    <input id="address" name="address" class="form-control" v-model="space.url" placeholder="www.minhaclinica.com.br"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="form_title">
                                    <h3><strong>2</strong>Location Address</h3>
                                    <p>Fill in the spot correctly to attract attention.</p>
                                </div>

                                <div class="row step">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label>Enter zip code</label>
                                                    <input id="postal_code" name="postal_code" class="form-control" v-model="space.postal_code" placeholder="01234-123"/>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <button class="btn btn-primary mt-4" v-on:click="searchPostalCode()">Search ZIP Code</button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label>
                                                        State</label>
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
                                                    <label>Neighborhood:</label>
                                                    <input id="address_neighborhood" name="address_neighborhood" class="form-control" v-model="space.address_neighborhood" placeholder="Paulista"/>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 col-sm-8">
                                                <div class="form-group">
                                                    <label>
                                                        Enter address</label>
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
                                    <h3><strong>3</strong>Set default time grid</h3>
                                    <p>Rest assured, you can edit later!</p>
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
                                    <h3><strong>4</strong>Put the photos of the place</h3>
                                    <p>Upload photos and draw attention to space.</p>
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

                                <div class="form_title">
                                    <h3><strong>4</strong>Select Amenities</h3>
                                    <p>Hold ctrl and select the amenities</p>
                                </div>

                                <div class="form-group">
                                    <label for="sel1">Select list:</label>
                                    <select multiple class="form-control" id="sel1" v-model="amenities">

                                        @foreach ($amenities as $amenity)
                                            <option value="{{$amenity->id}}">{{ $amenity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <hr>
                                <!--End step -->
                                <div id="policy">
                                    <h5>Privacy policy</h5>
                                    <div class="form-group mt-3">
                                        <div class="checkboxes">
                                            <label class="container_check">I accept the <a href="#0">terms and conditions of the privacy policy.</a>
                                                <input name="terms" type="checkbox" v-model="space.terms">
                                                <span for="terms" id="terms" class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary" v-on:click="submit()">
                                        <i class="fa fa-check"></i> Register space
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>

            </div>
        </div>
    </div>






@endsection

@section('extrajs')
    <script src="/node_modules/vue/dist/vue.min.js"></script>
    <script src="/node_modules/axios/dist/axios.min.js"></script>
    <script src="/site/js/jquery-2.2.4.min.js"></script>
    <script src="/site/js/common_scripts.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="/site/modules/spaces/create/init.js" type="text/javascript"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo env('GOOGLE_MAP_API') ?>&callback=page.initMap&libraries=places" type="text/javascript"></script>
@endsection