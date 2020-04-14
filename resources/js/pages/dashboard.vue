<template>
  <div class="content">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    Homepage
  </div>
</template>

<script>
export default {
  middleware: 'auth',
  metaInfo () {
    return { title: this.$t('dashboard') }
  }, 
}

</script>
