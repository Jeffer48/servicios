<nav class="navbar" style="background-color: #6A0F49; height: 100%;">
    <div class="nav_container">
        <div style="align-self: center;">
            <h2 style="color: white; opacity: 0.75;">Sistema de registro</h2>
        </div>
        <div style="align-self: center;">
            <button id="btn-show-modal" onclick="modalServicios()" class="btn-no-style">
                <svg style="margin: 0 0.5rem;" xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-broadcast" viewBox="0 0 16 16">
                    <path d="M3.05 3.05a7 7 0 0 0 0 9.9.5.5 0 0 1-.707.707 8 8 0 0 1 0-11.314.5.5 0 0 1 .707.707m2.122 2.122a4 4 0 0 0 0 5.656.5.5 0 1 1-.708.708 5 5 0 0 1 0-7.072.5.5 0 0 1 .708.708m5.656-.708a.5.5 0 0 1 .708 0 5 5 0 0 1 0 7.072.5.5 0 1 1-.708-.708 4 4 0 0 0 0-5.656.5.5 0 0 1 0-.708m2.122-2.12a.5.5 0 0 1 .707 0 8 8 0 0 1 0 11.313.5.5 0 0 1-.707-.707 7 7 0 0 0 0-9.9.5.5 0 0 1 0-.707zM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0" style="fill: white; fill-opacity: 0.77;"/>
                </svg>
            </button>
            <button class="btn-no-style" id="btn-user-modal">
                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" fill="white" fill-opacity="0.77"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" fill="white" fill-opacity="0.77"/>
                </svg>
            </button>
        </div>
    </div>
</nav>

<div id="target-user" class="card user-card" style="display: none;">
    <div class="card-body">
        <h5 class="card-title" id="user-target-rol"></h5>
        <hr class="solid">
        <div style="text-align: center;">
            <h6 id="user-target-username"></h6>
            <button class="div-btn-user-target btn-no-style" id="btn-edit-userTarget">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                </svg><label>Editar Usuario</label>
            </button>
            <button class="div-btn-user-target btn-no-style" id="btn-logout-userTarget">
                <svg width="20" height="20" viewBox="0 0 60 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M45 10.5469L40.77 14.2646L48.51 21.0938H18V26.3672H48.51L40.77 33.1699L45 36.9141L60 23.7305L45 10.5469ZM6 5.27344H30V0H6C2.7 0 0 2.37305 0 5.27344V42.1875C0 45.0879 2.7 47.4609 6 47.4609H30V42.1875H6V5.27344Z" fill="black" fill-opacity="0.77"/>
                </svg><label>Cerrar Sesión</label>
            </button>
        </div>
    </div>
</div>

@include('scripts.scripts-navbar')