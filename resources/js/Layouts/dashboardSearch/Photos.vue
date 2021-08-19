<template>
  <div class="">
    <div class="p-2 mb-2 mr-2 md:mr-0">
      <label
        @click="openPhotos"
        class="
          bg-green-600
          px-6
          py-2
          font-bold
          rounded-md
          text-white
          hover:bg-green-600
          focus:bg-green-800
          cursor-pointer
        "
      >
        <i class="fas fa-camera"></i>
        <input
          type="file"
          class="hidden"
          @change="openFileChanged"
          multiple
          accept="image/*"
        />
      </label>
    </div>
    <div v-if="!deleteAll" class=" md:flex md:flex-wrap ">
      <div v-for="file in files" :key="file.id">
        <photo 
          :file="file"
          @deleteOnePhotoName="updateFileName($event)"
          :deleteAll="deleteAll"
        />
      </div>
    </div>
    <div
      class="
        text-red-600
        rounded-lg
        bg-red-200
        flex
        justify-between
        mx-2
        px-3
        py-2
      "
      v-if="bools.length >= 1"
    >
      <p v-for="bool in bools" :key="bool.id">
        {{ bool }}
      </p>
      <button @click="deleteDiv" class="text-red-800">
        <i class="far fa-times-circle"></i>
      </button>
    </div>
  </div>
</template>

<script>
import Photo from "./Photo.vue";
export default {
  components: { Photo },
  props: ["deleteAll"],
  data() {
    return {
      files: [],
      bools: [],
      list: "hidden",
      allFiles: [],
      photoNameForDelete: "",
    };
  },

  methods: {
    //Eliminer la div d'erreur lies soit a la non image du fichier telecharge soit a la taille volumineuse du fichier

    deleteDiv(e) {
      let element = e.target;
      element.parentElement.parentElement.style.display = "none";
    },

  //Mise a jour de AllFiles car une des photos du module photo.vue a ete supprime

    updateFileName(photoName) {
      this.photoNameForDelete = photoName;

      if (this.allFiles.length >= 1) {
        let deleteId = this.allFiles.findIndex((element) => {
          return element.name.match(this.photoNameForDelete);
        });
        this.allFiles.splice(deleteId, 1);
      }
    },


    openFileChanged(event) {

      //Apparition et disparition des photos entre le dashboard et son module photos.vue

      if(this.deleteAll)
      {
        this.$emit("ChangeDeleteAll",this.deleteAll)
      }

//Affichage des photos via preview Url et Erreur si cest pas une image

//creation de file pour le module Item Photo.vue et allFiles pour la base de donnes 

      let files = event.target.files;
      var imageType = /^image\//;
      if (files.length >= 1) {
        this.list = "";
        for (var i = 0; i < files.length; i++) {
          var file = files[i];

          if (imageType.test(file.type)) {
            if (file.size < 2000000) {
              this.allFiles.push(file);
              const obj = {
                name: file.name,
                src: URL.createObjectURL(file),
              };
              this.files.push(obj);
            } else {
              this.bools.push(
                `Attention, votre image ${file.name} est trop grande, max 2Mo par image `
              );
            }
          } else {
            this.bools.push(`l'objet ${file.name} n'est pas une image valide`);
          }
        }

        this.$emit("takePhotosFiles", this.allFiles);
      }
    },
  },
};
</script>

<style></style>
