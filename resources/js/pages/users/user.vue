<template>
   <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">View User</h1>
        <p class="mb-4">You are currently viewing a single user's data. Click <router-link :to="{name: 'users.all'}">Here</router-link> to go back</p>
        <fetch-user />
    </div>
</template>

<script>
import FetchUser from '~/components/FetchUser'
export default {
    components: {
        FetchUser
    },
    middleware: 'auth',
    
    // computed: {
    //     data : this.$route.params.id
    // },

    metaInfo () {
        return { title: this.$t('home') }
    }
}
</script>