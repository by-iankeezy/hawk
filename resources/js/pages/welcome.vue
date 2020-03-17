<template>
  <div class="container-fluid" style="position: fixed;width: 100%;height: 100%;bottom: -30%;">
    <div class="text-center">
      <div class="container pt-9">
        <img src="/dist/img/sys/vector/isolated-monochrome-black.svg" height="60px"/>
      </div>
      <div class="title mb-4">
        {{ title }}
      </div>
      <div class="subtitle mb-4">
        Welcome to {{ title }}
      </div>
      <div class="container">
        <template v-if="authenticated">
          <router-link :to="{ name: 'home' }">
            {{ $t('home') }}
          </router-link>
        </template>
        <template v-else>
          <router-link :to="{ name: 'about' }">
            {{ $t('about') }}
          </router-link>
          <router-link :to="{ name: 'login' }">
            {{ $t('login') }}
          </router-link>
          <router-link :to="{ name: 'register' }">
            {{ $t('register') }}
          </router-link>
        </template>
      </div>
    
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  layout: 'basic',

  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({
    title: window.config.appName
  }),

  computed: mapGetters({
    authenticated: 'auth/check'
  })
}
</script>

<style scoped>
.top-right {
  position: absolute;
  right: 10px;
  top: 18px;
}

.title {
  font-size: 85px;
}
</style>
