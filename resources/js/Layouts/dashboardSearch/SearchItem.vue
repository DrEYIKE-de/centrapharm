<template>
  <div
            class="px-3 py-1 border text-blue-600 my-2 rounded-full hover:bg-blue-100 hover:text-blue-700 hover:border-blue-100 flex justify-between items-center"
  >
            <div class="w-2/3">
                        
                        <span
                            class="text-white px-2 py-1 bg-indigo-600 rounded-full mr-3"
                            >
                           {{ medicament.name }} 
                        </span>
            </div>
            <div class="w-1/6 flex justify-center">
                        <input
                            type="text"
                            class="w-16 p-0 m-0 rounded-xl text-center text-green-800"
                        v-model="num" 
                        @input="numbers"  
                        />
            </div>
            <div class="w-1/6 flex justify-end">
                    <button 
                    v-if="disabled"
                    @click="sendItemId"
                    class="px-2 py-1 bg-green-400 font-bold rounded-2xl text-white text-center" >
                            Ajouter 
                    </button>
            </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            num:"",
            disabled:false
        }
    },

    props:['medicament'],
    methods: {
       numbers(){
           this.num>=1 ? this.disabled=true : this.disabled=false
       },
       sendItemId(){
           const sendingParameters={
               medicamentId: this.medicament.id,
               quantity: this.num
           }
           this.$emit("takeItemId",sendingParameters)
        
       }
       
    },
}

</script>

<style>

</style>