<template>

 <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block" style="background: url(/storage/assets/img/img3.jpeg);background-position:center;background-size:cover;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">{{$t('forgot_password')}}</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                  </div>
                  <form class="user" @submit.prevent="send" @keydown="form.onKeydown($event)">
                    <div class="form-group">
                      <input :placeholder="$t('email')" v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control form-control-user" type="email" name="email">
                      <has-error class="text-center" :form="form" field="email" />
                    </div>
                    <v-button :loading="form.busy" class="btn btn-primary btn-user btn-block">
                      {{ $t('send_password_reset_link') }}
                    </v-button>
                  </form>
                  <hr>
                  <div class="row">
                    <div class="col">
                      <div class="text-center">
                        <router-link :to="{ name: 'login' }" class="small ml-auto my-auto">
                          {{ $t('login_password') }}
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
    return { title: this.$t('reset_password') }
  },

  data: () => ({
    status: '',
    form: new Form({
      email: ''
    })
  }),

  methods: {
    async send () {
      const { data } = await this.form.post('/api/password/email')

      this.status = data.status

      this.form.reset()
    }
  }
}
</script>
