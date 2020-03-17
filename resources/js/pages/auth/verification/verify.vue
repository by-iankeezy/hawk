<template>

<div class="container">

    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block" style="background: url(/storage/assets/img/img3.jpeg);background-position:center;background-size:cover;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">{{$t('verify_email')}}</h1>
                    <template v-if="success">
                      <div class="alert alert-success" role="alert">
                        {{ success }}
                      </div>

                      <router-link :to="{ name: 'login' }" class="btn btn-primary">
                        {{ $t('login') }}
                      </router-link>
                    </template>
                    <template v-else>
                      <div class="alert alert-danger" role="alert">
                        {{ error || $t('failed_to_verify_email') }}
                      </div>

                      
                      <div class="row">
                        <div class="col text-center">
                          <router-link :to="{ name: 'verification.resend' }" class="small navbar-nav pt-2 float-left">
                            {{ $t('resend_verification_link') }}
                          </router-link>
                        </div>
                        <div class="col text-center">
                          <ul class="navbar-nav small float-right">
                              <locale-dropdown />
                          </ul>
                        </div>
                      </div>
                    </template>
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
import axios from 'axios'
import LocaleDropdown from '~/components/LocaleDropdown'


const qs = (params) => Object.keys(params).map(key => `${key}=${params[key]}`).join('&')

export default {
  middleware: 'guest',
  components: {
    LocaleDropdown
  },
  metaInfo () {
    return { title: this.$t('verify_email') }
  },

  async beforeRouteEnter (to, from, next) {
    try {
      const { data } = await axios.post(`/api/email/verify/${to.params.id}?${qs(to.query)}`)

      next(vm => { vm.success = data.status })
    } catch (e) {
      next(vm => { vm.error = e.response.data.status })
    }
  },

  data: () => ({
    error: '',
    success: ''
  })
}
</script>
