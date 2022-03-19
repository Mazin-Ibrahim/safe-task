<template>
    <layout>
        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-indigo-500 font-bold">
                    Category /<span class="text-gray-700"> Create</span>
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
                        <div>
                            <label class="block">
                                <span class="text-gray-700"
                                    >Parent Category</span
                                >
                                <select
                                    v-model="form.parent_id"
                                    id=""
                                    class="form-input border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                                >
                                    <option value="">------------</option>
                                    <option
                                        v-for="category in categories"
                                        :value="category.id"
                                        :key="category.id"
                                        >{{ category.name }}</option
                                    >
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button primary>Create Category</base-button>
                    </div>
                </form>
            </base-panel>
        </div>
    </layout>
</template>

<script>
import Layout from "../../../Shared/Layout";

export default {
    components: { Layout },
    props: ["categories", "errors"],
    data() {
        return {
            form: {
                name: "",
                parent_id: ""
            }
        };
    },
    methods: {
        submit() {
            this.$inertia.post("/categories", this.form);
        }
    }
};
</script>
