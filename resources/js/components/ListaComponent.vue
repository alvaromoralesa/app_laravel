<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form-component @new="addTarea"></form-component>
            <tareas-component 
                v-for="(tarea, index) in tareas" 
                :key="tarea.id"
                :tarea="tarea"
                @update="updateTarea(index, ...arguments)"
                @delete="deleteTarea(index)">
            </tareas-component>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                tareas: []
            }
        },

        mounted() {
            axios.get('/tareas').then((response) => {
                this.tareas = response.data;
                
            });
        },
        methods: {
            addTarea(tarea){
                this.tareas.push(tarea);
            },
            updateTarea(index, tarea) {
                
                this.tareas[index] = tarea;
            },
            deleteTarea(index){
                this.tareas.splice(index, 1);
            }
        }
    }
</script>
