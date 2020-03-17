<template>
  <div v-if="requireNav == true" >
      <div id="wrapper">
        <sidebar />
        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content">
            <navbar />
            <child />
          </div>
          <footer class="sticky-footer bg-white">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span>Copyright &copy; Ian xxxxxx 2020</span>
              </div>
            </div>
          </footer>
        </div>
      </div>
  </div>
  <div v-else>
    <child />
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import Navbar from '~/components/Navbar'
import Sidebar from '~/components/Sidebar'

export default {
  name: 'MainLayout',
  components: {
    Navbar,
    Sidebar
  },
  computed: mapGetters({
    requireNav: 'nav/requireNav'
  }),
  
}
</script>
