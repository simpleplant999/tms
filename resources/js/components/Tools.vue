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
                 <button class="btn btn-primary">Add Tool</button>
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
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center text-nowrap">
                    <tr>
                        <td>Wrench</td>
                        <td>Description</td>
                        <td>A100</td>
                        <td><span class="badge badge-success">GOOD CONDITION</span></td>
                        <td>24</td>
                        <td><span class="fas fa-pen text-primary"></span></td>
                        <td><span class="fas fa-trash-alt text-danger"></span></td>
                        <td><span class="fas fa-plus text-danger"></span></td>
                    </tr>
                    <tr>
                        <td>Wrench</td>
                        <td>Description</td>
                        <td>A100</td>
                        <td><span class="badge badge-danger">DAMAGED</span></td>
                        <td>24</td>
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
