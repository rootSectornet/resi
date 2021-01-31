<template>
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <ul class="list-group">
            <li class="bg-dark list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>MAIN MENU</small>
            </li>
            <router-link to="/" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-dashboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Dashboard</span>
                </div>
            </router-link>
            <router-link to="/jabatans" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-dashboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Jabatan</span>
                </div>
            </router-link>
        </ul>
        <router-view></router-view>
    </div>
</template>
<script>
    export default {}
</script>
