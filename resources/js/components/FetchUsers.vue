<template>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
    </div>
    <div class="card-body">
      <template v-if="users">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>{{$t('name')}}</th>
                <th>{{$t('email')}}</th>
                <th>{{$t('role')}}</th>
                <th>Date Registered</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>{{$t('name')}}</th>
                <th>{{$t('email')}}</th>
                <th>{{$t('role')}}</th>
                <th>Date Registered</th>
                <th></th>
              </tr>
            </tfoot>
            <tbody>
              <tr v-for="user in users" :key="user.id">
                <td>{{ user.firstname }}&nbsp;{{ user.lastname }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.role }}</td>
                <td>{{ user.created_at }}</td>
                <td><router-link :to="`/user/${user.id}`">View</router-link></td>
              </tr>
            </tbody>
          </table>
        </div>
      </template>
      <template v-else>
          {{$t('error_alert_title')}} Users May Be Unavailable
      </template>
      
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  mounted () {
    this.getUsers();
  },
  data() {
    return {
      users : null,
    };
  },
  methods: {
    getUsers(){
      this.users = null;
      axios.get('/api/users')
      .then((response)=> {
        this.users = response.data;
      })
    }
  }
}
</script>
