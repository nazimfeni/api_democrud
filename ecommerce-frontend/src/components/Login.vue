<template>
    <div class="form-container">
        <form @submit.prevent="login" class="login-form">
            <input type="email" v-model="email" placeholder="Email" required />
            <input
                type="password"
                v-model="password"
                placeholder="Password"
                required
            />
            <button type="submit">Login</button>
        </form>
    </div>
</template>

<script>
import axis from "@/axios";

export default {
    data() {
        return {
            email: "",
            password: "",
        };
    },

    methods: {
      async login(){
            try{
                  const response = await axios.post(
                        "/login, {
                             email: this.email,
                             password: this.password          
                        });

                      
            }
      }
    }



};
</script>
