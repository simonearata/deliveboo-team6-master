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

        <div class="container-restaurant-cart">

          <Loader v-if="loaded" />
            
            <div class="box-restaurant-left">
                <div style="margin-top: 40px;">
                    <img :src="restaurant.cover" alt="immagine ristornate" style="width: 150px; height:150px;border-radius:50%;">
                    <h2 class="card-title" style="display: inline;color:#450063;margin-left:3%; font-size:50px;"> {{ restaurant.restaurant_name }} </h2>
                    <p style="text-align:right; margin-right:10px;">Ultimo aggiornamento: {{formatDate(restaurant.updated_at)}} </p>
                    <p class="card-text mt-2" style="text-align:right;margin-right:10px;margin-bottom:10px"><i class="fas fa-map-marker-alt"></i> {{ restaurant.address }}</p><br>
                   
                    <div>
                   
                </div>
                </div>


                <div v-if="page === 'cart'">
                    <CartComp
                      :cart="cart"
                      @removeItemFromCart="removeItemFromCart"
                    />
                </div>


                <div v-else
                    class="d-flex flex-wrap">
                <div class="card" style="width: 22%; margin:10px"
                    v-for="(dish, index) in restaurant.dishes"
                     :key="index">
                    <div class="imgBx">
                        <div class="cerchio-top"></div>
                    </div>
                    <div class="contentBx">
                        <h2>{{dish.name}}</h2>
                        <div class="size">
                        <h3><strong>Ingredienti: </strong>{{dish.ingredients}}</h3>
                        <p><strong>Prezzo: </strong>{{dish.price}}€</p>
                        </div>
                        <button
                            class="btn btn-primary"
                            @click="addItemToCart(dish)"
                        >
                            Aggiungi al carrello
                        </button>
                    </div>
                </div>
                </div>


            </div>

            <!-- <div class="box-cart-right">
                <label class="btn" for="top-box"><i class="fas fa-shopping-cart"></i></label>
                <input class="open" id="top-box" type="checkbox" hidden>
                <div class="top-panel">
                    <div class="message">
                        <h4>{{cart.length}} piatti nel carrello</h4>
                        <h4> Prezzo totale: {{ totalPrice }}€ </h4>
                        <button
                          class="btn btn-primary"
                          @click="resetCart()"
                        >
                          Azzera il carrello
                        </button>
                        <router-link class="btn btn-primary ml-1" :to="{name: 'payment', params:{totalPrice}}" style="color:white">Prosegui</router-link>
                        <div>

                            <div class="card-cart"
                                v-for="(dish, index) in cart"
                                :key="index"
                                >
                                <div class="card-body">
                                    <h5 class="card-title" style="color: black;">{{dish.name}}</h5>
                                    <p class="card-text">Prezzo: {{dish.price}}€</p>
                                    <div class="card-text"> 
                                      <button @click="removeQuantity(dish)">-</button> 
                                      <span> {{dish.quantity}} </span> 
                                      <button @click="addQuantity(dish)">+</button>
                                    </div>
                                  
                                        
                                </div>
                                <button
                                  class="btn btn-primary"
                                  @click="removeItemFromCart(dish)"
                                >
                                  <i class="fas fa-trash"></i>
                                </button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="box-cart-right">
                <label class="btn" for="top-box"><i class="fas fa-shopping-cart"></i></label>
                <input class="open" id="top-box" type="checkbox" hidden>
                <div class="top-panel">
                    <div class="message">
                        <h4>{{cart.length}} piatti nel carrello</h4>
                 <h4> Prezzo totale: {{ totalPrice }}€ </h4>
                        <!-- <button
                          class="btn btn-primary"
                          @click="resetCart()"
                        >
                          Azzera il carrello
                        </button> -->
                        <div>

                            <div class="card-cart"
                                v-for="(dish, index) in cart"
                                :key="index"
                                >
                                <div class="card-body">
                                    <h5 class="card-title" style="color: black; font-size:15px;">{{dish.name}}</h5>
                                    
                                    <div class="card-text">
                                      <button class="circle-piu-meno" @click="removeQuantity(dish)"><i class="fas fa-minus"></i></button>
                                      <span style="font-weight:800;color:black;">{{dish.quantity}}</span>
                                      <button class="circle-piu-meno" @click="addQuantity(dish)"><i class="fas fa-plus"></i></button>
                                    </div>

                                    <p>Prezzo: {{dish.price}}€</p>
                                    
                                </div>
                                <button style="background-color:#FB5058; border-radius:50%;"
                                  class="btn btn-primary"
                                  @click="removeItemFromCart(dish)"
                                >
                                  <i class="fas fa-trash"></i>
                                </button>


                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                      <button
                            class="btn btn-primary btn-reset-cart ml-2"
                            @click="resetCart()"
                          >
                            Azzera il carrello
                      </button>
                      <router-link class="btn btn-primary btn-reset-cart" :to="{name: 'payment', params:{totalPrice}}" style="background-color: #450063">Prosegui</router-link>

                    </div>
                </div>
            </div>
        </div>

</div>



</template>

<script>
import axios from 'axios';
import CartComp from '../components/CartComp.vue';
import Loader from '../components/Loader.vue';

export default {
  name: 'RestaurantShow',
  components:{
    CartComp,
    Loader
  },
  data(){
    return{
      restaurant: {},
      dishes:[],
      page: 'dishes',
      cart: [],
      itemPrice: 0,
      totalPrice: 0,
      loaded: true,
      totalDish:0
    }
  },
  methods:{
    /* removeItemFromCart(product) {
      //this.totalDish = 0; //variabile di lavoro  = 0
      this.totalDish = product.price * product.quantity;
      this.totalPrice = this.totalPrice - this.totalDish;
      this.$emit("removeItemFromCart", product);
    }, */
    removeQuantity(product){
      if(product.quantity === 1){
        product.quantity = 1;
      }else{
        product.quantity--;
        this.totalDish-=product.price;
        this.totalPrice = this.totalPrice - product.price;
      }
    },
    addQuantity(product){
      product.quantity++;
      this.totalDish+=product.price;
      this.totalPrice = this.totalPrice + product.price;
    },
    formatDate(date){
        let d = new Date(date);
        let dy = d.getDate();
        let m = d.getMonth() + 1;
        let y = d.getFullYear();
        if(dy < 10) dy = '0' + dy;
        if(m < 10) m = '0' + m;
      return `${dy}/${m}/${y}`;
    },
    resetCart(){
      this.cart = [];
      this.totalPrice = 0;
    },
    navigateTo(page){
      this.page = page;
    },
    addItemToCart(dish){
      if(!this.cart.includes(dish)){
        this.cart.push(dish);
        dish.quantity = 1;
        this.totalDish+=dish.price;
        this.totalPrice+=dish.price;
      }      
      else{
        dish.quantity++;
        this.totalDish+=dish.price;
        this.totalPrice+=dish.price;
      }      
    },
   removeItemFromCart(dish){
      this.cart.splice(this.cart.indexOf(dish), 1);
     this.totalPrice = this.totalPrice - (dish.price * dish.quantity); 
  
     },
    // addQuantity(dish){
    //   dish.quantity++;
    //   this.totalPrice = this.totalPrice + dish.price;
    // },
    // removeQuantity(dish){
    //   if(dish.quantity === 1){
    //     dish.quantity = 1;     
    //   }else{
    //     dish.quantity--;
    //     this.totalPrice = this.totalPrice - dish.price;
    //   } 
    // },
    // calcPrice(quantity, price){
    //   console.log(this.totalPrice + 'primo');
    //   console.log(this.itemPrice + 'item');
    //   this.itemPrice = quantity * price;
    //   this.totalPrice +=this.itemPrice;
    //     console.log(this.totalPrice);
    //     console.log(this.itemPrice);
    //   return this.itemPrice.toFixed(2);
    // },
    // calcTotal(){
      
    //   this.totalPrice +=this.itemPrice;
      
      
    // },
    
  },
  watch:{     
    cart:{       
      handler(newCart){         
        localStorage.cart = JSON.stringify(newCart);        
      },       
      deep: true     
    }   
  },
  mounted(){
    //console.log(this.$route.params.slug);
    axios.get('http://127.0.0.1:8000/api/restaurants/' + this.$route.params.slug)
      .then(res =>{
        console.log(res.data);
        if(res.data.success){
          this.restaurant = res.data.result
          this.dishes = this.restaurant.dishes
          console.log(this.restaurant.dishes);
          this.loaded = false;
        }else{
          this.$router.push({name: 'error404'})
        }
      })
      .catch(err =>{
        console.log(err);
      });
      if(localStorage.cart){
        this.cart = JSON.parse(localStorage.cart);
      }
  },
    created(){
    console.log('vediamo il cart nel created')
    this.cart.forEach(element => {
      console.log('visualizzo il prezzo prima di moltiplicarlo');
      console.log(element.price);
      console.log('//visualizzo il prezzo prima di moltiplicarlo');
      console.log('visualizzo la quantità prima di moltiplicarla');
      console.log(element.quantity);
      console.log('//visualizzo la quantità prima di moltiplicarla');

      console.log('visualizzo la variabile che conterrà il tot');
      console.log(this.totalDish);
      console.log('//visualizzo la variabile che conterrà il tot');
      this.totalDish = element.price * element.quantity;

      console.log('mi salvo in una variabile il totale per ogni piatto');
      this.totalPrice = this.totalPrice + this.totalDish
      console.log('//mi salvo in una variabile il totale per ogni piatto');
      console.log('visualizzo il totale una volta calcolata');
      console.log(this.itemPrice);
      console.log('//visualizzo il totale una volta calcolata');

      console.log('visualizzo il totale del carrello');
      console.log(this.totalPrice);
      console.log('//visualizzo il totale del carrello');
      
      console.log('visualizzo gli elementi presenti dentro element');
      console.log(element);
      console.log('//visualizzo gli elementi presenti dentro element');
    }

    );
    console.log('vediamo il cart nel created')
    console.log(this.cart)

  }
}

</script>

<style lang="scss">
nav.navbar{
  background-color: #00CCBC;
  padding-top: 20px;
    .logo-header{
      width: 112px;
      height: 32px;
    }
    .fas.fa-home{
      font-size: 25px;
    }
}
    .container-restaurant-cart{
        width: 100%;
        display: flex;
        justify-content: space-between;
        .box-restaurant-left{
            width: 75%;
            margin: 10px;
            background-color: #D0EB99;
            padding-left: 5%;
            border-radius: 20px;
            .card-body{
                width: 100%;
                margin: 0;
                background-color: chartreuse;
                h5.card-title{
                    color: black;
                }
            }
        }
        .box-cart-right{
            width: 25%;
            background-color: white;
            label.btn {
                display: block;
                position: absolute;
                right: 2%;
                /* top: 50px; */
                cursor: pointer;
                background: #00CCBC;
                width: 50px;
                border-radius: 0 0 5px 5px;
                padding: 8px 5px;
                color: #FFF;
                line-height: 20px;
                font-size: 12px;
                text-align: center;
                -webkit-font-smoothing: antialiased;
                cursor: pointer;
                transition: all 400ms cubic-bezier(0.17,0.04,0.03,0.94);
                box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
                z-index: 9999;
                &:hover{
                    box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18),0 4px 15px 0 rgba(0,0,0,0.15)
                }
            }
            /* Attivazione del panello  */
            .open:checked ~ .top-panel {
                top: 80px
            }
            .open:checked ~ label.btn {
                top: 250px
            }
            /* Spostamento del contenitore del contenuto della pagina  */
            .open:checked ~ .container {
                margin-top: 300px
            }
            /* Colore del interruttore al clic */
            .open:checked + label.btn {
                background: #dd6149
            }
            .top-panel {
                background-color: rgba(255, 255, 255, 0.808);
                position: absolute;
                top: -3500px;
                right: 0;
                width: 24%;
                overflow-y: auto;
                height: 500px;
                padding: 0;
                box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(7, 165, 212, 0.815);
                transition: top 400ms cubic-bezier(0.17,0.04,0.03,0.94);
                border-radius: 20px;
                /* z-index:999; */
                /* Blocco del contenuto */
                    .message {
                    color: black;
                    font-weight: 500;
                    font-weight: 300;
                    position: relative;
                    padding-top: 15px;
                    margin: 0 auto;
                    width: 90%;
                    .card-cart{
                        width: 100%;
                        /* background-color: rgba(255, 255, 255, 0.808); */
                        background: rgba(152, 238, 231, 0.952);
                        /* background-color: white; */
                        border-radius: 5%;
                        margin:0 auto;
                        box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(7, 165, 212, 0.815);
                            border-radius: 20px;
                        .card-body{
                            display: flex;
                            justify-content: space-evenly;
                            width: 100%;
                            margin-top:20px;
                            padding:20px 0px;
                            background: rgba(152, 238, 231, 0.952);
                            border-radius: 20px;

                            .h5{
                                display: inline;
                            }
                            p{
                                margin-bottom:2px;
                            }
                        }
                    }
                }
            }
        }
    }
    /* -box carta-- */


.card{
  position: relative;
  /* width: 320px; */
  height: 350px;
  background: #00C2B3;
  border-radius: 20px;
  overflow: hidden;
  width: 22%;
    margin: 10px;
}

.card:before{
  content: '';
  position: absolute;
  top:0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #450063;
  clip-path: circle(150px at 0% 90%);
  transition: 0.5s ease-in-out;
}

.card:hover:before{
  clip-path: circle(220px at 80% -20%);
}

.card:after{
  content: '';
  position: absolute;
  top: 30%;
  left: -20%;
  font-size: 12em;
  font-weight: 800;
  font-style: italic;
  color: rgba(75, 243, 229, 0.05)
}

.card .imgBx{
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  z-index: 10000;
  width: 100%;
  height: 220px;
  transition: 0.5s;
}

.card:hover .imgBx{
  top: 0%;
  transform: translateY(0%);

}

.card .imgBx img{
  position: absolute;
  top: 20%;
  left: 50%;
  transform: translate(-50%, -50%) rotate(-25deg);
  width: 270px;
}

.card .contentBx{
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 100px;
  text-align: center;
  transition: 1s;
  z-index: 10;
}

.card:hover .contentBx{
  height: 250px;
}

.card .contentBx h2{
  position: relative;
  font-weight: 600;
  font-size: 25px;
  letter-spacing: 1px;
  color: #fff;
  margin: 0;
  margin-bottom:10px;
}

.card .contentBx .size, .container .card .contentBx .color {
  /* display: flex;
  justify-content: center;
  align-items: center; */
  padding: 8px 20px;
  transition: 0.5s;opacity: 0;
  visibility: hidden;
  padding-top: 0;
  padding-bottom: 0;
}

.card:hover .contentBx .size{
  opacity: 1;
  visibility: visible;
  transition-delay: 0.5s;
}

.card:hover .contentBx .color{
  opacity: 1;
  visibility: visible;
  transition-delay: 0.6s;
}

.card .contentBx .size h3, .container .card .contentBx .color h3{
  color: black;
  font-weight: 300;
  font-size: 10px;
  text-transform: uppercase;
  letter-spacing: 2px;
  margin-right: 10px;
  margin-top:35px;
}

.card .contentBx .size span{
  width: 26px;
  height: 26px;
  text-align: center;
  line-height: 26px;
  font-size: 14px;
  display: inline-block;
  color: #111;
  background: #fff;
  margin: 0 5px;
  transition: 0.5s;
  color: #111;
  border-radius: 4px;
  cursor: pointer;
}
.card .contentBx .size span:hover{
  background: #9bdc28;
}



.card .contentBx a{
  display: inline-block;
  padding: 10px 20px;
  background: #227BC5;
  border-radius: 4px;
  margin-top: 10px;
  text-decoration: none;
  font-weight: 600;
  color: white;
  opacity: 0;
  transform: translateY(50px);
  transition: 0.5s;
  margin-top: 10px;
}

.card:hover .contentBx a{
  opacity: 1;
  transform: translateY(0px);
  transition-delay: 0.75s;

}

.cerchio-top{
  content: '';
  position: absolute;
  top:-102px;
  left: 0;
  width: 100%;
  height: 100%;
  background: #FB5058;
  clip-path: circle(150px at 100% 8%);
  transition: 0.5s ease-in-out;
}

.circle-piu-meno{
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background-color: #2178BF;
    border: none;
    i{
        font-size: 11px;
        color: white;
    }
}

.card-text{
    color:green;
}

.btn-reset-cart{
    background-color: #FB5058;
    margin-bottom: -180px;
    margin-right:20px;
        &:hover{
            color:white;
            background-color: red;
        }
}
</style>