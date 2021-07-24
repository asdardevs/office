<template>
    <div>
        <admin-lte>
            <template #header>
                <h1 class="m-0">History</h1>
            </template>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table
                                        id="example1"
                                        class="
                                            table table-bordered table-striped
                                        "
                                    >
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Fakultas</th>
                                                <th>Prodi</th>
                                                <th>SK TUGAS</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mahdinul</td>
                                                <td>mahdinul@gmail.com</td>
                                                <td>Teknik</td>
                                                <td>PTIK</td>
                                                <td>
                                                    <button
                                                        type="button"
                                                        class="
                                                            btn
                                                            btn-block
                                                            btn-default
                                                            btn-flat
                                                        "
                                                    >
                                                        <i
                                                            class="
                                                                fas
                                                                fa-file-download
                                                                text-danger
                                                            "
                                                        ></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge bg-success"
                                                        >Diterima</span
                                                    >
                                                </td>
                                                <td>
                                                    <button
                                                        type="button"
                                                        class="
                                                            btn
                                                            btn-block
                                                            btn-primary
                                                            btn-flat
                                                        "
                                                        data-toggle="modal"
                                                        data-target="#modal-default"
                                                    >
                                                        Akun
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
        </admin-lte>
    </div>
</template>

<script>
import AdminLte from "@/Layouts/AdminLte";
export default {
    components: {
        AdminLte,
    },
};
</script>
