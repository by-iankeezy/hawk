<template>
    <div>
        <div v-if="alert" class="table-responsive">
          <td>Title {{ alert.title }}</td><br>
          <td>Body {{ alert.body }}</td><br>
          <td>Created At{{ alert.created_at }}</td><br><br>
          <td><router-link :to="{name: 'alerts.all'}">Back</router-link></td>
        </div>
      <div v-else>
          {{$t('error_alert_title')}} Alert May Be Unavailable
      </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  metaInfo () {
    return { title: this.title }
  },
  mounted () {
    this.getAlert();
  },
  data() {
    return {
      alert : null,
      title: 'Alert'
    };
  },
  methods: {
    getAlert(){
      this.alert = null;
      axios.get('/api/alert/'+this.$route.params.id)
      .then((response)=> {
        this.alert = response.data;
        this.title = 'Alert: '+response.data.title;
      })
    }
  }
}
</script>
