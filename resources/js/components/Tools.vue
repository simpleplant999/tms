<template>
    <div class="">
        <div class="form-group row">
            <input type="text" class="form-control w-100 col-lg-4 col-sm-12" placeholder="Search Tool" style="margin-right:-35px">
            <div class="input-group-append">
                <span class="btn btn-primary">
                    <i class="fas fa-search fa-sm"></i>
                </span>
            </div>
        </div>   
        <div class="row mb-2">
            <div class="col-6">
                <p class="h4 font-weight-bold">TOOLS</p>
            </div>
            <div class="col-6 text-right">
                 <button class="btn btn-primary" v-on:click="newModal">Add Tool</button>
            </div>
        </div>
        <div style="overflow-x:scroll">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr class="text-uppercase text-center ">
                        <th>Name</th>
                        <th>Desc</th>
                        <th>Size</th>
                        <th>Status</th>
                        <th>Qty</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center text-nowrap">
                    <tr v-for="tool in tools" :key="tool.id">
                        <td v-text="tool.name"></td>
                        <td v-text="tool.description"></td>
                        <td v-text="tool.size"></td>
                        <td>
                            <span class="badge badge-success text-uppercase" v-if="tool.status == 'Good Condition'" v-text="tool.status"></span>
                            <span class="badge badge-danger text-uppercase" v-else v-text="tool.status"></span>
                        </td>
                        <td v-text="tool.quantity"></td>
                        <td><span class="fas fa-pen text-primary" v-on:click="editModal(tool)"></span></td>
                        <td><span class="fas fa-trash-alt text-danger" v-on:click="deleteTool(tool.id)"></span></td>
                        <!-- <td><span class="fas fa-plus text-danger"></span></td> -->
                    </tr>
                    <tr v-if="tools.length <= 0">
                        <td colspan="6" class="font-weight-bold h4">NO RECORDS FOUND</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="toolModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Tool</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? updateTool() : createTool()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Tool Name</label>
                                <input type="text" class="form-control" v-model="form.name" :class="{ 'is-invalid' : form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="name">Description</label>
                                <input type="description" class="form-control" v-model="form.description" :class="{ 'is-invalid' : form.errors.has('description') }">
                                <has-error :form="form" field="description"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="size">Size</label>
                                <input type="text" class="form-control" v-model="form.size" :class="{ 'is-invalid' : form.errors.has('size') }">
                                <has-error :form="form" field="size"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="custom-select" name="status" id="" v-model="form.status" :class="{ 'is-invalid' : form.errors.has('status') }">
                                    <option value="Good Condition">Good Condition</option>
                                    <option value="Damaged">Damaged</option>
                                </select>
                                <has-error :form="form" field="status"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" v-model="form.quantity" :class="{ 'is-invalid' : form.errors.has('quantity') }">
                                <has-error :form="form" field="quantity"></has-error>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"><span v-text="editMode ? 'Edit Tool' : 'Create Tool'"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tools: {},
                editMode: true,
                form: new Form({
                    id: '',
                    name: '',
                    description: '',
                    size: '',
                    status: '',
                    quantity: ''
                })
            }
        },
        created() {
            this.loadTools();

            Fire.$on('CallTools', () => {
                this.loadTools();
            })
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            loadTools: function(){
                axios.get("/api/tool").then(({data}) => (this.tools = data));
            },
            newModal: function(){
                this.editMode = false;
                this.form.reset();
                $('#toolModal').modal('show')
            },
            editModal: function(tool){
                this.editMode = true;
                this.form.reset();
                $('#toolModal').modal('show');
                this.form.fill(tool);
            },
            updateTool: function() {
                this.form.put('/api/tool/'+this.form.id)
                .then(()=>{
                    Fire.$emit('CallTools');
                    $('#toolModal').modal('hide');

                    Toast.fire({
                        icon: 'success',
                        title: 'Shelf Updated.'
                    })
                })
                .catch(()=>{
                    Toast.fire({
                        icon: 'error',
                        title: 'Shelf Update Failed.'
                    })
                });
            },
            createTool: function() {
                this.form.post('/api/tool')
                .then(() => {
                    Fire.$emit('CallTools');
                    $('#toolModal').modal('hide');

                    Toast.fire({
                        icon: 'success',
                        title: 'Shelf Created.'
                    })
                })
                .catch(() => {
                     Toast.fire({
                        icon: 'error',
                        title: 'Shelf Creation Failed.'
                    })
                });
            },
            deleteTool: function(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e74a3b',
                    cancelButtonColor: '#858796',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.form.delete('/api/tool/'+id)
                        .then(()=>{
                            Fire.$emit('CallTools');
                           Toast.fire({
                                icon: 'success',
                                title: 'Shelf Deleted.'
                            })
                        })
                        .catch(()=>{})
                        ;
                    }
                })    
            }
        }
    }
</script>
