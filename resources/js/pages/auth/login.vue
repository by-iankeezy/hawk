<template>




<section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="/dist/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Pluto</span></h4>
            <p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p>
            <form class="needs-validation" novalidate="" @submit.prevent="login" @keydown="form.onKeydown($event)">
              <div class="form-group">
                <label for="email">{{$t('email')}}</label>
                <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" id="email" name="email" type="email" class="form-control" tabindex="1" required autofocus>
                <has-error class="invalid-feedback" :form="form" field="email" />
              </div> 

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">{{$t('password')}}</label>
                </div>
                <input  v-model="form.password" name="password" :class="{ 'is-invalid': form.errors.has('password') }" id="password" type="password" class="form-control" tabindex="2" required>
                <has-error class="invalid-feedback" :form="form" field="password" />
              </div>

              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input v-model="remember" name="remember" type="checkbox" class="custom-control-input" tabindex="3" id="remember-me">
                  <label class="custom-control-label" for="remember-me">Remember Me</label>
                </div>
              </div>

              <div class="form-group text-right">
                <a href="auth-forgot-password.html" class="float-left mt-3">
                  {{$t('forgot_password')}}
                </a>
                 <v-button :loading="form.busy" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  {{ $t('login') }}
                </v-button>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; Pluto. Made with 💙 by Galileo Computing
              <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="#">Terms of Service</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" style="background-image: url('/dist/img/unsplash/login-bg.jpg')">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Good Morning</h1>
                <h5 class="font-weight-normal text-muted-transparent">Kericho, Kenya</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
            </div>
          </div>
        </div>
      </div>
    </section>
		
</template>

<script>
import Form from 'vform'
import LocaleDropdown from '~/components/LocaleDropdown'

export default {
  middleware: 'guest',

  components: {
    LocaleDropdown
  },

  metaInfo () {
    return { title: this.$t('login') }
  },

  data: () => ({
    form: new Form({
      email: '',
      password: '',
      remember: false
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
      this.$router.push({ name: 'dashboard' })
    }
  }
}
</script>
