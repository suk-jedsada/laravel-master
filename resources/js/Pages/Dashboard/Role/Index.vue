<template>
    <Layout>
        <Link :href="route('dashboard.roles.create')" class="btn btn-primary">
    CREATE
</Link>
        <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">

    <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
        <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th class="px-6 py-3">#</th>
            <th class="px-6 py-3">role name</th>
            <th class="px-6 py-3">Action</th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="(role,index) in roles" :key="index"
    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <th class="text-center">{{ role.id }}</th>
    <td class="px-6 py-4">
        <div class="flex items-center gap-2">
    <div class="w-20 h-20 overflow-hidden rounded-full">
        <img :src="role.image">
    </div>
    <p> {{ role.name }}</p>
</div>
    </td>
    <td class="flex gap-2 px-6 py-4">
    <Link :href="route('dashboard.roles.edit',role.id)" class="w-16 btn btn-primary btn-sm">
        EDIT
    </Link>
    <button class="w-16 text-gray-100 uppercase btn btn-error btn-sm" type="button"
        @click="handleDelete(role)">
        DELETE
    </button>
</td>
</tr>
        </tbody>
    </table>
</div>

    </Layout>

</template>
<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {Inertia} from "@inertiajs/inertia";
import {Link, router, useForm} from "@inertiajs/vue3";

export default {
    name: "RoleIndex",
    components: {Layout, Link},
    props: {
        roles:{
            type: Array,
            required: true
        }
    },
    mounted() {
       console.log(this.roles)
    },
    data() {
        return {};
    },
    methods: {
        handleDelete(role) {
    this.$swal.fire({
        title: "คุณต้องการที่จะลบ role " + role.name + '?',
        showDenyButton: true,
        showCancelButton: true,
        showConfirmButton: false,
        denyButtonText: 'ยืนยันการลบ'
    }).then((result) => {
        if (result.isDenied) {
            Inertia.delete(this.route('dashboard.roles.destroy', role.id));
            window.location.reload();
        }
    });
}
    },
    watch: {}
};
</script>
