<template>
    <app-layout title="Agregar institucion">
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
          {{ titulo }}
        </h2>
      </template>
      <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 text-left text-2xl justify-center flex">
        <div class="w-2/3 overflow-x-auto relative sm:rounded-xl mt-10 bg-gray-50 shadow-2xl p-8 dark:bg-slate-800">
            <form class="" @submit.prevent="guardar">
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nombre de la Institucion
                    </label>
                    <jet-input id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model="form.name" :class="{ 'is-invalid': form.errors.name }" required
                       aria-placeholder=""/>

                    <jet-input-error :message="form.errors.name" />
                </div>
                <div class="mb-6">
                    <label for="description"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                    <jet-input id="descripcion"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model="form.description" :class="{ 'is-invalid': form.errors.description}" required
                        />
                    <jet-input-error :message="form.errors.description" />
                </div>

                <Link :href="route(`${routeName}index`)"
                    class="underline text-lg text-gray-600 hover:text-gray-900 mr-10">
                Cancelar
                </Link>

                <jet-button @click="guardar"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    :class="{ 'text-white': form.processing }" :disabled="form.processing">
                    <span class="animate-spin mr-1" v-show="form.processing">&#9696;</span> Guardar
                </jet-button>
            </form>
          </div>
        </div>
    </app-layout>
  </template>
  
<script>
    import AppLayout from "@/Layouts/AppLayout.vue";
    import { Link } from "@inertiajs/vue3";
    import JetInput from "@/Components/Input.vue";
    import JetButton from "@/Components/PrimaryButton.vue";
    import JetInputError from "@/Components/InputError.vue";
    import { useForm } from "@inertiajs/vue3";
    import JetLabel from "@/Components/Label.vue";


    export default {
        props: {
            titulo: { 
                type: String, 
                required: true 
            },
            routeName: { 
                type: String, 
                required: true 
            },
        },
        components: {
            AppLayout,
            Link,
            JetLabel,
            JetInput,
            JetInputError,
            JetButton,
        },
        setup(props) {
            const form = useForm({ 
                name: "", 
                description: "" 
            });
            
            const guardar = () => {
                form.post(route("institution.store"));
            };

            return { form, guardar };
        },
    };
</script>
