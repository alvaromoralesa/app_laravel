<template>
    <div class="card">
        <div class="card-header">Tarea Pendiente publicada en {{tarea.created_at}}  - Última actualización: {{ tarea.updated_at }}</div>
            
            <div class="card-body">
                <input v-if="editMode" type="text" class="form-control" v-model="tarea.description">
                <p v-else>{{tarea.description}}</p>
            </div>

            <div class="card-footer">
                <button v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate()">
                    Guardar Cambios</button>
                <button v-else class="btn btn-warning" v-on:click="onClickEdit()">
                    Editar</button>
                <button class="btn btn-danger" v-on:click="onClickDelete()">
                    Eliminar</button>
            </div>
        </div>
</template> 

<script> 
    export default {
        props:['tarea'],
        data(){
            return {
                editMode: false
            };
        }, 
        mounted() {
            console.log('Componente Tareas Cargado.')
        },
        methods: {
            onClickDelete() {
                axios.delete(`/tareas/${this.tarea.id}`).then(() => {
                    this.$emit('delete');
                });
            },        
            onClickEdit() {
                this.editMode = true;
            },
            onClickUpdate() {
                
                const params = {
                    description : this.tarea.description
                };
                axios.put(`/tareas/${this.tarea.id}`, params).then((response) => {
                    const tarea = response.data;
                    this.$emit('update', tarea);
                    this.editMode = false;
                });
            }
        }    
    }
</script>
