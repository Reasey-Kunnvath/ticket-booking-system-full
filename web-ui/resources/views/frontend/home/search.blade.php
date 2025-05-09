<div id="test">
    <div class="container-fluid bg-secondary mb-1 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-3 align-items-center bet">
                <div class="col-lg-5">
                    <h4 class="text-white mb-0">Sort The Upcoming Shows & Events By:</h4>
                </div>
                <div class="col-lg-7">
                    <div class="row g-2 align-items-center justify-content-end">
                        {{-- <div class="col-lg-3">
                            <select class="form-select">
                                <option value="month" selected>Month</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                            </select>
                        </div> --}}
                        {{-- <div class="col-lg-3">
                            <select class="form-select">
                                <option value="location" selected>Location</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Europe">Europe</option>
                                <option value="US">US</option>
                                <option value="Asia">Asia</option>
                            </select>
                        </div> --}}
                        {{-- <div class="col-lg-3">
                            <select id="price" class="form-select">
                                <option value="price" selected>Price</option>
                                <option value="min">$0 - $50</option>
                                <option value="standard">$50 - $100</option>
                                <option value="high">$100 - $200</option>
                            </select>
                        </div> --}}
                        <div class="col-lg-3">
                            <select id="price" class="form-select">
                                <option value="price" selected>Category</option>
                                <option value="min">Events</option>
                                <option value="min">Concert</option>
                                <option value="standard">Conference</option>
                                <option value="high">Sport</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <button id="form-submit" type="submit" class="btn btn-dark w-100">
                                Search
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="module">
    document.addEventListener('DOMContentLoaded', () => {
        new Vue({
            el: '#test',

            data: {
                price: '',

            },
            mounted() {
                this.price();

            },
            methods: {
                // getprice() {
                //     try {
                //         axios.get('http://127.0.0.1:8000/api/getprice')
                //             .then((response) => {
                //                 this.price = response.data.data;
                //                 console.log(this.price);
                //             })
                //             .catch((error) => {
                //                 console.log("Error", error);
                //             })

                //     } catch (error) {
                //         console.log(error);
                //     }
                // },
            },
        })
    });
</script>
