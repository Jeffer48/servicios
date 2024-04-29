<script>
    function updateFilters(){
        let datos = {
            id_tipo: document.getElementById("id_rol").value,
            id_estado: document.getElementById("id_estado").value
        }
        
        drawDataTable("{{route('get-usuarios')}}",datos);
    }

    function newUser(){
        
    }
</script>