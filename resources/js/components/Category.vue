<template>
  <div class="container-cat ">
    <div  class="check row" v-for="category in categories"
      :key="'c'+ category.id" 
      >
     
        <div class="square"
        @click="$emit('searching', { idCat: category.name})"
        >
          <img :src="category.cover" alt="">
          <span >
            {{category.name}}
          </span>
        </div>
     
        
        
    </div>
    
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Category',
  data(){
    return{
      categories:{},
      idCat:[],
    }
  },
  mounted(){
    this.getCategory();
  },
  methods:{
    getCategory(){
      axios.get('http://127.0.0.1:8000/api/categories/')
      .then(res => {
        this.categories = res.data
        //console.log(this.categories);
      })
      .catch(err => {
        console.log(err);
      })
    }, 
    getCatResearch(str){
      this.$emit('searching', str);
    }
  }
}
  


</script>

<style lang="scss" scoped>
.container-cat{
  width: 100%;
  //height: 100%;
  margin: 0 auto;
}
.check{


  //display: inline-flex;
  text-align: center;
  margin-top: 5px;
  width: 50%;

  .row{
      width: 50%;
  }

}

.check:hover{
  cursor: pointer;

}

.square{
  display: flex;
  flex-direction: column;
  width: 100px;
  padding-left: 10px;
  img{
    height: 50px;
    width: 50px;
    border-radius: 50%;
  }
  span{
      margin-top:5px;
  }

}
.active{
  color: white;
}
@media screen and (min-width: 992px) {
  .check {
    display: inline-flex;
    justify-content: space-between;
    flex-direction: row;
    width: 50%;
    margin-top: 15px;
    margin-left: 5px;
    margin-bottom: 5px;
  }
  img{
    margin-left: 15px;

  }
}
@media screen and (max-width: 992px) {

  img{
    margin-left: 15px;
  }
}

 //square d-flex justify-content-center flex-column
</style>