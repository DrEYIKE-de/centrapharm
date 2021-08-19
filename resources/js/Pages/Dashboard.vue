<template>
    <app-layout>
        <div class="bg-gray-100 flex flex-col justify-around p-3 md:flex-row">
            <!-- ********************  Premiere Partie: Medecins  *******************

            
             discuter avec un medecin -->
<!-- 
           <div class="p-2 w-full h-1/4 md:flex md:flex-col md:w-1/4">
                <div class="flex flex-col justify-center mb-1">
                    <div
                        class="bg-green-600 text-white flex flex-wrap md:justify-around items-center rounded-lg px-4 py-2 mb-3 shadow-lg"
                    >
                        <div class="md:flex justify-around items-center">
                            <input
                                type="radio"
                                name="profession"
                                id=""
                                class="appearance-none checked:bg-green-900 checked:border-transparent"
                                checked
                            />
                            <label class="px-2 font-bold" for="">Medecins</label>
                        </div>
                       
                    </div>
                </div>

                <div
                    class="md:h-1/5 flex flex-col justify-center mx-auto w-full box-border bg-green-400 px-3 py-2 rounded-lg mb-5 shadow-lg"
                >
                    <form class="">
                        <div class="m-3">
                            <label
                                for="searchDoctor"
                                class="text-white uppercase text-center"
                                >Discuter avec un medecin</label
                            >
                        </div>
                        <div class="">
                            <input
                                type="search"
                                class="bg-white text-gray-300 border-0 mb-3 focus:ring-4 focus:ring-green-600 rounded-2xl w-full"
                                placeholder="Rechercher par nom"
                                id="searchDoctor"
                            />
                        </div>

                        <div class="flex justify-around">
                            <div class="flex justify-around items-center">
                                <input
                                    type="checkbox"
                                    class="appearance-none checked:bg-green-600 checked:border-transparent rounded-md"
                                />
                                <p class="mx-2 text-sm uppercase text-gray-100">
                                    specialiste
                                </p>
                            </div>
                            <div class="rounded-lg">
                                <select name="" id="">
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>

                 Listes des medecins 
                <ul
                    class="flex flex-row flex-nowrap md:flex md:flex-col overflow-x-auto md:overflow-auto md:mb-4"
                >
                    <li class="md:my-2" v-for="user in users" :key="user.id">
                        <partenaire-card
                            :userName="user.name"
                            :photo="user.profile_photo_url"
                        />
                    </li>
                </ul>
            </div>  -->

            <!-- ********************  Deuxieme Partie:  PUBLICATIONS  ******************* -->

            <!-- ******* -- Choix medicament/conseil---  *********** -->

            <div
                class="w-full md:w-3/5 md:h-full md:mt-2 overflow-hidden flex flex-col justify-center"
            >
                <div
                    class="bg-green-600 text-white flex md:justify-center items-center rounded-lg px-4 py-2 mb-3 shadow-lg"
                >
                    <div class="md:flex justify-center items-center">
                        <input
                            type="radio"
                            name="requete"
                            id=""
                            class="appearance-none checked:bg-green-900 checked:border-transparent"
                            checked
                        />
                        <label class="px-2 font-bold" for=""
                            >Demarrer une Recherche Medicament</label
                        >
                    </div>
                    <!-- <div class="flex flex-col justify-center">
                  
                         <div class="flex justify-around items-center">
                            <input
                                type="radio"
                                name="requete"
                                id=""
                                class="appearance-none checked:bg-green-900 checked:border-transparent"
                            />
                            <label class="px-2 font-bold" for=""
                                > Demander conseil à votre pharmacien</label
                            >
                        </div> -->
                </div>

                <!-- ******* -- Zone de Recherche ---  *********** -->

                <div class="md:px-6">
                    <div class="rounded-lg bg-white relative items-start">
                        <div class="p-2 relative">
                            <search
                                :medications="medications"
                                @receiveItemId="readItem($event)"
                            />
                            <div
                                v-if="medicamentSearchList.length > 0"
                                class="flex justify-between px-4 text-gray-600 bg-gray-100 font-bold rounded-lg"
                            >
                                <p>Vos medicaments</p>
                                <p>Quantités</p>
                            </div>
                            <div
                                v-for="medicament in medicamentSearchList"
                                :key="medicament.id"
                                class=""
                            >
                                <medicaments
                                    :medicament="medicament"
                                    @deleteId="deleteMedicament($event)"
                                />
                            </div>
                            <photos
                                @takePhotosFiles="receivePhotos($event)"
                                :deleteAll="deleteAll"
                                @ChangeDeleteAll="NewDeleteAll($event)"
                            />
                        </div>

                        <div
                            v-if="
                                medicamentSearchList.length >= 1 ||
                                images.length >= 1
                            "
                            class="flex p-3 my-2"
                        >
                            <button
                                @click="postForm"
                                class="px-6 py-3 bg-gradient-to-r from-green-400 to-blue-500 font-bold rounded-2xl text-white hover:rounded-full"
                            >
                                Publier
                            </button>
                            <!-- <button
                class="
                  px-6
                  py-1
                  bg-gradient-to-r
                  from-purple-400
                  via-pink-500
                  to-red-500
                  font-bold
                  rounded-2xl
                  text-white
                "
              >
                Urgence
              </button> -->
                        </div>
                        <button
                            class="px-3 py-2 text-blue-600 w-full bg-blue-200"
                            v-if="!submitted"
                        >
                            Post publié avec succès
                        </button>
                    </div>
                </div>

                <!-- ******* -- Card des publications ---  *********** -->

                <div 
                v-for="posts in postsAll" :key="posts.id"
                class="rounded-lg my-1 md:px-6 cursor-pointer" >
                <div class="">
                    <div class="m-2 flex flex-col bg-white px-3 py-2 rounded-lg">
                    <div class="flex border-b">
                        <div class="flex justify-center items-center">
                        <div class="flex items-center">
                            <img :src="link" alt="" class="rounded-full w-10 h-10 bg-gray-300" />
                        </div>
                        <div class="ml-1 p-0">
                            <p class="mb-1 font-mono text-gray-600">Un patient</p>
                            <p class="text-sm font-mono">1h</p>
                        </div>
                        </div>
                    </div>
                    <p class="text-gray-40 font-bold">recherche:</p>
                   <card :posts="posts" /> 
                    <div class="mt-3 px-2 py-2 border-t border-gray-200">
                            <p class="text-gray-40 font-bold">La pharmacie qui a vos produits: </p>
                            <button class="px-6 py-2 bg-green-600 font-bold shadow-md text-center text-white rounded-full">
                                +
                            </button>
                        </div>
                    </div>
                       
                    </div>
                </div>
            </div>
            <!-- ********************  Troisieme Partie: Notifications  ******************* -->

            <div
                class="invisible md:visible w-full md:w-1/4 md:h-full mt-2 px-3"
            >
                <div class="h-1/2">
                    <div class="bg-white px-3 py-3 rounded-lg shadow-md mb-4">
                        <h3
                            class="text-sm text-gray-400 font-mono pb-1 border-b border-gray-200"
                        >
                            <span class="text-green-600 mx-2">
                                <i
                                    class="fa fa-flag-checkered"
                                    aria-hidden="true"
                                >
                                </i
                            ></span>
                            Campagne sponsorisée
                        </h3>

                        <div class="flex mt-3">
                            <div class="flex justify-center items-center">
                                <div class="flex items-center">
                                    <img
                                        :src="user"
                                        alt=""
                                        class="rounded-full w-10 h-10 bg-gray-300"
                                    />
                                </div>
                                <div class="ml-1 p-0">
                                    <p
                                        class="mb-1 text-sm font-mono text-gray-600"
                                    >
                                        Hopital regional d'Edea
                                    </p>
                                    <p class="text-sm font-mono">1h</p>
                                </div>
                            </div>
                        </div>

                        <p class="text-sm font-thin mt-3">
                            Lance une vaste campagne de consultation des yeux,
                            gratuite pour les enfants de 0-5 ans, payant pour
                            les adultes
                        </p>
                        <button
                            class="text-center mt-2 px-4 rounded-lg py-1 bg-red-600 border border-red-600 hover:bg-red-800 text-white"
                        >
                            En savoir plus
                        </button>
                    </div>

                    <div class="bg-white px-3 py-3 rounded-lg shadow-md mb-4">
                        <h3
                            class="text-sm text-gray-400 font-mono pb-1 border-b border-gray-200"
                        >
                            <span class="text-green-600 mx-2">
                                <i
                                    class="fa fa-flag-checkered"
                                    aria-hidden="true"
                                >
                                </i
                            ></span>
                            Campagne sponsorisée
                        </h3>

                        <div class="flex mt-3">
                            <div class="flex justify-center items-center">
                                <div class="flex">
                                    <img
                                        :src="user"
                                        alt=""
                                        class="rounded-full w-10 h-10 bg-gray-300"
                                    />
                                </div>
                                <div class="ml-1 p-0">
                                    <p
                                        class="mb-1 text-sm font-mono text-gray-600"
                                    >
                                        Hopital regional de bertoua
                                    </p>
                                    <p class="text-sm font-mono">1h</p>
                                </div>
                            </div>
                        </div>

                        <p class="text-sm font-thin mt-3">
                            Lance une vaste campagne de chirurgie orthopedique,
                            consultation gratuite
                        </p>
                        <button
                            class="text-center mt-2 px-4 rounded-lg py-1 bg-red-600 border border-red-600 hover:bg-red-800 text-white"
                        >
                            En savoir plus
                        </button>
                    </div>
                </div>
                <div class="h-1/2">
                    <div class="">
                        <button
                            class="px-3 py-2 text-red-600 w-full bg-red-200"
                        >
                            Lancer une campagne
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Search from "@/Layouts/dashboardSearch/Search";
import Medicaments from "@/Layouts/dashboardSearch/Medicaments";
import Photos from "@/Layouts/dashboardSearch/Photos";
import Card from "../Layouts/dashboardPosts/Card.vue";
export default {
    components: {
        AppLayout,
        Search,
        Medicaments,
        Photos,
        Card,
    },
    data() {
        return {
            medicamentSearchList: [],
            item: {},
            deleteId: 0,
            images: [],
            submitted: true,
            deleteAll: false,
            postsAll: [],
            thelink:""
        };
    },
    props: ["medications", "posts","link"],

    created() {
        // ******* Created for search ******* \\

        // ******* Created for Posts ******* \\
        this.posts.forEach((element) => {
            const post = {
                "created at": element.created_at,
                id: element.id,
                medicaments: element.medicaments.split(","),
                images: element.images.split(","),
                Pharmacy_id: element.pharmacy_id,
            };
          this.postsAll.push(post)
        });
    },
    methods: {
        // ******* Methods for Posts ******* \\

        // ******* Search Bar Component ***** \\

        // ****** Methodes Search List (liste des medicaments Chercher par l'utilisateur )

        // **** Fonction de recherche sil ya la presence dun meme medicament dans la liste puis son changement
        checkMedicamentPresence(medicament, searchId) {
            if (medicament.length >= 1) {
                let searchMedicament = medicament.filter(
                    (element) => element.id == searchId
                );
                console.log(searchMedicament);

                if (searchMedicament.length >= 1) {
                    const findMedicament = medicament.findIndex(
                        (element) => element.id == searchMedicament[0].id
                    );
                    this.medicamentSearchList.splice(findMedicament, 1);
                }
            }
        },

        // **** Fonction d'ajout des medicaments dans la liste

        readItem(item) {
            this.item = item;
            const medicaname = this.medications.filter(
                (element) => element.id == this.item.medicamentId
            );
            const newDrug = {
                id: medicaname[0].id,
                name: medicaname[0].name,
                quantity: item.quantity,
            };
            this.checkMedicamentPresence(this.medicamentSearchList, newDrug.id);
            this.medicamentSearchList.push(newDrug);
        },

        // **** Fonction de suppression des medicaments de la liste

        deleteMedicament(deleteId) {
            this.deleteId = deleteId;
            let deleteDrug = this.medicamentSearchList.findIndex(
                (element) => element.id === this.deleteId
            );
            this.medicamentSearchList.splice(deleteDrug, 1);
        },

        // **** Fonction de reception  et de suppression des images d'un produit ou d'une photo d'ordonance

        receivePhotos(images) {
            this.images = images;
        },
        NewDeleteAll(deleteDiv) {
            this.deleteAll = !deleteDiv;
        },

        // **** Fonction de reception des images d'un produit ou photo d'ordonance

        postForm() {
            const form = {
                medicaments: this.medicamentSearchList,
                images: this.images,
            };
            this.$inertia.post("/dashboard", form);
            this.submitted = false;
            this.medicamentSearchList = [];
            this.images = [];
                    setTimeout(() => {
                        setTimeout(() => { 
                            this.$inertia.get("/dashboard")     
                            return (this.submitted = true);
                        }, 5000);
                    }, 4000);      
            this.deleteAll = true;
            
               
        },
    },
};
</script>
