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
                    <h1 class="h4 text-gray-900 mb-2">{{$t('reset_password')}}</h1>
                    <p class="mb-4">There you go, Just set up your new password and you will regain access</p>
                  </div>
                  <form class="user" @submit.prevent="reset" @keydown="form.onKeydown($event)">
                    <alert-success :form="form" :message="status" />
                    <div class="form-group">
                      <input :placeholder="$t('email')" v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control form-control-user" type="email" name="email" readonly>
                      <has-error class="text-center" :form="form" field="email" />
                    </div>
                    <div class="form-group">
                      <input :placeholder="$t('password')" v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control form-control-user" type="password" name="password">
                      <has-error class="text-center" :form="form" field="password" />
                    </div>
                    <div class="form-group">
                      <input :placeholder="$t('confirm_password')" v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" class="form-control form-control-user" type="password" name="password_confirmation">
                      <has-error class="text-center" :form="form" field="password_confirmation" />
                    </div>
                    <v-button :loading="form.busy" class="btn btn-primary btn-user btn-block">
                      {{ $t('reset_password') }}
                    </v-button>
                  </form>
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

export default {
  middleware: 'guest',

  metaInfo () {
    return { title: this.$t('reset_password') }
  },

  data: () => ({
    status: '',
    form: new Form({
      token: '',
      email: '',
      password: '',
      password_confirmation: ''
    })
  }),

  created () {
    this.form.email = this.$route.query.email
    this.form.token = this.$route.params.token
  },

  methods: {
    async reset () {
      const { data } = await this.form.post('/api/password/reset')

      this.status = data.status

      this.form.reset()
    }
  }
}
</script>
