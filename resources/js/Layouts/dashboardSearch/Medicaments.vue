<template>
    
            <div
                class="flex justify-between flex-wrap bg-green-100 text-green-600 rounded-full px-3 items-center my-3"
            >
                <div class="w-8/12 text-left">
                {{ medicament.name }}
                </div>

                <div class="w-4/12 flex flex-row justify-end items-center">
                    <div class="px-2">
                      {{ medicament.quantity}}
                    </div>
                    <div>
                        <button 
                        @click="deleteNum"
                        class="text-red-800">
                            <i class="far fa-times-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
       
   
</template>

<script>
export default {
    props:['medicament'],
    methods:{
        deleteNum(){
            this.$emit("deleteId",this.medicament.id)
        }
    }
};
</script>

<style></style>
