<template>
    <div>
        <admin-lte>
            <template #header>
                <h1 class="m-0">History Akun</h1>
            </template>
            <section class="content">
                <!-- <button class="btn btn-primary" @click="tabel">a</button> -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="tempel-tabel"></div>
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
            <!-- modal -->
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Akun office 365 | UNM</h4>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Username"
                                        v-model="username"
                                    />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Password"
                                        v-model="password"
                                    />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button
                                type="button"
                                class="btn btn-default"
                                data-dismiss="modal"
                            >
                                Close
                            </button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </admin-lte>
    </div>
</template>

<script scoped>
import AdminLte from "@/Layouts/AdminLte";

export default {
    props: ["office"],
    components: {
        AdminLte,
    },
    data() {
        return {
            username: "",
            password: "",
        };
    },

    methods: {
        getTableHistory() {
            var html = "";
            var no = 1;
            this.office.forEach((element) => {
                html += `<tr>
                <td>${no++}</td>
                <td>${element.nama}</td>
                <td>${element.email}</td>
                <td>${element.fakultas.nama_fakultas}</td>
                <td>${element.prodi.nama_jurusan}</td>
                <td><a href="/file-sk/${
                    element.file
                }"  target="_blank" class="btn btn-block btn-default btn-flat" ><i class="fas fa-file-download text-danger"></i></a></td>

                <td> <span class="badge bg-success">Diterima</span></td>
                <td><button type="button"  class="btn btn-block btn-primary btn-flat validasi" data-username="${
                    element.username
                }" data-password="${element.password}" >Akun</button></td>


                </tr>`;
            });

            $("#tabel-body-history").html(html);
        },

        renderGetIdHistory() {
            var self = this;

            $(".validasi").click(function () {
                const username = $(this).data("username");
                const password = $(this).data("username");
                self.username = username;
                self.password = password;
                $("#modal-default").modal("show");
            });
        },
    },

    mounted: function () {
        $("#tempel-tabel").html(`<table
                                        id="tabel-history"
                                        class="
                                            table table-bordered table-striped
                                        "
                                    >
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Fakultas</th>
                                                <th>Prodi</th>
                                                <th>SK TUGAS</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabel-body-history"></tbody>
                                    </table>`);

        this.getTableHistory();
        this.renderGetIdHistory();
        $("#tabel-history").DataTable();
        // $("#tabel-history").DataTable().rows(".modified").invalidate().draw();
    },
};
</script>
