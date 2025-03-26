<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Jost', sans-serif;
            background: url('../../../assets/rainbow-vortex.svg') no-repeat center / cover;
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
            height: 500px;
            background: rgb(85, 0, 0);
            overflow: hidden;
            background: url('../../../assets/endless-constellation.svg') no-repeat center / cover;
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
            background: #e0dede;
            justify-content: center;
            display: flex;
            margin: 20px auto;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 5px;
            box-sizing: border-box;
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

        #chk:checked~.login {
            transform: translateY(-500px);
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
    <div class="wrapper">
        <h1 class="main-title">Your One-Stop Shop for all Events</h1>
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true" />
            <div class="signup">
                <form>
                    <label for="chk" aria-hidden="true">Sign Up</label>
                    <input type="text" name="txt" placeholder="User name" />
                    <input type="email" name="email" placeholder="Email" />
                    <input type="password" name="pswd" placeholder="Password" />
                    <button type="submit">Sign up</button>
                </form>
            </div>

            <div class="login">
                <form>
                    <label for="chk" aria-hidden="true">Login</label>
                    <input type="email" name="email" placeholder="Email" />
                    <input type="password" name="pswd" placeholder="Password" />
                    <button>Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
