<template>
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Accomplishment Report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Accomplishment Report</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            Populate Accomplishment Report Details
                        </h3>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="form-group">
                            <label>Report for Today:</label>
                            <!-- <input type="textarea" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
                            <textarea name="" id="" cols="210" rows="8" v-model="accomplishment_report"></textarea>
                        </div>
                          <div class="form-group">
                            <label>Date and Time:</label>
                            <!-- <input type="text" disabled class="form-control" v-model="time" > -->
                            <!-- <textarea name="" id="" cols="160" rows="8" v-model="accomplishment_Report"></textarea> -->
                            <!-- <span>Last updated: {{ moment("D/M/YYYY h:mm A") }}</span> -->
                        </div>
                        <div class="form-group">
                           <button @click="submitReport" class="btn btn-primary btn-block">Submit Report</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data(){
            return{
                accomplishment_report: '',
                // time:'25/06/2020 11:21 PM'
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            submitReport(){
                console.log('Submitted')
                axios.post('/submitAccomplishmentReport',{
                    accomplishment_report: this.accomplishment_report,
                    // time: this.time
                }).then((res)=>{
                    toastr.success('Report Submitted!')
                    this.accomplishment_report = ""
                }).catch((err)=>{
                    console.log(err)
                })

            }
        }
    }
</script>
