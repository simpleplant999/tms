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
                 <button class="btn btn-primary">Add Employee</button>
            </div>
        </div>
    
        <div style="overflow-x:scroll">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr class="text-uppercase text-center">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>QR Code</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center text-nowrap">
                    <tr>
                        <td>20200835</td>
                        <td>John Doe</td>
                        <td><span class="badge badge-success">ACTIVE</span></td>
                        <td><span class="fas fa-qrcode text-primary"></span></td>
                        <td><span class="fas fa-pen text-primary"></span></td>
                        <td><span class="fas fa-trash-alt text-danger"></span></td>
                        <td><span class="fas fa-plus text-danger"></span></td>
                    </tr>
                    <tr>
                        <td>20200835</td>
                        <td>John Doe</td>
                        <td><span class="badge badge-danger">INACTIVE</span></td>
                        <td><span class="fas fa-qrcode text-primary"></span></td>
                        <td><span class="fas fa-pen text-primary"></span></td>
                        <td><span class="fas fa-trash-alt text-danger"></span></td>
                        <td><span class="fas fa-plus text-danger"></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
