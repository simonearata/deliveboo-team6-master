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

    <div class="container mt-4">
       <div class="col-6 offset-3">
           <div class="card-payment bg-light">
               <div class="card-header">Payment Information</div>
               <div class="card-body">

                  <form>
                    <div class="form-group">
                        <label for="amount">Totale:</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">€</span></div>
                            <input readonly="readonly"
                                v-model="totalPrice"
                                type="number" id="amount" class="form-control">
                        </div>
                    </div>
                      <hr />
                    <div class="form-group">
                        <label>Numero Carta di Credito:</label>
                        <div id="creditCardNumber" class="form-control"></div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>Scadenza:</label>
                                <div id="expireDate" class="form-control"></div>
                            </div>
                            <div class="col-6">
                                <label>CVV</label>
                                <div id="cvv" class="form-control"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input v-model="email" type="text" id="email" :class="{ 'form-control':true, 'is-invalid': errors.email}" required>
                        <p v-for="(error, index) in errors.email" :key="`email-error-${index}`" class="invalid-feedback">
                            {{ error }}
                        </p>
                    </div>
                    <button class="btn btn-primary btn-block"  @click.prevent="sendForm(); payWithCreditCard();" ><router-link :to="{name: 'order'}" style="color:white">Invia</router-link></button>
                  </form>
               </div>
           </div>
       </div>
   </div>
    </div>    
</template>

<script>

import braintree from 'braintree-web';
import axios from 'axios';

export default {
  name: 'Payment.vue',

  data() {
   return {
    hostedFieldInstance: false,
    nonce: '',
    error : '',
    email: '',
    errors: {},
    success: false,
    totalPrice: this.$route.params.totalPrice,
   }
  },
  components:{
    
  },
  mounted() {
    braintree.client.create({
        authorization: 'sandbox_q7qqc59w_qxp7g4y69kvbfpxb'
    })
    .then(clientInstance => {
        let options = {
            client: clientInstance,
            styles: {
                input: {
                    'font-size': '14px',
                    'font-family': 'Open Sans'
                }
            },
            fields: {
                number: {
                    selector: '#creditCardNumber',
                    placeholder: 'Enter Credit Card'
                },
                cvv: {
                    selector: '#cvv',
                    placeholder: 'Enter CVV'
                },
                expirationDate: {
                    selector: '#expireDate',
                    placeholder: '00 / 0000'
                }
            }
        }
        return braintree.hostedFields.create(options)
    })
    .then(hostedFieldInstance => {
      // Use hostedFieldInstance to send data to Braintree
      this.hostedFieldInstance = hostedFieldInstance;
    })
    .catch(err => {
    });
  },

  methods: {
    payWithCreditCard() {
      if(this.hostedFieldInstance)
      {
        this.error = "";
        this.nonce = "";
      
        this.hostedFieldInstance.tokenize().then(payload => {
            console.log(payload);
            this.nonce = payload.nonce;
        })
        .catch(err => {
            console.error(err);
            this.error = err.message;
        })
      }
    },

    sendForm() {
        this.success = false;
        axios.post('/api/payments', {
            'email': this.email,
        }).then((response) => {
            if(!response.data.success) {
                this.errors = response.data.errors;
                this.success = false;
            } else {
                this.email = '';
                this.errors = {};
                this.success = true;
            }
            console.log(response)
        });
    },

  }


}

</script>

<style lang="scss" scoped>

</style>