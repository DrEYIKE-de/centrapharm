<template>
    <div class="">
        <input
            type="search"
            name=""
            id=""
            class="flex w-full box-boder text-black rounded-full shadow-inner border border-green-400 focus:border-green-400 focus:ring-2 focus:ring-green-400 active:border-green-600"
            placeholder="Nom du medicament / Produit cosmetique"
            v-model="input"
            @input="search"
        />
        <div
             v-if="medicaments.length>=1 && input.length>=2"
            class="flex justify-around px-4 text-gray-600 bg-gray-100 font-bold rounded-lg my-3"
        >
            <p class="w-2/3">Vos medicaments</p>
            <p class="w-1/6 flex justify-center"><span class="">Quantités</span></p>
            <p class="w-1/6 flex justify-end"><span>Action</span></p>
        </div>
        <div class="flex justify-center  my-2 ">
            <div   v-if="input.length==1"
            class="text-red-600 bg-red-200 text-center py-2 w-2/3 px-3">
                Votre recherche necessite deux mots minimum
            </div>
        </div>

        <p v-if="input.length==0"
            class="mt-2 text-sm font-bold text-center md:text-left text-gray-400 mb-5"
        >
            ** - Recherche après les deux premieres lettres du produit - **
        </p>

        <div v-if="input.length>=2 && medicaments.length<=0"
        class="text-red-600 bg-red-200 rounded text-center my-2">
            Aucun medicament trouvé dans la base de donnees
        </div>
       <div class="" v-if="input.length>=2">
        <div
            v-for="medicament in medicaments"  :key="medicament.id"
            class="list-none m-0 p-0"
        >
            <search-item :medicament="medicament" @takeItemId="updateItem($event)"></search-item>
        </div>
        </div>
    </div>
</template>

<script>
import SearchItem from './SearchItem'
export default {

    components:{
        SearchItem
    },
    data() {
        return {
            input:"",
            medicaments:[] 
             
        }
    },
    props:['medications'],
    methods: {
        search(){  

                if(this.input.length<=0) {
                    this.medicaments=[]; 
                } 
              
                    this.medicaments = this.medications.filter((element)=>{
                    const lower = element.name.toLowerCase();
                    const lowerDci = element.dci.toLowerCase();
                    return lower.includes(this.input) || lowerDci.includes(this.input)
                 })
               
        },
        updateItem(itemId){    
            this.$emit("receiveItemId",itemId);
            this.input="";
        }
          
    },
    created() {

    },
};
</script>

<style>

</style>
