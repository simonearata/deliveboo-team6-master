<template>

  <header>
    <nav class="navbar navbar-expand-md">
        <div class="container d-flex justify-content-between">
            <router-link class="navbar-brand" :to="{name: 'home'}"><img class="logo-header" src="/img/logo-deliveroo-frontend.png" alt=""></router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <a class="navbar-toggler-icon" href="register" style="color:white"> <i class="fas fa-bars"></i></a>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                            <li class="nav-item dropdown">
                                <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                
                                </a> -->

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="login">
                                        Login
                                    </a>
                                    <a class="dropdown-item" href="register">
                                        Registrati
                                    </a>
                                </div>
                            </li>
                        
                    </ul> 
                </div>

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


    <div class="wrap">
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12 ml-10">
                        <div class="titleHeader">
                            <h1>I piatti che ami, a domicilio.</h1>
                        </div>
                        <div class="div-search d-flex align-items-center">
                            <input type="text" placeholder="Cerca il tuo ristorante..."
                              @keyup.enter="getStartResearch(searchText)"
                              v-model.trim="searchText"
                            >
                           
                            <button class="special capitalize btn btn-primary button"
                            @click.prevent="getStartResearch()"
                            >Cerca</button>
                        </div>
                    </div>

                    <div class="col-md-1 col-xs-12">
                    </div>

                    <div class="col-md-5 col-xs-12 pl-20px">
                        <div class="image-header">
                            <img src="/img/campaignrit.png" alt="foto">
                            <div class="riquadro-blu-header">
                                <div class="riquadro-blu-header-inside">
                                    <h2>#aCasaTuaConDeliveroo</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



  </header>

</template>

<script>

export default {
  name: 'Header',
  data(){
    return{
      categories:{},
      searchText: '',
      
    }
  },
  methods:{

    getStartResearch(){
      this.$emit('searching', this.searchText);
      this.searchText = '';
    },
   
  }
}
</script>

<style lang='scss' scoped>

header{
    nav.navbar{
    background-color: #00CCBC;
    padding-top: 20px;

        .logo-header{
            width: 112px;
            height: 32px;
        }
    }
    .wrap {
    background: rgb(0,204,188);
    background-image: linear-gradient(177deg, rgba(0,204,188,1) 49%, rgba(208,235,153,1) 49%);
    width: 100%;

        .header-bottom {
            padding-top: 40px;
                .titleHeader h1 {
                    color: #440063;
                    font-size: 40px;
                    font-weight: bold;
                    padding-top: 35px;
                    padding-bottom: 46px;
                 }
                 .div-search {
                    background-color: white;
                    height: 30%;
                    width: 100%;
                    margin-top:8%;
                    border-radius: 5px;

                    input {
                        color: #2e3333;
                        font-size: 19px;
                        margin-left: 45px;
                        margin-right: 45px;
                    }

                    .button {
                        width: 20%;
                        padding: 10px 10px;
                        margin: 15px auto;
                        font-size: 15px;
                        background-color:#007E8A;
                        -webkit-animation: pulsate 1.2s linear infinite;
                        animation: pulsate 1.2s linear infinite;

                        @-webkit-keyframes pulsate {
                            50% {color: #fff; text-shadow: 0 -1px rgba(0,0,0,.3), 0 0 5px #ffd, 0 0 8px #fff;}
                        }
                        @keyframes pulsate {
                            50% {color: #fff; text-shadow: 0 -1px rgba(0,0,0,.3), 0 0 5px #ffd, 0 0 8px #fff;}
                        }

                        &:hover {
                        background-color: #00CCBC;
                        }
                    }
                }
                .image-header {
                    width: 320px;
                    overflow: hidden;

                }

                .image-header img {
                    width: 100%;
                    height: 100%;
                }

                .riquadro-blu-header {
                    position: absolute;
                    overflow-y: hidden;
                    bottom: 0;
                    // width: 92%;
                    padding: 0 32px;
                    margin-left: -70px;

                    .riquadro-blu-header-inside {
                        background-color: #007e8a;
                        transform: rotate(3deg);
                        transform-origin: left;
                        padding: 28px 53px;

                        h2 {
                            color:white;
                            font-weight: bold;
                            font-size: 28px;
                            transform: rotate( -2deg);
                        }

                    }
                }
        }


    }
}


.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}
.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-content a:hover {background-color: #ddd;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #3e8e41;}

h1{
    font-size: 10px;
}
@media screen and (max-width: 992px) {
    
    .special{
        display: none;
    }
  
}

@media screen and (max-width: 425px) {
 
  #navbarSupportedContent{
    visibility: hidden;
  }
  .hamburger{
    display: block;
  }
}
@media screen and (min-width: 425px) {
 
  .hamburger{
      display: none;
  }
}

</style>