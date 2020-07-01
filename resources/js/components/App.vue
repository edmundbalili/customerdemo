<template>
    <div>
        <nav class="navbar navbar-expand-md">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link :to="{ name: 'index' }" class="nav-link">Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{ name: 'list' }" class="nav-link" >Customers</router-link>
                </li>
            </ul>
        </nav>
        <main>
            <router-view></router-view>
        </main>
    </div>
</template>
<script>
    export default {}
</script>
