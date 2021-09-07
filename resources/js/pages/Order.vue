<template>
  <div>
    
    <nav class="navbar navbar-expand-md">
        <div class="container d-flex justify-content-between">
            <router-link class="navbar-brand" :to="{name: 'home'}"><img class="logo-header" src="/img/logo-deliveroo-frontend.png" alt=""></router-link>
            <router-link class="navbar-brand" :to="{name: 'home'}" style="color:white"><i class="fas fa-home"></i></router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-2">
                        <a class="capitalize btn <!-- btn-primary button -->" href="login">Login</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="capitalize btn <!-- btn-primary button -->" href="register">Registrati</a>
                    </li>
                </ul>
            </div>
        </div>


    </nav>

    <Loader v-if="loaded" />


    <div v-else class="card-order ">
      <div class="card-body d-flex align-items-center flex-column">
        <h5 class="card-title">Ordine effettuato!</h5>
          <video class="video" poster="/video/rider.gif" autoplay loop muted></video>
        <router-link class="navbar-brand mt-2" :to="{name: 'home'}">Torna alla home</router-link>
      </div>
    </div>

    
  </div>
</template>

<script>
import Loader from '../components/Loader.vue';


export default {
  name: 'Order',
  components:{
    Loader
  },
  data(){
    return{
      loaded: true
    }
  },

  mounted(){

    setTimeout(()=>{
      this.loaded = false;
    }, 2500);
   
  },
}
</script>

<style>

</style>