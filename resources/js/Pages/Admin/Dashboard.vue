<template>
    <div>
        <admin-lte>
            <template #header>
                <h1 class="m-0">Dashboard</h1>
            </template>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"
                                    ><i class="fas fa-file-import"></i
                                ></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"
                                        >Total permohonan akun</span
                                    >
                                    <span class="info-box-number">
                                        {{ permohonan }}
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box mb-3">
                                <span
                                    class="info-box-icon bg-danger elevation-1"
                                    ><i class="fas fa-file-import"></i
                                ></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"
                                        >Permohonan ditolak</span
                                    >
                                    <span class="info-box-number">{{
                                        tolak
                                    }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box mb-3">
                                <span
                                    class="info-box-icon bg-success elevation-1"
                                    ><i class="fas fa-file-import"></i
                                ></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"
                                        >Permohonan diterima</span
                                    >
                                    <span class="info-box-number">{{
                                        terima
                                    }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!--/. container-fluid -->
            </section>
        </admin-lte>
    </div>
</template>

<script>
import AdminLte from "@/Layouts/AdminLte";
export default {
    props: ["tolak", "terima", "permohonan"],
    components: {
        AdminLte,
    },
    data() {
        return {
            tolak: this.tolak,
            terima: this.terima,
            permohonan: this.permohonan,
        };
    },
};
</script>
