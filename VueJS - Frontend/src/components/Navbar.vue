<template>
    <nav class="navbar navbar-expand-lg navbar-light navbar-ligh px-2" style="background-color: #e3f2fd;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">

                    <router-link to="/" class="nav-link">
                        <span :class="'clients' == menu ? 'fw-bold' : ''">Clients</span>
                    </router-link>
                </li>
                    <router-link to="/credit" class="nav-link">
                        <span :class="'credit' == menu ? 'fw-bold' : ''">New Credit</span>
                    </router-link>
                <li class="nav-item">
                    <router-link to="/payment" class="nav-link">
                        <span :class="'payment' == menu ? 'fw-bold' : ''">New Payment</span>
                    </router-link>

                </li>
            </ul>
        </div>
</nav>
</template>

<script>


export default {
  name: "Navbar",
  props: ["menu"],
 };
</script>