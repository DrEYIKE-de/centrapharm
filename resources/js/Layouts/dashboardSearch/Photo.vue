<template>
  <div
  v-if="!deleteThePhoto"
    @mouseenter="openBouton"
    @mouseleave="openBouton"
    @click="openBouton"
    class="
      p-2
      border border-gray-200
      rounded-xl
      m-2
      flex flex-col
      justify-center
      items-center
      transition
      duration-500
      ease-in
    "
   
  >
    <button
      class="
        inset-x-0
        top-0
        px-4
        py-2
        bg-red-600
        text-white
        border-red-600
        md:bg-white
        my-1
        rounded-full
        shadow-inner
        border
        md:border-gray-200
        md:hover:bg-red-600
        md:hover:text-white
        hover:border
        md:text-black
        md:hover:border-red-600
      "
      :class="{ hidden: hidden }"
      @click="deletePhotoName()"
    >
      X
    </button>
    <img
      :src="file.src"
      id="img"
      class="w-48 h-48 rounded-xl border-green-300 shadow-md"
      :alt="file.name"
    />
  </div>
</template>

<script>
export default {
  data() {
    return {
      hidden: true,
      deleteThePhoto:false
    };
  },
  props: ["file","deleteAll"],
  methods: {
    openBouton() {
      this.hidden = !this.hidden;
    },
    deletePhotoName() {
      const fileName = this.file.name;
      this.$emit("deleteOnePhotoName", fileName);
      this.deleteThePhoto=true
    },
  },
};
</script>

<style scoped>
#img:focus,
#img:hover,
#img:active {
  filter: brightness(70%);
}
</style>