<template>
    <layout>
        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-indigo-500 font-bold">
                    Users /<span class="text-gray-700"> Create</span>
                </h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input
                                label="Name"
                                name="name"
                                v-model="form.name"
                                :error="$page.errors.name"
                                required
                            ></base-input>
                        </div>
                        <div>
                            <base-input
                                type="email"
                                label="Email address"
                                name="email"
                                v-model="form.email"
                                :error="$page.errors.email"
                                required
                            ></base-input>
                        </div>
                        <div>
                            <base-input
                                label="Password"
                                type="password"
                                v-model="form.password"
                                :error="$page.errors.password"
                                required
                            ></base-input>
                        </div>
                        <base-input
                            label="Password confirmation"
                            type="password"
                            v-model="form.password_confirmation"
                            required
                        ></base-input>
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button primary>Create user</base-button>
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
    data() {
        return {
            form: {
                name: "",
                email: "",
                password: "",
                password_confirmation: ""
            }
        };
    },
    methods: {
        submit() {
            this.$inertia.post("/users", this.form);
        }
    }
};
</script>
