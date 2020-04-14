<template>
        <div v-if="requireNav == true" >

          <div class="main-wrapper">
            <div class="navbar-bg"></div>
              <navbar />
              <sidebar />

           <div class="main-content">
              <child />
            </div>
            <footer class="main-footer">
              <div class="footer-left">
                Copyright &copy; 2020 <div class="bullet"></div> Design By <a target="_blank" href="https://ian.galileoc.co.ke/">Galileo Computing</a>
              </div>
              <div class="footer-right">
                0.1.0
              </div>
            </footer>
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
