<template>
    <div>
        <div class="container">
            <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>
                    <form class="form-signin" @submit.prevent="login">
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus v-model="username">
                        <label for="inputEmail">Email address</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required v-model="password">
                        <label for="inputPassword">Password</label>
                    </div>


                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                    <hr class="my-4">

                    </form>
                     <router-link to="/register" class="btn btn-sm btn-google btn-block text-uppercase" >Register</router-link>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    :root {
    --input-padding-x: 1.5rem;
    --input-padding-y: .75rem;
    }

    .card-signin {
    border: 0;
    border-radius: 1rem;
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    .card-signin .card-title {
    margin-bottom: 2rem;
    font-weight: 300;
    font-size: 1.5rem;
    }

    .card-signin .card-body {
    padding: 2rem;
    }

    .form-signin {
    width: 100%;
    }

    .form-signin .btn {
    font-size: 80%;
    border-radius: 5rem;
    letter-spacing: .1rem;
    font-weight: bold;
    padding: 1rem;
    transition: all 0.2s;
    }

    .form-label-group {
    position: relative;
    margin-bottom: 1rem;
    }






    .btn-google {
    color: white;
    background-color: #ea4335;
    }

    .btn-facebook {
    color: white;
    background-color: #3b5998;
    }
</style>


<script>
    export default {
       data() {
           return {
               username : '',
               password : ''
           };
       },

       methods: {
           login() {
               let data = {
                   username : this.username,
                   password : this.password
               };

               axios.post('/api/login', data)
                .then(({data}) => {
                    auth.login(data.token, data.user);

                    this.$router.push('/');
                })
                .catch(({response}) => {
                    console.log(response.data.message);
                });
           }
       }
    }
</script>

