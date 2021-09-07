<template>
<div>
    
    <Header
    @searching="searching"/>
    <div class="d-flex general">
    <div class="left">
      <Category
      @searching="searchingCat"
      @searching3="reset"
      />
      <div class="text-center">
        <button class="btn btn-primary"
      @click="reset()">Reset</button>
      </div>
    </div>
      
    <div class="right">
      <div v-if="arrCat.length!=0">
        <div class="text">
          <h1>Risultati della ricerca per categoria:</h1>
        </div>
              <Restaurant
                v-for="(restaurant, index) in arrCat"
                :key="index"
                :cover="restaurant.cover"
                :restaurant_name="restaurant.restaurant_name"
                :address="restaurant.address"
                :p_iva="restaurant.p_iva"
              />
      </div>
      <div v-if="arrFilt.length!=0 && arrCat.length==0">
        <div class="text">
          <h1>Ristorante trovato:</h1>
        </div>
        <Restaurant
                v-for="(restaurant, index) in arrFilt"
                :key="index"
                :cover="restaurant.cover"
                :restaurant_name="restaurant.restaurant_name"
                :address="restaurant.address"
                :p_iva="restaurant.p_iva"
              />

      </div>


          <div v-if="arrFilt.length==0 && arrCat.length==0">
            
              <div class="text">      
                <h1>Tutti i ristoranti:</h1>    
              </div>
              <Restaurant
                v-for="(restaurant, index) in restaurants"
                :key="index"
                :cover="restaurant.cover"
                :restaurant_name="restaurant.restaurant_name"
                :address="restaurant.address"
                :p_iva="restaurant.p_iva"
                :slug="restaurant.slug"
              />

          </div>

    </div>  
    </div>
          <LavoraConNoi />

</div>
</template>

<script>

import axios from 'axios';
/* import Loader from '../components/Loader.vue'; */
import Restaurant from '../components/Restaurant.vue';
import Category from '../components/Category.vue';
import Header from '../components/Header.vue';
import LavoraConNoi from '../components/LavoraConNoi.vue';


export default {
  name: 'Home',

  data(){
        return{
          restaurants: [],
          searchText: '',
          arrFilt:[],
          arrCat:[],
          idCat:''
        }
    },
  components: {
      /* Loader, */
    Restaurant,
    Category,
    Header,
    LavoraConNoi
  },
  mounted(){
      axios.get('http://127.0.0.1:8000/api/restaurants')
        .then(res => {
          this.restaurants = res.data;
          //this.filteredRestaurants()
          console.log(this.restaurants);
        })
        .catch(err => {
          console.log(err);
        });

      if(localStorage.getItem('cart')) {
        try {
          this.cart = JSON.parse(localStorage.getItem('cart'));
        } catch(e) {
          localStorage.removeItem('cart');
        }
      }

    },
    methods:{
      reset(){
        this.arrCat=[];
        this.arrFilt=[];
      },
      searchingCat(obj){
        
        if(obj.idCat == ''){
          return this.restaurants;
        }
        this.restaurants.forEach(rest => {
          rest.categories.forEach(cat => {
            if (cat.name === obj.idCat && !this.arrCat.includes(rest)) {
              this.arrCat.push(rest)
            }
          });
        });
        console.log(this.arrCat);
        return this.arrCat;
      },
      searching(text){
            this.searchText = text;
            this.arrCat=[];
            console.log( this.searchText);
            this.filteredRestaurants();

      },

      filteredRestaurants(){
        this.arrFilt=[];
        if(this.searchText == ''){
          return this.restaurants;
        }
        return this.arrFilt=this.restaurants.filter(item => item.restaurant_name.toLowerCase().includes(this.searchText.toLowerCase()));
      },
    }
}
</script>

<style lang="scss" scoped>

.box-restaurants-home{
  background-color: #c5e4e4;
  /* background-color: white; */
  //width: 100%;
  //margin: 20px auto 0px;
  padding: 2.5rem 4rem;
  justify-content: center;
}
.general{
  background-color: #ffffff;
  margin-top: 20px;
}
.left{
  width: 15%;
  //height: 100vh;
  background-color: #15CBBC;
  border-radius: 15px;
  .btn{
    margin-top: 20px;
    margin-bottom: 20px;
  }
}
.right{
  width: 83%;
  margin: auto;
  //height: 100vh;
  background-color: #c5e4e4;
  display: flex;  
  justify-content: space-between;
  border-radius: 15px;

}
.right div{
  display: inline-flex;
  justify-content: space-evenly;
  flex-wrap: wrap;
}
.text{
  height: 30px;
  width: 100%;
  margin: 25px 0;
}

.video-deli{
  display: flex;
}

@media screen and (max-width: 992px) {
  .left {
    width: 100px;
   
  }
}
</style>