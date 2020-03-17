<template>
  <div class="text-center" style="margin-top: 70px;margin-bottom: 70px;">
    <div class="error mx-auto" data-text="500">500</div>
    <p class="lead text-gray-800 mb-5">Server Error</p>
    <p class="text-gray-500 mb-0">Your search query: <strong>{{this.$route.params.search}}</strong> cannot be processed at this time</p>
    <router-link v-if="user" :to="{ name: 'home' }">
       &larr; {{ $t('go_home') }}
    </router-link>
    <router-link v-else :to="{ name: 'login' }">
       &rarr; {{ $t('login') }}
    </router-link>
    <div class="container mt-9">
    <br>
      <img src="/dist/img/sys/vector/isolated-monochrome-black.svg" height="60px"/>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  name: 'NotFound',
  computed: mapGetters({
    user: 'auth/user'
  }),
  middleware: 'auth',

  metaInfo () {
    return { title: 'Search: '+this.$route.params.search }
  }
}
</script>
