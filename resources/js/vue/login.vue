<template>
    <div class="login_body">
        <div class="login_content">
            <div class="log_title"> login </div>
                <div class="alert-error" v-if="this.error != '' ">
                    {{ error }}
                </div>
                <input  type="text" v-model="user.name" autocomplete="off">
                <input type="password" v-model="user.password" autocomplete="off">
                <button class="log_btn" @click="checkUser()">Log</button>

        </div>
    </div>
</template>
<script>
import router from '../router/index'
export default ({
    data:function(){
        return {
            user:{
                name:"",
                password:"",
            },
            error:""
        }
    },
    methods:{
        checkUser(){
            if (this.user.name == "admin" && this.user.password == "admin") {
                router.push({name:'content'});
                toast.fire({
                        icon:"success",
                        title:"Welcome Admin"
                    })
            }else{
                this.error = "check Your name or Password";
                this.user.name ="";
                this.user.password ="";
            }
        }
    }
})
</script>


<style scoped>

</style>
