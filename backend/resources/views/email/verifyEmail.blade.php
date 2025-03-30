<!DOCTYPE html>
<html>

<head>
    <title>Verify Email</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="app">
        <h1>Verifying Your Email...</h1>
        <p>@{{ token }} + @{{ user_id }}</p>
        <p>@{{ request }}</p>
        <p v-if="message">@{{ message }}</p>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                user_id: '{{ $user_id }}',
                token: '{{ $token }}',
                message: '',
                request: ''
            },
            mounted() {
                this.verifyOTP();
            },
            methods: {
                verifyOTP() {
                    axios.post(`http://127.0.0.1:8000/api
/register/verify/${this.user_id}`, {
                            token: this.token
                        })
                        .then(response => {
                            if (response.data.verified) {
                                localStorage.setItem('token', response.data.access_token);
                                localStorage.setItem('isLoggedIn', true);
                                this.message = 'Email verified! Redirecting...';
                                setTimeout(() => {
                                    window.location.href = 'http://127.0.0.1:8080/';
                                }, 2000);
                            } else {
                                this.message = response.data.message;
                                this.message = response.data.request;
                            }
                        })
                        .catch(error => {
                            this.message = 'Verification failed. Please try again.';
                        });
                }
            }
        });
    </script>
</body>

</html>
