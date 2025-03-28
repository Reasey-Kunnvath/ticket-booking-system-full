<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    @vite(['resources/js/axios.js'])
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/unicons.css">
    <link href=" https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.2.0/css/line.min.css " rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/font-awesome.css') }}" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Jost', sans-serif;
            background: url('{{ asset('frontend/assets/rainbow-vortex.svg') }}') no-repeat center / cover;
        }

        .wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            min-height: 100vh;
            padding: 20px;
            flex-wrap: wrap;
            box-sizing: border-box;
        }

        .main-title {
            color: #fff;
            font-size: 5em;
            font-weight: bold;
            text-shadow: 4px 4px 10px rgba(0, 0, 0);
            margin-left: 50px;
            flex: 1;
            min-width: 300px;
            margin-right: 5rem;
        }

        .main {
            width: 400px;
            height: 350px;
            background: rgb(85, 0, 0);
            overflow: hidden;
            background: url('{{ asset('frontend/assets/endless-constellation.svg') }}') no-repeat center / cover;
            box-shadow: 5px 20px 50px #000;
            margin-right: 50px;
            flex: 0 0 auto;
        }

        #chk {
            display: none;
        }

        .signup {
            position: relative;
            width: 100%;
            height: 100%;
        }

        label {
            color: #fff;
            font-size: 2.3em;
            justify-content: center;
            display: flex;
            margin: 60px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.5s ease-in-out;
        }

        input {
            width: 80%;
            height: 40px;
            color: 495057;
            background-color: #fff;
            background-clip: padding-box;
            justify-content: center;
            display: block;
            margin: 20px auto;
            padding: .375rem .75rem;
            border: 1px solid #ced4da;
            outline: none;
            border-radius: .25rem;
            box-sizing: border-box;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        button {
            width: 60%;
            height: 40px;
            margin: 10px auto;
            justify-content: center;
            display: block;
            color: #fff;
            background: #6732b1;
            font-size: 1em;
            font-weight: bold;
            margin-top: 20px;
            outline: none;
            border: none;
            border-radius: 5px;
            transition: 0.2s ease-in;
            cursor: pointer;
        }

        button:hover {
            background: #6732b1;
        }

        .login {
            height: 460px;
            background: #eee;
            border-radius: 60% / 10%;
            transform: translateY(-180px);
            transition: 0.8s ease-in-out;
        }

        .login label {
            color: #6732b1;
            transform: scale(0.6);
        }

        .height-100 {
            height: 100vh
        }

        .card {
            width: 400px;
            border: none;
            height: 300px;
            box-shadow: 0px 5px 20px 0px #d2dae3;
            z-index: 1;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .card h6 {
            color: rgb(174, 0, 255);
            font-size: 20px
        }

        .inputs input {
            width: 40px;
            height: 40px
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0
        }

        .card-2 {
            background-color: #fff;
            padding: 10px;
            width: 350px;
            height: 100px;
            bottom: -50px;
            left: 20px;
            position: absolute;
            border-radius: 5px
        }

        .card-2 .content {
            margin-top: 50px
        }

        .card-2 .content a {
            color: rgb(174, 0, 255);
        }

        .form-control:focus {
            box-shadow: none;
            border: 2px solid rgb(174, 0, 255);
        }

        .validate {
            border-radius: 20px;
            height: 40px;
            background-color: rgb(174, 0, 255);
            border: 1px solid rgb(174, 0, 255);
            width: 140px
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="wrapper">
            <h1 class="main-title">Your One-Stop Shop for all Events</h1>
            <div class="card p-2 text-center">
                <h6>Please enter the one time password <br> to verify your account</h6>
                <div>
                    <span>A code has been sent to</span>
                    {{-- <small id="maskedNumber">*******9897</small> --}}
                </div>

                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                    <input v-for="(digit, index) in otpLength" :key="index" v-model="otp[index]"
                        type="text" maxlength="1" @input="handleInput(index)"
                        @keydown="handleKeydown($event, index)" class="m-2 text-center form-control rounded" />
                </div>
                <div class="mt-4">
                    <button id="validateBtn" class="btn btn-danger px-4 validate" @click="validateOTP">
                        Validate
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
</body>

</html>
<script>
    new Vue({
        el: '#app',
        data: {
            converted_otp: '',
            otpLength: 6,
            otp: ['', '', '', '', '', ''],
            user_id: "{{ $id }}",

        },
        methods: {
            handleInput(index) {
                if (this.otp[index].length > 1) {
                    this.otp[index] = this.otp[index][0];
                }
                if (this.otp[index] !== '' && index < this.otpLength - 1) {
                    this.$nextTick(() => {
                        const nextInput = this.$el.querySelectorAll('input')[index + 1];
                        if (nextInput) nextInput.focus();
                    });
                }
                // this.converted_otp = this.otp.join('');
            },
            handleKeydown(event, index) {
                if (event.key === 'Backspace') {
                    this.otp[index] = '';
                    if (index > 0) {
                        this.$nextTick(() => {
                            const prevInput = this.$el.querySelectorAll('input')[index - 1];
                            if (prevInput) prevInput.focus();
                        });
                    }
                }
            },
            validateOTP() {
                for (let i = 0; i < this.otp.length; i++) {
                    this.converted_otp += this.otp[i];
                }
                // console.log(typeof otp, this.converted_otp);
                axios.post(`/register/verify/${this.user_id}`, this.converted_otp)
                    .then((response) => {
                        this.APIResponse = response.data;
                        console.log(this.APIResponse)
                        if (this.APIResponse.access_token) {
                            localStorage.setItem('token', this.APIResponse.access_token);
                            localStorage.setItem('isLoggedIn', true)
                            window.location.href = '/';
                        } else {
                            alert(this.APIResponse.message)
                        }
                    })
            },

        },
    });
</script>
