<template>
    <div class="">
        <div class="form-group row">
            <input type="text" class="form-control w-100 col-lg-4 col-sm-12" placeholder="Search" style="margin-right:-35px">
            <div class="input-group-append">
                <span class="btn btn-primary">
                    <i class="fas fa-search fa-sm"></i>
                </span>
            </div>
        </div>   
        <!-- <button class="btn btn-primary float-right mb-2">Add Tool</button> -->
         <div class="row mb-2">
            <div class="col-7">
                <p class="h4 font-weight-bold text-primary">BORROWED TOOLS</p>
            </div>
            <div class="col-5 text-right mb-2">
                 <button class="btn btn-primary">Generate Report</button>
            </div>
        
            <div class="alert alert-danger alert-dismissible fade show col-lg-8 col-sm-12 offset-lg-2 text-center" role="alert">
                <strong>John Doe</strong> borrowed TOOL is OVERDUE
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-warning alert-dismissible fade show col-lg-8 col-sm-12 offset-lg-2 text-center" role="alert">
                <strong>John Doe</strong> borrowed TOOL must be return on March 10, 2021
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <div style="overflow-x:scroll" >
            <table class="table table-bordered table-sm">
                <thead>
                    <tr class="text-uppercase text-center text-nowrap">
                        <th>Name</th>
                        <th>Tool</th>
                        <th>Desc</th>
                        <th>Size</th>
                        <th>Qty</th>
                        <th>Status</th>
                        <th>Borrowed On</th>
                        <th>Until</th>
                        <th>Returned on</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center text-nowrap">
                    <tr>
                        <td >John Doe</td>
                        <td>Wrench</td>
                        <td>Description</td>
                        <td>A100</td>
                        <td>2</td>
                        <td><span class="badge badge-warning">ON-HAND</span></td>
                        <td >Mar 5, 2021</td>
                        <td >Mar 10, 2021</td>
                        <td >Mar 10, 2021</td>
                        <td><span class="fas fa-sign-in-alt text-danger"></span></td>
                        <!-- <td><span class="fas fa-pen text-primary"></span></td>
                        <td><span class="fas fa-trash-alt text-danger"></span></td>
                        <td><span class="fas fa-plus text-danger"></span></td> -->
                    </tr>
                    <tr>
                        <td>Jane Doe</td>
                        <td>Wrench</td>
                        <td>Description</td>
                        <td>A100</td>
                        <td>1</td>
                        <td><span class="badge badge-success">RETURNED</span></td>
                        <td>Mar 5, 2021</td>
                        <td >Mar 10, 2021</td>
                        <td >Mar 10, 2021</td>
                        <td><span class="fas fa-check text-success"></span></td>
                        <!-- <td><span class="fas fa-pen text-primary"></span></td>
                        <td><span class="fas fa-trash-alt text-danger"></span></td>
                        <td><span class="fas fa-plus text-danger"></span></td> -->
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
