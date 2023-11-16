<script setup>
import { ref, onMounted } from 'vue';

const users = ref([]);

onMounted(() => {
  // Access the users data from the page object
  users.value = $page.props.users;
});
</script>
<template>
  <nav className=" p-5 flex justify-between drop-shadow-lg bg-slate-50 fixed top-0 w-full">
    <h1 className="nav_logo text-xl">mechat</h1>
    <div>
      <ul className="hidden items-center gap-4 md:flex">
        <li className="cursor-pointer">Home</li>
        <li>people</li>
        <li>chat</li>
      </ul>

    </div>
    <ul>
      <li v-for="user in users" :key="user.id">
        {{ user.name }}
      </li>
    </ul>
  </nav>
</template>