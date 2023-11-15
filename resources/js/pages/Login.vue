<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

import { Head, Link, useForm } from '@inertiajs/vue3';


const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const submit = () => {
  form.post(route('login'), {});
};
</script>
<template>
  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
      <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

      <form @submit.prevent="submit">
        <div>
          <label class="block font-medium text-sm text-gray-700 mb-2 ml-2">
            <span>email</span>
          </label>

          <input id="email" type="email" class="border-gray-800 rounded-sm shadow-md mt-3 block w-full"
            v-model="form.email" required autofocus />
        </div>

        <div class="mt-4">
          <label class="block font-medium text-sm text-gray-700 b-2 ml-2">
            <span>password</span>
          </label>

          <input id="password" type="password" class="border-gray-800 rounded-sm shadow-md mt-3 block w-full"
            v-model="form.password" required />

        </div>

        <div class="block mt-4">

        </div>

        <div class="flex items-center justify-end mt-4">

          <button
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 ">
            Log in
          </button>

        </div>
      </form>
      <Link :href="route('login')"
        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Already registered?
      </Link>
    </div>
  </div>
</template>