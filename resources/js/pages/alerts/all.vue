<template>
    <div class="container-fluid">
        <card :title="'My Alerts'" class="alerts-card">
            <fetch-alerts />
        </card>
    </div>
</template>
<script>
import FetchAlerts from '~/components/FetchAlerts'

export default {
    middleware: 'auth',
    metaInfo () {
        return { title: 'Alerts' }
    },
    data() {
        return {
            dropdown: null
        };
    },
    components: {
        FetchAlerts
    }
}
</script>