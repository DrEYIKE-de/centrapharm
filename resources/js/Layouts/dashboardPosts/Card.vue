<template>
  <div class="">
      <ul 
      v-for="item in medicaments" :key="item.id"
      class=" grid grid-cols-1 items-center px-2 py-2">
        <li 
    
        class="bg-indigo-50 my-2 mx-3 rounded-lg px-2 text-indigo-600">
         <span class="rounded-full bg-indigo-800 text-white m-2 px-3 py-2"> {{ item.quantity }} </span>     {{ item.medicament }}   
        </li>
      </ul>
  <div class="flex flex-col justify-center items-center">
    <div 
    v-if="photos.length>=1 "
    class="grid grid-cols-1 gap-2 md:grid md:grid-cols-3 md:gap-2 auto-cols-auto  ">
                <img
                 v-for="photo in photos" :key="photo.id"
            :src="'images/'+photo"  
            id="img"
            class="w-64 h-64 col-span-2 md:col-span-1 rounded-xl border-green-300 shadow-md "
            />
     </div> 
  </div>
   </div> 
</template>

<script>
export default {
  data() {
    return {
      medicaments: [],
      photos:[]
    };
  },
  props: ["posts"],
  created() {
    // Recuperation des medicaments recherchés dans la base de donnees et affichage

this.photos=this.posts.images
let post= this.posts.medicaments
    if (this.photos[0] == "No images") 
    {
        console.log(this.photos)
        this.photos = this.photos.slice(0, 1).join(),
        this.photos = [];
        console.log(this.photos)
    } 
     

if (post[0] == "no drugs") {
        post = post.slice(0, 1).join(),
        this.medicaments = null;
      } 
      else {
        const newArrayp = [];
        let a = 0;
        for (let index = 0; index < post.length / 2; index++) {
          let element;
          element = [post[a], post[a + 1]];
          a += 2;
            let medecine= {
                medicament:element[0],
                quantity:element[1]
            }
            newArrayp.push(medecine)
        } 
          this.medicaments=newArrayp
      }
  },
  updated() {
      this.photos=this.posts.images
let post= this.posts.medicaments
    if (this.photos[0] == "No images") 
    {
        this.photos = this.photos.slice(0, 1).join(),
        this.photos = [];
    } 
     

if (post[0] == "no drugs") {
        post = post.slice(0, 1).join(),
        this.medicaments = null;
      } 
      else {
        const newArrayp = [];
        let a = 0;
        for (let index = 0; index < post.length / 2; index++) {
          let element;
          element = [post[a], post[a + 1]];
          a += 2;
            let medecine= {
                medicament:element[0],
                quantity:element[1]
            }
            newArrayp.push(medecine)
        } 
          this.medicaments=newArrayp
      }
  },
};
</script>

<style>
</style>

