<template>
   <div>
       <div class="row">
           <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                    TOOLS</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <span v-text="tools.length"></span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tools fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                    Employees</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" >
                                    <span v-text="employees.length"></span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Earnings (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
       </div>
   </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            this.loadData();
        },
        data() {
            return{
                employees: {},
                tools: {}
            }
        },
        methods: {
             loadData: function(){
                axios.get("/api/employee").then(({data}) => (this.employees = data));
                axios.get("/api/tool").then(({data}) => (this.tools = data));
            },
        }
    }
</script>
