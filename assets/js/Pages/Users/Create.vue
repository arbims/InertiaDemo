<template>
  <Layout>

    <Head title="Create User" />
    <div class="flex justify-between">
      <h1 class="text-3xl font-bold">
        Create Users
      </h1>
    </div>
   
    <form @submit.prevent="submit" method="POST" class="max-w-md mx-auto mt-6">
      {{ page.user }}
      <div class="mb-6">
        <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
          Name
        </label>

        <input v-model="form.name" type="text" name="name" id="name" class="border border-gray-400 p-2 w-full" required>

      </div>
      <div class="mb-6">
        <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
          Email
        </label>

        <input  v-model="form.email"  type="email" name="email" id="email" class="border border-gray-400 p-2 w-full" required>

      </div>
      <div class="mb-6">
        <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
          Password
        </label>

        <input  v-model="form.password"  type="password" name="password" id="password" class="border border-gray-400 p-2 w-full" required>

      </div>
      <div class="mb-6">
        <button type="submit" class="bg-gray-600 text-white py-2 px-4 hover:bg-gray-900 " >
          Submit
        </button>
      </div>

    </form>
  </Layout>
</template>

<script setup>
import {reactive} from "vue";
import { router, usePage } from '@inertiajs/vue3'

  const page = usePage();

  console.log()
  let form = reactive({
    name: '',
    email: '',
    password: ''
  });

  let submit = () => {
    router.post('/users/create', form, {
      headers: {'X-CSRF-Token': page.props._csrfToken }
    });
  }

</script>