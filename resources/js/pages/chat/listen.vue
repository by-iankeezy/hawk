<template>
  <div>
    <input type="text" v-model="message"/>
    <button @click="emitEvent">emit</button>
    <div>{{response}}</div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      message: '',
      response: 'Server has not yet replied.'
    }
  },
  methods: {
    emitEvent () {
      this.$socket.emit('hello_world', this.message)
    }
  },
  created () {
    this.$options.sockets.hello_world = (data) => {
      this.response = data
    }
  }
}
</script>