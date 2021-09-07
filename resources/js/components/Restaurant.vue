<template>

  <div id="all-restaurants">

    <!-- <router-link :to="{name: 'restaurantshow', params:{slug}}" class="red"> -->
      <div class="box-card">
        <div class="ih-item circle effect1">
            <router-link :to="{name: 'restaurantshow', params:{slug}}" class="red">
                <div class="spinner"></div>
                <!-- <div class="restaurant-img"> -->
                    <div class="img"><img :src="cover"  :alt="cover_name"></div>
                    <div class="info">
                        <div class="info-back">
                        <h3>{{ restaurant_name }}</h3>
                        <p>Indirizzo: <strong>{{ address }}</strong> </p>
                        </div>
                    </div>
                <!-- </div> -->
                <!-- <h4>
                    <strong>{{ restaurant_name }}</strong>
                </h4> -->
                <!-- <p>Indirizzo: <strong>{{ address }}</strong> </p>
                <p>P. iva: {{ p_iva}}</p> -->
            </router-link>
        </div>
      </div>
    <!-- </router-link> -->

    <!-- <div class="ih-item circle effect1">

    </div> -->

    <!-- normal -->
              <!-- <div class="ih-item circle effect1">
                  <a href="#">
                    <div class="spinner"></div>
                    <div class="img"><img src="/img/campaignrit.png" alt="img"></div>
                    <div class="info">
                        <div class="info-back">
                        <h3>Heading here</h3>
                        <p>Description goes here</p>
                    </div>
                    </div>
                  </a>
                </div> -->
              <!-- end normal -->

  </div>



</template>

<script>


export default {
  name: 'Restaurant',

  props:{
    cover: String,
    restaurant_name: String,
    address: String,
    p_iva: String,
    slug: String
  },

  data(){
    return{
      restaurants: {}
    }
  },

  /* mounted(){
    this.getRestaurant();
  },

  methods:{
    getRestaurant(){
      axios.get('http://127.0.0.1:8000/api/restaurants')
      .then(res => {

        this.restaurants = res.data
        console.log(this.restaurants);
      })
      .catch(err => {
        console.log(err);
      })
    }
  } */

}
</script>

<style lang="scss" scoped>


  /* h1{
    display: block;
  } */

  .box-card{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    background-color: #c5e4e4;
    /* width: 90%; */
    margin: 20px 10px 0px;
    /* border: 1px solid red; */

  }

.red{
    color: #333;
    width: 200px;
    height: 200px;
}
  .red:hover{
      color: #007E8A;
      text-decoration: none;
  }
 /*  .card{
    height: 250px;
    width: 250px;
    background-color: #daf5f3;
    margin: 8px;
    border: 1px solid black;

    h4{
      text-align: center;
      margin-top:5px;
      margin-bottom:5px;
      font-weight: bold;
      font-size: 1.15rem;
    }

    p{
      margin:0 5%;
      color: black;
    }

  } */

  .restaurant-img{
    display: flex;
    justify-content: center;
    width: 100%;
    max-height: 60%;
    margin-top: 2%;
    img{
      max-width: 55%;
      max-height: 90%;
      height: 120px;
      border-radius: 5px;
    }
  }


  .all-restaurants{
      /* width: 90%; */
      margin: auto;
  }


  /* -------effetti cerchio */

  .ih-item.circle {
  position: relative;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  /* border: 1px solid blue; */

  /* display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    background-color: #c5e4e4;
    width: 90%;
    margin: 20px auto 0px;
    border: 1px solid red; */}

  .ih-item a {
    color: #333;
    width: 230px;
    height: 230px;
}

img {
  border: 0;
}
img {
  vertical-align: middle;
}
.ih-item img {
  width: 100%;
  height: 100%;
}


.ih-item.circle .img {
  position: relative;
  width: 150px;
  height: 150px;
  border-radius: 50%;
}

.ih-item.circle .img img {
  border-radius: 50%;
}

.ih-item.circle.effect1 .spinner {
  width: 200px;
  height: 200px;
  border: 8px solid #450063;
  border-right-color: #65E3DB;
  border-bottom-color: #65E3DB;
  border-radius: 50%;
  -webkit-transition: all 0.8s ease-in-out;
  -moz-transition: all 0.8s ease-in-out;
  transition: all 0.8s ease-in-out;
}
.ih-item.circle.effect1 .img {
  position: absolute;
  top: 9px;
  bottom: 0;
  left: 9px;
  right: 0px;
  width: 91%;
  height: 91%;
  /* align-items: center; */
}



.ih-item.circle.effect1 .img:before {
  display: none;
}
/* .ih-item.circle.effect1.colored .info {
  background: #1a4a72;
  background: rgba(26, 74, 114, 0.6);
} */

.ih-item.circle .info {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  text-align: center;
  border-radius: 50%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  width: 91%;
  height: 91%;
}


.ih-item.circle.effect1 .info {
  top: 9px;
  bottom: 0;
  left: 9px;
  right: 0;
  background: #333333;
  background: rgba(0, 0, 0, 0.6);
  opacity: 0;
  -webkit-transition: all 0.8s ease-in-out;
  -moz-transition: all 0.8s ease-in-out;
  transition: all 0.8s ease-in-out;
  width: 91%;
  height: 91%;
}

.ih-item.circle.effect1 .info h3 {
  color: #fff;
  text-transform: uppercase;
  position: relative;
  letter-spacing: 2px;
  font-size: 16px;
  text-align: center;
  margin: 0 35px;
  padding: 25px 0 0 0;
  height: 70px;
  text-shadow: 0 0 1px white, 0 1px 2px rgb(0 0 0 / 30%);
}
.ih-item.circle.effect1 .info p {
  color: #bbb;
  padding: 10px 5px;
  font-style: italic;
  margin: 0 30px;
  margin-top:10px;
  font-size: 12px;
  border-top: 1px solid rgba(255, 255, 255, 0.5);
}

.ih-item.circle.effect1 a:hover .spinner {
  -webkit-transform: rotate(180deg);
  -moz-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  transform: rotate(180deg);
}
.ih-item.circle.effect1 a:hover .info {
  opacity: 1;
}


</style>


export default {
  name: 'Restaurant',

  props:{
    cover: String,
    restaurant_name: String,
    address: String,
    p_iva: String,
    slug: String
  },

  data(){
    return{
      restaurants: {}
    }
  },

  /* mounted(){
    this.getRestaurant();
  },

  methods:{
    getRestaurant(){
      axios.get('http://127.0.0.1:8000/api/restaurants')
      .then(res => {

        this.restaurants = res.data
        console.log(this.restaurants);
      })
      .catch(err => {
        console.log(err);
      })
    }
  } */

}
</script>

<style lang="scss" scoped>


  /* h1{
    display: block;
  } */

  .box-card{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    background-color: #c5e4e4;
    width: 90%;
    margin: 20px auto 50px;

  }

  .red:hover{
      color: #007E8A;
      text-decoration: none;
  }
  .card{
    height: 250px;
    width: 250px;
    background-color: #daf5f3;
    margin: 8px;
    border: 1px solid black;

    h4{
      text-align: center;
      margin-top:5px;
      margin-bottom:5px;
      font-weight: bold;
      font-size: 1.15rem;
    }

    p{
      margin:0 5%;
      color: black;
    }

  }

  .restaurant-img{
    display: flex;
    justify-content: center;
    width: 100%;
    max-height: 60%;
    margin-top: 2%;
    img{
      max-width: 55%;
      max-height: 90%;
      height: 120px;
      border-radius: 5px;
    }
  }


  .all-restaurants{
      /* width: 90%; */
      margin: auto;
  }
</style>