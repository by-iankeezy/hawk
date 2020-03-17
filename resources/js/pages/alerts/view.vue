<template>
    <div class="container-fluid">
        <fetch-alert />
    </div>
</template>

<script>
import FetchAlert from '~/components/FetchAlert'
export default {
    middleware: 'auth',
    metaInfo () {
        return { title: 'Alerts' }
    },
    components: {
        FetchAlert
    }
}
</script>