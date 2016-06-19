<template>
  <header>
    <nav>
      <ul>
        <li><a v-link="{name: 'index'}">Index</a></li>
        <li><a v-link="{name: 'setting'}">Setting</a></li>
        <li><a v-link="{name: 'article'}">article</a></li>
      </ul>
    </nav>
  </header>
</template>

<style>
.v-link-active {
  color: red;
}
</style>
