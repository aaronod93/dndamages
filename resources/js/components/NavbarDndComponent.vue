<template>
    <navbar :dark="true">
        <navbar-nav :dark="true">
                <navbar-item :dark="true" href="/home">Home</navbar-item>
                <navbar-item :dark="true" href="#">
                    <dropdown tag="li" class="nav-item">
                        <dropdown-toggle tag="a" slot="toggle" waves-fixed>Dropdown</dropdown-toggle>
                        <dropdown-menu>
                            <dropdown-item></dropdown-item>
                        </dropdown-menu>
                    </dropdown>
                </navbar-item>
        </navbar-nav>
    </navbar>
</template>
<script>
import {Navbar, NavbarNav, NavbarItem, Dropdown, DropdownToggle, DropdownMenu, DropdownItem} from 'mdbvue'

export default {
    name: 'navbar-dnd-component',
    components: {
        Navbar,
        NavbarNav,
        NavbarItem
    },
    data(){
        return {
            
        }
    }
}
</script>
<style>
</style>