<template>
<div class="container">

    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block" style="background: url(/storage/assets/img/img2.jpeg);background-position:center;background-size:cover;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">{{$t('verify_email')}}</h1>
                    <p class="mb-4">Hello, you need to verify your email</p>
                  </div>
                  <form class="user" @submit.prevent="send" @keydown="form.onKeydown($event)">
                    <alert-success :form="form" :message="status" />
                    <div class="form-group">
                      <input :placeholder="$t('email')" v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control form-control-user" type="email" name="email">
                      <has-error class="text-center" :form="form" field="email" />
                    </div>
                    <v-button :loading="form.busy" class="btn btn-primary btn-user btn-block">
                      {{ $t('send_verification_link') }}
                    </v-button>
                  </form>
                </div>
                <div class="text-center">
                  <ul class="navbar-nav small">
                      <locale-dropdown />
                  </ul>
                </div>
                <br>
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
    return { title: this.$t('verify_email') }
  },

  data: () => ({
    status: '',
    form: new Form({
      email: ''
    })
  }),

  created () {
    if (this.$route.query.email) {
      this.form.email = this.$route.query.email
    }
  },

  methods: {
    async send () {
      const { data } = await this.form.post('/api/email/resend')

      this.status = data.status

      this.form.reset()
    }
  }
}
</script>
