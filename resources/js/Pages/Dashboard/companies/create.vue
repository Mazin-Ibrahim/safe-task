<template>
    <layout>
        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-indigo-500 font-bold">
                    Company /<span class="text-gray-700"> Create</span>
                </h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block">
                                <span class="text-gray-700">Name</span>
                                <input
                                    type="text"
                                    class="form-input border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                                    v-model="form.name"
                                />
                                <span v-if="errors.name">
                                    <p
                                        class="mt-2 text-sm text-green-600 dark:text-green-500"
                                    >
                                        <span class="font-medium"
                                            >Alright!</span
                                        >
                                        {{ errors.name[0] }}
                                    </p>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button primary>Create Company</base-button>
                    </div>
                </form>
            </base-panel>
        </div>
    </layout>
</template>

<script>
import Layout from "../../../Shared/Layout";
import Multiselect from "vue-multiselect";

export default {
    components: { Layout },
    props: ["errors"],
    data() {
        return {
            form: {
                name: ""
            }
        };
    },
    methods: {
        submit() {
            this.$inertia.post("/companies", this.form);
        }
    }
};
</script>
