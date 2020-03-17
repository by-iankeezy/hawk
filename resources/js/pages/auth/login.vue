<template>
<div >
  <!-- class="bg-gradient-primary" -->
  <div class="container">

    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
              <div class="row">
                <div class="col-lg-6 d-none d-lg-block" style="background: url(storage/assets/img/img1.jpeg);background-position:center;background-size:cover;"></div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">{{ $t('welcome_back')}}</h1>
                    </div>
                    <form class="user" @submit.prevent="login" @keydown="form.onKeydown($event)">
                      <div class="form-group">
                        <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control form-control-user" type="email" name="email" :placeholder="$t('email')">
                        <has-error class="text-center" :form="form" field="email" />
                      </div>
                      <div class="form-group">
                        <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control form-control-user" type="password" name="password" :placeholder="$t('password')">
                        <has-error class="text-center" :form="form" field="password" />
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" v-model="remember" name="remember">
                          <label class="custom-control-label" for="customCheck">{{ $t('remember_me') }}</label>
                        </div>
                      </div>
                      <v-button :loading="form.busy" class="btn btn-primary btn-user btn-block">
                        {{ $t('login') }}
                      </v-button>
                      <hr>
                        <a href="index.html" class="btn btn-google btn-user btn-block">
                          <i class="fab fa-google fa-fw"></i> {{$t('login_google')}}
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                          <i class="fab fa-facebook-f fa-fw"></i> {{$t('login_facebook')}}
                        </a>
                      </form>
                      <hr>
                    <div class="row">
                      <div class="col">
                        <div class="text-center">
                          <router-link :to="{ name: 'password.request' }" class="small ml-auto my-auto">
                            {{ $t('forgot_password') }}
                          </router-link>
                        </div>
                        <div class="text-center">
                          <router-link :to="{ name: 'register' }" class="small ml-auto my-auto">
                            {{ $t('register_login') }}
                          </router-link>
                        </div>
                      </div>
                      <div class="col text-center">
                        <ul class="navbar-nav">
                            <locale-dropdown />
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</div>

</template>

<script>
import Form from 'vform'
import LoginWithGithub from '~/components/LoginWithGithub'
import LocaleDropdown from '~/components/LocaleDropdown'

export default {
  middleware: 'guest',

  components: {
    LoginWithGithub,
    LocaleDropdown
  },

  metaInfo () {
    return { title: this.$t('login') }
  },

  data: () => ({
    form: new Form({
      email: '',
      password: ''
    }),
    remember: false
  }),

  methods: {
    async login () {
      // Submit the form.
      const { data } = await this.form.post('/api/login')

      // Save the token.
      this.$store.dispatch('auth/saveToken', {
        token: data.token,
        remember: this.remember
      })

      // Fetch the user.
      await this.$store.dispatch('auth/fetchUser')

      // Redirect home.
      this.$router.push({ name: 'home' })
    }
  }
}
</script>
