<template>
    <div class="">
        <div class="form-group row">
            <input type="text" class="form-control w-100 col-lg-4 col-sm-12" placeholder="Search Employee" style="margin-right:-35px">
            <div class="input-group-append">
                <span class="btn btn-primary">
                    <i class="fas fa-search fa-sm"></i>
                </span>
            </div>
        </div>   
        <div class="row mb-2">
            <div class="col-6">
                <p class="h4 font-weight-bold">EMPLOYEES</p>
            </div>
            <div class="col-6 text-right">
                 <button class="btn btn-primary" v-on:click="newModal">Add Employee</button>
            </div>
        </div>
    
        <div style="overflow-x:scroll">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr class="text-uppercase text-center">
                        <th>Id</th>
                        <th>Name</th>
                        <!-- <th>Status</th> -->
                        <th>QR Code</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center text-nowrap">
                    <tr v-for="employee in employees" :key="employee.id">
                        <td v-text="employee.employee_id"></td>
                        <td v-text="employee.name"></td>
                        <!-- <td><span class="badge badge-success">ACTIVE</span></td> -->
                        <td><span class="fas fa-qrcode text-primary" v-on:click="viewQR(employee)"></span></td>
                        <td><span class="fas fa-pen text-primary" v-on:click="editModal(employee)"></span></td>
                        <td><span class="fas fa-trash-alt text-danger" v-on:click="deleteEmployee(employee.id)"></span></td>
                    </tr>
                    <tr v-if="employees.length <= 0">
                        <td colspan="4" class="font-weight-bold h4">NO RECORDS FOUND</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><span v-text="editMode ? 'Edit Employee' : 'Create Employee'"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? updateEmployee() : createEmployee()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="employee_id">Employee Id</label>
                                <input type="text" class="form-control" v-model="form.employee_id" :class="{ 'is-invalid' : form.errors.has('employee_id') }">
                                <has-error :form="form" field="employee_id"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="name" class="form-control" v-model="form.name" :class="{ 'is-invalid' : form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"><span v-text="editMode ? 'Save' : 'Create'"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="QRModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                     <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel"><span v-text="editMode ? 'Edit Shelf' : 'Add New Shelf'"></span> </h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body d-flex justify-content-center align-items-center pb-4 flex-column PrintQRCode">
                        <div>
                            <qr-code :text="employee.qrcode" v-if="employee.qrcode"></qr-code>
                        </div>
                        <div>
                            <p class="h4 mt-2 text-black text-uppercase" v-text="employee.name"></p>
                        </div>
                    <!-- <button v-on:click="Print('.PrintQRCode')" class="btn btn-danger">Print</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                employees: {},
                employee: {},
                editMode: true,
                form: new Form({
                    id: '',
                    employee_id: '',
                    name: ''
                })
            }
        },
        created() {
            this.loadEmployees();

            Fire.$on('CallEmployees', () => {
                this.loadEmployees();
            })
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            loadEmployees: function(){
                axios.get("/api/employee").then(({data}) => (this.employees = data));
            },
            newModal: function(){
                this.editMode = false;
                this.form.reset();
                $('#employeeModal').modal('show')
            },
            editModal: function(employee){
                this.editMode = true;
                this.form.reset();
                $('#employeeModal').modal('show');
                this.form.fill(employee);
            },
            viewQR: function(employee){
                $('#QRModal').modal('show');
                this.employee = employee;
            },
            createEmployee: function() {
                this.form.post('/api/employee')
                .then(() => {
                    Fire.$emit('CallEmployees');
                    $('#employeeModal').modal('hide');

                    Toast.fire({
                        icon: 'success',
                        title: 'Employee Created.'
                    })
                })
                .catch(() => {
                     Toast.fire({
                        icon: 'error',
                        title: 'Employee Creation Failed.'
                    })
                });
            },
            editModal: function(employee){
                this.editMode = true;
                this.form.reset();
                $('#employeeModal').modal('show');
                this.form.fill(employee);
            },
            updateEmployee: function() {
                this.form.put('/api/employee/'+this.form.id)
                .then(()=>{
                    Fire.$emit('CallEmployees');
                    $('#employeeModal').modal('hide');

                    Toast.fire({
                        icon: 'success',
                        title: 'Employee Updated.'
                    })
                })
                .catch(()=>{
                    Toast.fire({
                        icon: 'error',
                        title: 'Employee Update Failed.'
                    })
                });
            },
            deleteEmployee: function(id) {
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
                        this.form.delete('/api/employee/'+id)
                        .then(()=>{
                            Fire.$emit('CallEmployees');
                           Toast.fire({
                                icon: 'success',
                                title: 'Employee Deleted.'
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
