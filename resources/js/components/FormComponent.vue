<template>
    <div class="card">
        <div class="card-header">Añadir Tareas</div>
            <div class="card-body">
                <form action="" v-on:submit.prevent="newTarea()">
                    <div class="form-group">
                        <label for="tarea">Tarea Nueva: </label>
                        <input type="text" class="form-control" name="tarea" v-model="description">
                    </div>
                    <button type="submit" class="btn btn-primary">Añadir</button>
                </form>  
            </div>
        </div>
</template>

<script>
    export default {
        data(){
            return{
                description: ''
            }
        },
        mounted() {
            console.log('Componente Form Cargado.')
        },
        methods: {
            newTarea() {
                const params = {
                    description: this.description
                };
                
                axios.post('/tareas', params)
                    .then((response) => {
                        const tarea = response.data;
                        this.$emit('new', tarea);
                        
                    });

            }
        }
    }
</script>
