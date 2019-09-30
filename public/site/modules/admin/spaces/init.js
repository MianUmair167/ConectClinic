var page = new Vue({
    el: 'main',
    data: {

        days: [
            { i: 0, name: "Segunda", hours: [] },
            { i: 1, name: "Terça", hours: [] },
            { i: 2, name: "Quarta", hours: [] },
            { i: 3, name: "Quinta", hours: [] },
            { i: 4, name: "Sexta", hours: [] },
            { i: 5, name: "Sábado", hours: [] },
            { i: 6, name: "Domingo", hours: [] },
        ],
        hours: [],
    },

    created: function() {
        this.processDaysHours();
    },

    methods: {




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
        },


        submit: function () {
            var thisApp = this;
            this.space.table_temp_id = $("[name='table_temp_id']").val();
            this.space.hour_preference = this.days;

            axios.post("/admin/space/hours", this.days)
                .then(function (response) {
                    window.location.href = '/spaces/success';
                })
                .catch(function (error) {
                    var errors = error.response.data.errors;
                    thisApp.setErrors(errors);
                });
        },


})