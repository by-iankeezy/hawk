<template>
<div>
  <!-- class="bg-gradient-primary" -->
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block" style="background: url(storage/assets/img/img3.jpeg);background-position:center;background-size:cover;"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">{{ $t('register_login')}}</h1>
              </div>
              <form class="user" @submit.prevent="register" @keydown="form.onKeydown($event)">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input v-model="form.firstname" :class="{ 'is-invalid': form.errors.has('firstname') }" class="form-control form-control-user" type="text" name="firstname" :placeholder="$t('first_name')">
                    <has-error :form="form" field="firstname" />
                  </div>
                  <div class="col-sm-6">
                    <input v-model="form.lastname" :class="{ 'is-invalid': form.errors.has('lastname') }" class="form-control form-control-user" type="text" name="lastname" :placeholder="$t('last_name')">
                    <has-error :form="form" field="lastname" />
                  </div>
                </div>
                <div class="form-group">
                  <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control form-control-user" type="email" name="email" :placeholder="$t('email')">
                  <has-error :form="form" field="email" />
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control form-control-user" type="password" name="password" :placeholder="$t('password')">
                    <has-error :form="form" field="password" />
                  </div>
                  <div class="col-sm-6">
                    <input v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" class="form-control form-control-user" type="password" name="password_confirmation" :placeholder="$t('confirm_password')">
                    <has-error :form="form" field="password_confirmation" />
                  </div>
                </div>
                <v-button :loading="form.busy" class="btn btn-primary btn-user btn-block">
                  {{ $t('register') }}
                </v-button>
                <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> {{$t('register_google')}}
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> {{$t('register_facebook')}}
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
                    <router-link :to="{ name: 'login' }" class="small ml-auto my-auto">
                      {{ $t('login_register') }}
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
    return { title: this.$t('register') }
  },

  data: () => ({
    form: new Form({
      firstname: '',
      lastname: '',
      email: '',
      password: '',
      password_confirmation: ''
    }),
    mustVerifyEmail: false
  }),

  methods: {
    async register () {
      // Register the user.
      const { data } = await this.form.post('/api/register')

      // Must verify email fist.
      if (data.status) {
        this.mustVerifyEmail = true
      } else {
        // Log in the user.
        const { data: { token } } = await this.form.post('/api/login')

        // Save the token.
        this.$store.dispatch('auth/saveToken', { token })

        // Update the user.
        await this.$store.dispatch('auth/updateUser', { user: data })

        // Redirect home.
        this.$router.push({ name: 'home' })
      }
    }
  }
}
</script>
