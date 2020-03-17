<template>
  <ul v-if="authUser" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <router-link :to="{ name: authUser ? 'home' : 'welcome' }" class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
          <img style="height: 50px;" src="/dist/img/sys/vector/isolated-monochrome-white.svg"/>
        </div>
        <div class="sidebar-brand-text mx-3">{{ appName }} <sup>{{$t('beta')}}</sup></div>
      </router-link>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <router-link :to="{ name: 'home'}" class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>{{$t('dashboard')}}</span></router-link>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <template v-if="authUser.role == 'user'">
        <user-Sidebar />
      </template>
        
      <template v-if="authUser.role == 'admin'">
        <admin-Sidebar />
      </template>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from './LocaleDropdown'

import userSidebar from './sidebar/user';
import adminSidebar from './sidebar/admin';

export default {
  components: {
    LocaleDropdown,
    userSidebar,
    adminSidebar
  },

  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    authUser: 'auth/user'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -.375rem 0;
}
</style>
