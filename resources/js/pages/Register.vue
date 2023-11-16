<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
  username: '',
  email: '',
  password: '',
  password_confirmation: '',
});

const submit = async () => {
  try {
    await axios.post('/api/register', {
      email: form.email,
      username: form.username,
      password: form.password,
      password_confirmation: form.password_confirmation
    });
    form.get(route('login'))
  } catch (error) {
    console.error('Error during login:', error);
  }
};

</script>

<template>
  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
      <Link href="/">
      <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
      </Link>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

      <Head title="Register" />

      <form @submit.prevent="submit">
        <div>
          <label class="block font-medium text-sm text-gray-700 mb-2 ml-2">
            <span>username</span>
          </label>

          <input id="username" type="text" class="border-gray-800 rounded-sm shadow-md mt-3 block w-full"
            v-model="form.username" required autofocus />

        </div>

        <div class="mt-4">
          <label class="block font-medium text-sm text-gray-700 mb-2 ml-2">
            <span>email</span>
          </label>

          <input id="email" type="email" class="border-gray-800 rounded-sm shadow-md mt-3 block w-full"
            v-model="form.email" required autofocus />

        </div>

        <div class="mt-4">
          <label class="block font-medium text-sm text-gray-700 mb-2 ml-2">
            <span>password</span>
          </label>

          <input id="password" type="password" class="border-gray-800 rounded-sm shadow-md mt-3 block w-full"
            v-model="form.password" required autofocus />

        </div>

        <div class="mt-4">
          <label class="block font-medium text-sm text-gray-700 mb-2 ml-2">
            <span>password confirmation</span>
          </label>

          <input id="password_confirmation" type="password" class="border-gray-800 rounded-sm shadow-md mt-3 block w-full"
            v-model="form.password_confirmation" required autofocus />



        </div>

        <div class="flex items-center justify-between mt-4">
          <Link :href="route('login')"
            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Already registered?
          </Link>

          <button
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 ">
            Register
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
