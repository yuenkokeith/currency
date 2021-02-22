
var app = new Vue({
    el: '#app',
    data() {
        return {
            form: {
                currency: ''
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
                /*
                {
                    key: 'base',
                    label: 'Base',
                    sortable: true,
                },
                {
                    key: 'date',
                    label: 'Date',
                    sortable: true,
                },
                */
            ],
            dataItems: [],
            currencyOptions: [{ text: 'Select One', value: null },
                'CAD', 'HKD', 'ISK', 'PHP', 'DKK', 'HUF', 'CZK', 'GBP', 'RON', 'SEK',
                'IDR', 'INR', 'BRL', 'RUB', 'HRK', 'JPY', 'CHF', 'EUR', 'MYR', 'BGN',
                'TRY', 'CNY', 'NOK', 'NZD', 'ZAR', 'USD', 'MXN', 'SGD', 'AUD', 'ILS',
                'KRW', 'PLN'
                            ]
        }
    },
    mounted: function () {
        this.$nextTick(function () {
            this.run();
        })
    },
    methods: {
        run() {

            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const code = urlParams.get('code')
            console.log(code);
            if (code!=null) {
                this.form.currency = code;
                this.updateCurrency();
            }

        },
        updateCurrency() {
          
            console.log(this.form.currency)
            this.show = true;

            // GET /someUrl
            this.$http.get('https://api.exchangeratesapi.io/latest?base=' + this.form.currency).then(response => {

                // get body data
                var message = response.body;
                console.log(JSON.stringify(message));

                this.show = false;

                this.dataItems = message['rates'];

            }, response => {
                console.error(response.body);
                this.show = false;
            });

        }

    }

})
