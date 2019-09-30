var page = new Vue({
    el: 'main',
    data: {
        map: null,
        search: {
            term: '',
        },
    },

    created: function() {

    },
    mounted: function() {
        this.initSlider();
    },

    methods: {
        /**
         * Init map
         */
        initMap: function () {
            var map = new google.maps.Map(document.getElementById('map_listing'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });

            this.map = map;
        },

        initSlider: function() {
            var mySwiper = new Swiper ('.swiper-container', {
                // Optional parameters
                direction: 'horizontal',
                loop: true,

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            })
        },

        search: function() {

        }
    }
})