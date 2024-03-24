<template>
    <Layout>
        <form @submit.prevent="submit()">
            <div class="w-80">
                <label class="w-full form-control">
                    <div class="label">
                        <span class="label-text">Role Name</span>
                    </div>
                    <input v-model="form.name" class="w-full input input-bordered"
                           placeholder="Type here"
                           type="text"/>
                </label>
                <div class="flex justify-end">
                    <button class="mt-2 uppercase btn btn-primary btn-sm" type="submit">Submit</button>
                </div>
            </div>
        </form>

    </Layout>

</template>
<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    name: "RoleEdit",
    components: {Layout},
    props: {
        role: {
            type: Object,
            required: true
        }
    },
    mounted() {

    },
    data() {
        return {
            form: useForm({
                name: null
            }),
        };
    },
    methods: {
        submit() {
            const url = this.route('dashboard.roles.update', this.role.id);
            this.form.patch(url);
        }
    }
};
</script>
