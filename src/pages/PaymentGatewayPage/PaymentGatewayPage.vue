<template>
  <div class="containera w-100 p-5">
    <RouterLink to="/" class=" fixed-left fixed-start text-white">Go Back</RouterLink>
    <h1 class="text-center mb-4 text-white">Payment Gateway</h1>
    <form @submit.prevent="logvalidator">
    <div class="row">
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="card-body">
            <h2 class="mb-3">Delivery Address</h2>
           
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="first-name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first-name" placeholder="John" v-model="Address.Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="last-name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last-name" placeholder="Doe" v-model="Address.SecondName">
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" placeholder="Country" v-model="Address.Country"  >
              </div>
              <div class="mb-3">
                <label for="postal-code" class="form-label">Postal Code</label>
                <input type="number"  class="form-control" id="postal-code" placeholder="Postal Code" v-model="Address.PostalCode" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5" >
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Address" v-model="Address.Add" >
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" placeholder="City" v-model="Address.City">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="province" class="form-label">Province</label>
                    <input type="text" class="form-control" id="province" placeholder="Province" v-model="Address.Province">
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="phone" placeholder="Phone Number" v-model="Address.Phone" maxlength="9" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
              </div>
         
          </div>
        </div>
      </div>
      
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="card-body">
            <h2 class="mb-3">Visa</h2>
            <form>
              <div class="mb-3">
                <label for="card-number" class="form-label">Card Number</label>
                <input type="number" class="form-control" id="card-number" placeholder="1234 5678 9012 3456" v-model="Visa.card" maxlength="16" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label for="expiry-date" class="form-label">Expiry Date</label>
                  <input type="text" class="form-control" id="expiry-date" placeholder="MM/YY" v-model="Visa.date" maxlength="5">
                </div>
                <div class="col">
                  <label for="cvv" class="form-label">CVV</label>
                  <input type="number" class="form-control" id="cvv" placeholder="123" v-model="Visa.cvv" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                </div>
              </div>
              
              <div class="w-100 d-flex align-items-center justify-content-center">
                
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="w-100 d-flex justify-content-center fs-4">
    <p class="text-white">Precio Total: {{ this.$route.params.totalprice }}€</p>
    </div>
    </div>
    <p class="text-danger text-center mb-1" id="res"></p>
    <div class="w-100 d-flex justify-content-center">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Pay Secure</button>
    </div>
    
  </form>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data(){
    return{
      Address:{
        Name:"",
        SecondName:"",
        Country:"",
        PostalCode:"",
        Add:"",
        City:"",
        Province:"",
        Phone:""
      },
      Visa:{
        card:"",
        date:"",
        cvv:""
      },
      Compra:{
        price:this.$route.params.totalprice,
        userid:this.$store.getters.Idusu
      }
    }
  },
  methods:{
    async logvalidator(e){
      const addressValues = Object.values(this.Address);
      const visavalues=Object.values(this.Visa);
      for(let i = 0; i < addressValues.length; i++){
        if(addressValues[i] === ""){
          e.preventDefault();
          document.getElementById("res").textContent = "Algun campo vacio";
          break;
        }
      }
      for(let i = 0; i < visavalues.length; i++){
        if(addressValues[i] === ""){
          e.preventDefault();
          document.getElementById("res").textContent = "Algun campo vacio";
          break;
        }
      }
     e.preventDefault();
     const respuesta= await axios.post(this.$store.getters.backurl+'/api/createcompra', this.Compra);
     const compraid=respuesta.data.compra.CompraId;
     let obj={
      carrito:this.$store.getters.carrito,
      compraId:compraid
     }
    await axios.post(this.$store.getters.backurl+'/api/createdetailcompra', obj);
    this.$router.push("/")
    }
  }
}
</script>

<style lang="scss" scoped>
@import "../../Style/variables.scss";
.containera{
  height: auto;
  background: linear-gradient(to bottom right, $bluelight, $black 40%, $black 50%, $bluelight 100%, );
}
.card {
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.card-body {
  padding: 2rem;
}

.form-control {
  border-radius: 5px;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0056b3;
  border-color: #0056b3;
}

.btn-primary:focus {
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}
@media only screen and (min-width: 850px) {
  .containera{
  height: 100vh;
  background: linear-gradient(to bottom right, $bluelight, $black 40%, $black 50%, $bluelight 100%, );
}
}
</style>
