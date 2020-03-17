<template>
    <div>
        <div v-if="alerts" class="table-responsive">
          <table v-if="alerts.length" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>title</th>
                <th>body</th>
                <th>date</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>title</th>
                <th>body</th>
                <th>date</th>
                <th></th>
              </tr>
            </tfoot>
            <tbody>
              <tr v-for="alert in alerts" :key="alert.id">
                <td>{{ alert.title }}</td>
                <td>{{ alert.body }}</td>
                <td>{{ alert.created_at }}</td>
                <td><router-link :to="`/alert/${alert.id}`">View</router-link></td>
              </tr>
            </tbody>
          </table>
          <div class="text-center" v-else>
            You have no alerts
          </div>
        </div>
      <div v-else>
          {{$t('error_alert_title')}} Alerts May Be Unavailable
      </div>
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
