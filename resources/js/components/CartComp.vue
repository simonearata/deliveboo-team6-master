<template>
  <div class="d-flex">
    <div class="card" style="width: 18rem;"
          v-for="(dish, index) in cart"
          :key="index"
        >
          <img :src="dish.cover" class="card-img-top" :alt="dish.name">
          <div class="card-body">
            <h5 class="card-title">Nome piatto: {{dish.name}}</h5>
            <p class="card-text">Ingredienti: {{dish.ingredients}}</p>
            <p class="card-text">Prezzo: {{dish.price}}€</p>
            <p class="card-text">Disponibile: {{dish.visible}} </p>
          </div>
          <button 
            class="btn btn-primary"
            @click="removeItemFromCart(dish)"
          > 
            Rimuovi dal carrello 
          </button>
        </div>
        <router-link class="nav-link" :to="{name: 'payment'}">Pagamento</router-link>
  </div>
</template>

<script>

export default {
  name: 'CartComp',
  props:[
    'cart'
  ],
  methods:{
    removeItemFromCart(dish){
      this.$emit('removeItemFromCart', dish)
    }
  }
}
</script>

<style>

</style>