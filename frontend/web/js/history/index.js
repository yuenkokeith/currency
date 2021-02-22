
var app = new Vue({
    el: '#app',
    data() {
        return {
            form: {
                start_at: '',
                end_at: ''
            },
            show: false,
            message: "",
            fields: [
                {
                    key: 'index',
                    label: ''
                },
                {
                    key: 'rates',
                    label: 'Rates',
                    sortable: true,
                },
            ],
            dataItems: [],
        }
    },
    methods: {
        onSubmit(event) {
            event.preventDefault()

            console.log(JSON.stringify(this.form));

            this.show = true;

            this.$nextTick(() => {

                this.$http.get('https://api.exchangeratesapi.io/history?start_at=' + this.form.start_at + '&end_at=' + this.form.end_at).then(response => {

                    // get body data
                    var message = response.body;
                    console.log(JSON.stringify(message));

                    if (!message.hasOwnProperty('rates')) {
                        this.message = message['error'] + '. Please refresh "Start At" focus' ;
                        this.$root.$emit('bv::show::modal', 'message');
                    } else {
                        this.dataItems = message['rates'];
                    }

                    this.show = false;

                }, response => {
                    console.error(response.body);
                    this.show = false;
                });

            });

            

        }

    }

})
