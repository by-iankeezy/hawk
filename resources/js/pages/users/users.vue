<template>
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="h2 mb-0 text-gray-800">Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link :to="{name: 'home'}">Dashboard</router-link></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
        <fetch-users />
    </div>
</template>

<script>
import FetchUsers from '~/components/FetchUsers'
export default {
    components: {
        FetchUsers
    },
    middleware: 'auth',

    metaInfo () {
        return { title: this.$t('home') }
    }
}
</script>