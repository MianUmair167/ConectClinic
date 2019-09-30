var page = new Vue({
    el: 'main',
    data: {
        space_id: 0,
        map: null,
        search: '',
        message: '',
        messageButtonDisabled: false,
        days: [],
        hours: [],
    },

    created: function() {

    },
    mounted: function() {
        this.initSlider();
        this.space_id = $("[name='space_id']").val();

        this.days = JSON.parse($("[name='hour_preference']").val());
        this.processDaysHours();
    },

    methods: {

        processDaysHours: function() {
            var thisApp = this;
            this.days.forEach(function(day, dayI) {
                for(var i = 6; i < 20; i++) {
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
        initMap: function () {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });

            this.map = map;
        },

        initSlider: function() {
            var mySwiper = new Swiper ('.swiper-container', {
                slidesPerView: 'auto',
                spaceBetween: 30,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            })
        },

        sendMessage: function() {
            var thisApp = this;

            if(this.message == "") {
                alert("Você deve preencher uma mensagem antes.")
            }

            $("#messageButton").attr('disabled','disabled')

            axios.post("/api/messages/send", {
                    message: this.message,
                    space_id: this.space_id,
                })
                .then(function (response) {
                    window.location.href = '/explore/message-success?space_id=' + $("[name='space_id']").val();
                })
                .catch(function (error) {
                    console.log(error)
                    var errors = error.response.data.errors;
                    thisApp.setErrors(errors);
                });
        }
    }
})