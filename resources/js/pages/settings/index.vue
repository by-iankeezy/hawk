<template>
  <div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <card :title="$t('settings')" :dropdown="dropdown" class="settings-card">
        <ul class="nav flex-column nav-pills">
          <li v-for="tab in tabs" :key="tab.route" class="nav-item">
            <router-link :to="{ name: tab.route }" class="nav-link" active-class="active">
              <fa :icon="tab.icon" fixed-width />
              {{ tab.name }}
            </router-link>
          </li>
        </ul>
      </card>
    </div>

    <div class="col-md-9">
      <transition name="fade" mode="out-in">
        <router-view />
      </transition>
    </div>
  </div>
  </div>
</template>

<script>
export default {
  middleware: 'auth',
  data() {
    return {
      dropdown: new Form({
        title: 'Test',
        body: '<div class="dropdown-header">My Referrals:</div><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><div class="dropdown-divider"></div><a class="dropdown-item" href="#">Report Error</a>'
      })
      // dropdown: [
      //   body: ""
      // ]
    };
  },

  computed: {
    tabs () {
      return [
        {
          icon: 'user',
          name: this.$t('profile'),
          route: 'settings.profile'
        },
        {
          icon: 'lock',
          name: this.$t('password'),
          route: 'settings.password'
        }
      ]
    }
  }
}
</script>

<style>
.settings-card .card-body {
  padding: 0;
}
</style>
