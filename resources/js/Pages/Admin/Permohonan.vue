<template>
    <div>
        <admin-lte>
            <template #header>
                <h1 class="m-0">Permohonan Akun</h1>
            </template>
            <section class="content">
                <!-- <button class="btn btn-primary" @click="tabel">a</button> -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table
                                        id="tabel"
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
                                        <tbody id="tabel-body"></tbody>
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

            <!-- modal -->
            <div class="modal fade" id="modal-validasi">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">
                                Validasi Permohonan Akun
                            </h4>
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
                            <div class="form-group">
                                <div class="custom-control custom-radio mb-3">
                                    <input
                                        class="custom-control-input"
                                        type="radio"
                                        id="customRadio1"
                                        name="customRadio"
                                        value="1"
                                        v-model="form.status"
                                    />
                                    <label
                                        for="customRadio1"
                                        class="custom-control-label"
                                        >Terima</label
                                    >
                                </div>
                                <div class="custom-control custom-radio">
                                    <input
                                        class="custom-control-input"
                                        type="radio"
                                        id="customRadio2"
                                        name="customRadio"
                                        value="2"
                                        v-model="form.status"
                                    />
                                    <label
                                        for="customRadio2"
                                        class="custom-control-label text-danger"
                                        >Tolak</label
                                    >
                                </div>
                                <div
                                    class="invalid-feedback mb-2"
                                    :class="{
                                        'd-block': form.errors.status,
                                    }"
                                >
                                    {{ form.errors.status }}
                                </div>
                            </div>
                            <hr />
                            <!-- form diterima -->
                            <div id="hidden"></div>

                            <form v-if="form.status == 1">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Username"
                                        v-model="form.username"
                                        :class="{
                                            'is-invalid': form.errors.username,
                                        }"
                                    />
                                    <div
                                        class="invalid-feedback mb-2"
                                        :class="{
                                            'd-block': form.errors.username,
                                        }"
                                    >
                                        {{ form.errors.username }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Password"
                                        v-model="form.password"
                                        :class="{
                                            'is-invalid': form.errors.password,
                                        }"
                                    />
                                    <div
                                        class="invalid-feedback mb-2"
                                        :class="{
                                            'd-block': form.errors.password,
                                        }"
                                    >
                                        {{ form.errors.password }}
                                    </div>
                                </div>
                            </form>

                            <!-- form ditolak -->
                            <form v-if="form.status == 2">
                                <div class="form-group">
                                    <label>Alasan penolakan</label>
                                    <textarea
                                        class="form-control"
                                        rows="3"
                                        placeholder="Deskripsi"
                                        v-model="form.alasan_penolakan"
                                    ></textarea>
                                    <div
                                        class="invalid-feedback mb-2"
                                        :class="{
                                            'd-block':
                                                form.errors.alasan_penolakan,
                                        }"
                                    >
                                        {{ form.errors.alasan_penolakan }}
                                    </div>
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
                            <button
                                type="button"
                                class="btn btn-primary"
                                @click="simpan"
                            >
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </admin-lte>
    </div>
</template>

<script>
import AdminLte from "@/Layouts/AdminLte";

export default {
    props: ["office"],
    components: {
        AdminLte,
    },
    data() {
        return {
            form: this.$inertia.form({
                username: "",
                password: "",
                alasan_penolakan: "",
                status: "",
                id: "",
            }),
        };
    },

    methods: {
        getTable() {
            var html = "";
            var no = 1;
            this.office.forEach((element) => {
                html += `<tr>
                <th>${no++}</th>
                <th>${element.nama}</th>
                <th>${element.email}</th>
                <th>${element.fakultas.nama_fakultas}</th>
                <th>${element.prodi.nama_jurusan}</th>
                <th><button type="button" class="btn btn-block btn-default btn-flat" ><i class="fas fa-file-download text-danger"></i></button></th>
                <th> ${
                    element.status == null
                        ? '<span class="badge bg-primary">Menunggu</span>'
                        : '<span class="badge bg-danger">Ditolak</span>'
                } </th>
                <th><button type="button"  class="btn btn-block btn-primary btn-flat validasi" data-id="${
                    element.id
                }" >Validasi</button></th>
               

                </tr>`;
            });

            $("#tabel-body").html(html);
        },
        simpan() {
            this.form.id = $("#get-id").val();
            this.form.post(this.route("permohonan.store"), {
                preserveScroll: true,
                onSuccess: () => {
                    this.form.reset();
                    this.getTable();
                    this.renderGetId();
                    $("#modal-validasi").modal("hide");
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Berhasil di simpan",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                },
            });
        },
        renderGetId() {
            $(".validasi").click(function () {
                const id = $(this).data("id");
                $("#hidden").html(
                    `<input type="hidden" id="get-id" value="${id}" />`
                );

                $("#modal-validasi").modal("show");
            });
        },
    },

    mounted: function () {
        $(document).ready(function () {
            $("#tabel").DataTable();
        });

        this.getTable();
        this.renderGetId();
    },
};
</script>
