<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>OG - Login</title>
    @vite(['resources/js/app.js'])
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
            width: 450px;
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
            align-items: center;
            justify-content: center;
            position: relative;
            width: 100%;
            height: 100%;
        }

        label {
            color: #fff;
            font-size: 2.3em;
            justify-content: center;
            display: flex;
            margin: 30px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.5s ease-in-out;
        }

        .error-message {
            color: #ff4d4d;
            font-size: 0.9em;
            text-align: center;
            /* margin-bottom: 10px; */
            /* min-height: 20px; */
            /* Reserves space even when no error */
            display: block;
        }

        .input-wrapper {
            position: relative;
            width: 100%;
            padding-bottom: 10px;
            /* margin: 30px auto;
            margin-top: 30px auto; */
        }

        input {
            width: 80%;
            height: 40px;
            color: 495057;
            background-color: #fff;
            background-clip: padding-box;
            justify-content: center;
            display: block;
            margin: 3px auto;
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
            height: 600px;
            background: #eee;
            border-radius: 60% / 10%;
            transform: translateY(-145px);
            transition: 0.8s ease-in-out;
        }

        .login label {
            color: #6732b1;
            margin-bottom: 120px;
            transform: scale(0.6);
        }



        #chk:checked~.login {
            transform: translateY(-580px);
        }

        #chk:checked~.login label {
            transform: scale(1);
        }

        #chk:checked~.signup label {
            transform: scale(0.6);
        }

        @media (max-width: 1024px) {
            .wrapper {
                justify-content: center;
                gap: 20px;
            }

            .main-title {
                margin-left: 20px;
                font-size: 2.5em;
                margin-right: 10px;
            }

            .main {
                margin-right: 20px;
                width: 400px;
                height: 450px;
            }

            .login {
                height: 410px;
                transform: translateY(-160px);
            }

            #chk:checked~.login {
                transform: translateY(-450px);
            }
        }

        @media (max-width: 768px) {
            .wrapper {
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 10px;
            }

            .main-title {
                margin-left: 0;
                margin-bottom: 20px;
                font-size: 2em;
                text-align: center;
                flex: none;
            }

            .main {
                width: 90%;
                max-width: 400px;
                height: 450px;
                margin-right: 0;
            }

            label {
                font-size: 2em;
                margin: 40px;
            }

            input {
                width: 90%;
                height: 35px;
            }

            button {
                width: 70%;
                height: 35px;
            }

            .login {
                height: 410px;
                transform: translateY(-160px);
            }

            #chk:checked~.login {
                transform: translateY(-450px);
            }
        }

        @media (max-width: 480px) {
            .main-title {
                font-size: 1.5em;
            }

            .main {
                width: 95%;
                max-width: 350px;
                height: 400px;
            }

            label {
                font-size: 1.8em;
                margin: 30px;
            }

            input {
                width: 95%;
                height: 30px;
            }

            button {
                width: 80%;
                height: 30px;
                font-size: 0.9em;
            }

            .login {
                height: 360px;
                transform: translateY(-140px);
            }

            #chk:checked~.login {
                transform: translateY(-400px);
            }
        }
    </style>
</head>

<body>


    {{-- <div id="app"> --}}
    <div class="wrapper">
        <h1 class="main-title">Manage Your Event Everywhere!</h1>
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true" />
            <div class="signup">
                <form>
                    @csrf
                    <label for="chk" aria-hidden="true">Sign In</label>
                    <div class="input-wrapper">
                        <input type="email" name="email" placeholder="Email" v-model="registerPayload.email" />
                        <span class="error-message">@{{ registerErr.emailErr }}</span>
                    </div>
                    <div class="input-wrapper">
                        <input type="password" name="pswd" placeholder="Password"
                            v-model="registerPayload.password" />
                        <span class="error-message">@{{ registerErr.passwordErr }}</span>
                    </div>

                    <button type="submit" @click.prevent="registerHandler">Sign up</button>
                </form>
            </div>
        </div>
    </div>
    {{-- </div> --}}


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
    // new Vue({
    //     el: '#app',
    //     data: {
    //         registerPayload: {
    //             name: 'john',
    //             email: 'johndoe@user.com',
    //             phone_number: '012345678',
    //             password: '12345678'
    //         },
    //         loginPayload: {
    //             email: 'puskascsgo@gmail.com',
    //             password: '12345678'
    //         },
    //         APIResponse: {},
    //         registerErr: {
    //             nameErr: '',
    //             emailErr: '',
    //             phoneErr: '',
    //             passwordErr: ''
    //         },
    //         loginErr: {
    //             emailErr: '',
    //             passwordErr: ''
    //         }
    //     },
    //     mounted() {
    //         this.LoggedInStatus();
    //     },
    //     methods: {
    //         loginHandler() {
    //             try {
    //                 axios.post('/user/login', this.loginPayload)
    //                     .then((response) => {
    //                         if (response.data.success) {
    //                             this.APIResponse = response.data;
    //                             if (!this.APIResponse.data.verified) {
    //                                 window.location.href =
    //                                     `/login/verify/${this.APIResponse.data.user.id}`;
    //                             } else {
    //                                 // if (this.APIResponse.data.verified)
    //                                 localStorage.setItem('token', this.APIResponse.data.access_token);
    //                                 localStorage.setItem('isLoggedIn', true)
    //                                 window.location.href = '/';
    //                             }

    //                         } else {
    //                             this.loginErr.emailErr = response.data.message.email ? response.data
    //                                 .message.email[0] : '';
    //                             this.loginErr.passwordErr = response.data.message.password ? response
    //                                 .data
    //                                 .message.password[0] : '' || response.data.message;
    //                         }
    //                     }).catch((error) => {
    //                         this.loginErr.emailErr = error.response.data.message
    //                     })
    //             } catch (error) {
    //                 console.log(error)
    //             }
    //         },
    //         registerHandler() {
    //             try {
    //                 axios.post('/register', this.registerPayload)
    //                     .then((response) => {
    //                         if (response.data.success) {
    //                             this.APIResponse = response.data;
    //                             console.log(this.APIResponse);
    //                             if (!this.APIResponse.data.verified) {
    //                                 window.location.href =
    //                                     `/login/verify/${this.APIResponse.data.user.id}`;
    //                             }
    //                         } else {
    //                             this.registerErr.nameErr = response.data.message.name ? response.data
    //                                 .message.name[0] : '';
    //                             this.registerErr.emailErr = response.data.message.email ? response.data
    //                                 .message.email[0] : '';
    //                             this.registerErr.phoneErr = response.data.message.phone_number ? response
    //                                 .data
    //                                 .message.phone_number[0] : '';
    //                             this.registerErr.passwordErr = response.data.message.password ? response
    //                                 .data
    //                                 .message.password[0] : '';
    //                         }
    //                     }).catch((error) => {
    //                         console.log(error);

    //                     })
    //             } catch (error) {
    //                 console.log(error)
    //             }
    //         },
    //         LoggedInStatus() {
    //             if (localStorage.getItem('isLoggedIn') && localStorage.getItem('token')) {
    //                 window.location.href = '/';
    //             }
    //         }
    //     }
    // });
</script>
