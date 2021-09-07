<template>
  
  <div>
    
    
    <router-view></router-view>
  
    
    <Footer />
  

  </div>

</template>

<script>
import Footer from './components/Footer.vue'

export default {
  components:{
    Footer
  }
}
</script>

<style lang="scss">
    @import '../sass/frontoffice/global';
    
</style>