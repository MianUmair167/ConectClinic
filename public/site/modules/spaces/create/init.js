var page = new Vue({
    el: 'main',
    data: {
        mapKey: $("[name='google_map_key']").val(),
        map: null,
        space: {},
        states: [],
        cities: [],
        amenities: [],
        days: [
            { i: 0, name: "Monday", hours: [] },
            { i: 1, name: "Tuesday", hours: [] },
            { i: 2, name: "Wednesday", hours: [] },
            { i: 3, name: "Thursday", hours: [] },
            { i: 4, name: "Friday", hours: [] },
            { i: 5, name: "Saturday", hours: [] },
            { i: 6, name: "Sunday", hours: [] },
        ],
        hours: [],
    },

    created: function() {
        this.processDaysHours();
    },

    methods: {

        searchPostalCode: function() {
            var thisApp = this;

            $.ajax({
                url: 'https://maps.googleapis.com/maps/api/geocode/json?address='+ this.space.postal_code + '&key=' + this.mapKey,
                type: "GET",
                success:function(response) {
                    var result = response.results;
                    thisApp.getAddressComponents(result)
                }
            })

        },

        getAddressComponents: function(results) {
            var thisApp = this;

            if(typeof results == typeof undefined || results.length <= 0) {
                return;
            }

            if(results[0].geometry.location) {
                this.space.lat = results[0].geometry.location.lat;
                this.space.lng = results[0].geometry.location.lng;
            }

            results[0].address_components.forEach(function(component) {
                component.types.forEach(function(type) {
                    console.log(type,['sublocality'].indexOf(type) >= 0)
                    if(['sublocality'].indexOf(type) >= 0) {
                        thisApp.space.address_neighborhood = component.long_name;
                    } else if(['administrative_area_level_2'].indexOf(type) >= 0) {
                        thisApp.space.city_id = component.long_name;
                    } else if(['administrative_area_level_1'].indexOf(type) >= 0) {
                        thisApp.space.state_id = component.long_name;
                    } else if(['administrative_area_level_1'].indexOf(type) >= 0) {
                        thisApp.space.state_id = component.long_name;
                    }
                })
            })

            this.$forceUpdate();
        },

        processDaysHours: function() {
            var thisApp = this;
            this.days.forEach(function(day, dayI) {
                for(var i = 6; i < 20; i++) {
                    day.hours.push({
                        hour: i + ":00",
                        value: i >= 8 && i <= 17 && dayI <= 4 ? true : false,
                    });

                    if(dayI == 0) {
                        thisApp.hours.push({
                            hour: i + ":00",
                        })
                    }
                }
            })
        },
        /**
         * Init map
         */
        initMap: function() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });

            this.map = map;
            this.initAutocomplete();
        },

        /**
         * Init autocomplete
         */
        initAutocomplete: function() {
            var thisApp = this;

            // Create the search box and link it to the UI element.
            this.autocomplete = document.getElementById('full_address');
            var searchBox = new google.maps.places.SearchBox(this.autocomplete);


            // Bias the SearchBox results towards current map's viewport.
            this.map.addListener('bounds_changed', function() {
                searchBox.setBounds(thisApp.map.getBounds());
            });

            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();
                var selectedPlace = places[0];

                var lat = selectedPlace.geometry.location.lat();
                var lng = selectedPlace.geometry.location.lng();

                thisApp.setMapCenter({lat: lat, lng: lng})
                thisApp.space.full_address = selectedPlace.formatted_address;
                thisApp.space.lat = lat;
                thisApp.space.lng = lng;
            });
        },

        /**
         * Set map center
         */
        setMapCenter: function(centerLatLng) {
            this.map.panTo(centerLatLng)
            this.map.setZoom(10)
        },

        /**
         * Submit
         */
        submit: function () {
            var thisApp = this;
            this.space.table_temp_id = $("[name='table_temp_id']").val();
            this.space.hour_preference = this.days;
            this.space.amenities = this.amenities;

            axios.post("/api/spaces/create", this.space )
                .then(function (response) {
                   window.location.href = '/spaces/success';
                })
                .catch(function (error) {
                    var errors = error.response.data.errors;
                    thisApp.setErrors(errors);
                });
        },

        setErrors: function(errors){
            $(".field-error").removeClass('error');

            var i = 0;
            $.each(errors, function(field, error) {
                $("#" + field).addClass('field-error')
                if(i == 0) {
                    $("#" + field).focus();
                }
                i++;
            })
        }
    }
})