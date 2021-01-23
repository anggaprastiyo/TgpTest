<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link" style="border-color:#C1C7D0">
            <span class="brand-text"><b>TGP</b> Dashboard</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul
                    class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false"
                >
                    <li class="nav-item">
                        <router-link :to="{ name: 'Booking' }" class="nav-link">
                            <i class="nav-icon fas fa-calendar"></i>
                            Booking</router-link
                        >
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
</template>

