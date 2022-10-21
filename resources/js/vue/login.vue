<template>
    <div class="login_body">
        <div class="login_content">
            <div class="log_title"> login </div>

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
            }
        }
    },
    methods:{
        checkUser(){
            if (this.user.name == "admin" && this.user.password == "admin") {
                console.log('welcome');
                router.push({name:'content'});
                toast.fire({
                        icon:"success",
                        title:"Welcome Admin"
                    })
            }else{
                console.log('back');
            }
        }
    }
})
</script>


<style scoped>

</style>
