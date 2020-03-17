<template>
    <div>
        <router-link :to="`/alerts/`+alert.id" v-for="alert in alerts" :key="alert.id" class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
            <div class="icon-circle bg-success">
                <i class="fas fa-donate text-white"></i>
            </div>
            </div>
            <div>
            <div class="small text-gray-500">{{alert.updated_at}}</div>
                <span :class="{ 'font-weight-bold': !alert.seen }">
                    {{alert.title}}
                </span>
            </div>
        </router-link>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
import axios from 'axios'

export default {
  mounted () {
    this.getAlerts();
  },
  data() {
    return {
      alerts : null
    };
  },
  computed: mapGetters({
    authUser: 'auth/user'
  }),
  methods: {
    getAlerts(){
      this.alerts = null;
      axios.get('/api/alerts/'+this.authUser.id)
      .then((response)=> {
        this.alerts = response.data;
      })
    }
  }
}
</script>
