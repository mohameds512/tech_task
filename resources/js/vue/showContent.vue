<template>
    <div class="div_cont">
        <input id="input_path" v-model="file_path" type="text" placeholder="file path">
        <button id="view_btn"  @click="getPath()">view</button><br>
        <div v-if="lines.length>0">
            <div class="file_cont">
                <div v-for="(line , index) in lines " :key="index">
                    <div> <p class="index_cont"> {{ str_ind + index +1}} </p> {{ line }} </div>
                </div>
            </div>
            <div class="btns">
                <button class="btn" @click="goStart()" >
                    <font-awesome-icon
                        icon="fa-angles-left"
                    />
                </button>
                <button class="btn" @click="prevLines()">
                    <font-awesome-icon
                        icon="fa-chevron-left"
                    />
                </button>
                <button class="btn" @click="nextLines()">
                    <font-awesome-icon
                        icon="fa-chevron-right"
                    />
                </button>
                <button class="btn" @click="lastLines()" >
                    <font-awesome-icon
                        icon="fa-angles-right"
                    />
                </button>
            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';


export default ({
    data:function(){
        return{
            file_path:'',
            content:[],
            lines:[],
            str_ind: 0,
            slices_num: 10,
            lastSlices:0,
        }
    },
    methods:{
        getPath(){
            axios.post('/api/getFile/',{
                file_path : this.file_path
            })
            .then(response=>{
                this.content = response.data;
                this.getLines();
            })
            .catch(err=>{
                console.log(err);
            })
        },
        getLines(){
            this.lines = this.content.slice(this.str_ind , this.slices_num);
        },
        goStart(){
            if(this.str_ind == 0){
                // return;
                toast.fire({
                    icon:"info",
                    title:"that's the first Lines"
                });
                return;
            }
            this.str_ind = 0 ;
            this.slices_num = 10 ;
            this.getLines();
        },
        prevLines(){
            if(this.str_ind == 0){
                toast.fire({
                    icon:"info",
                    title:"that's the first Lines"
                });
                return;
            }
            this.str_ind = this.str_ind - 10 ;//10 20
            this.slices_num = this.slices_num - 10 ;
            this.getLines();
        },
        nextLines(){
            if(this.slices_num >= this.content.length){
                toast.fire({
                    icon:"info",
                    title:"that's the last Lines"
                });
                return;
            }
            this.str_ind = this.str_ind + 10 ;//10 20
            this.slices_num = this.slices_num + 10 ;
            this.getLines();
        },
        lastLines(){
            if(this.slices_num >= this.content.length){
                toast.fire({
                    icon:"info",
                    title:"that's the last Lines"
                });
                return;
            }
            this.lastSlices = this.content.length % 10;
            this.str_ind = this.content.length - this.lastSlices;
            this.slices_num = this.content.length + (10 - this.lastSlices);
            this.getLines();
        }
    }
})
</script>




