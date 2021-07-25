<template>
    <div class="col-md-6 p-5" id="daftar" style="background-color: #f5f5f5">
        <h3 class="b-600">Daftar Akun Office 365</h3>
        <p class="text-muted mb-5">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum
            rem quisquam adipisci accusamus, unde voluptates ullam nostrum
            laboriosam nihil sapiente ad? Architecto quaerat cupiditate
            aspernatur autem reiciendis maxime, quia veniam.
        </p>
        <form>
            <div class="form-group mb-4">
                <label for="nama">Nama Lengkap</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="Nama Lengkap"
                    v-model="form.nama"
                    :class="{ 'is-invalid': form.errors.nama }"
                    autofocus="autofocus"
                    autocomplete="off"
                />
                <div
                    class="invalid-feedback mb-2"
                    :class="{ 'd-block': form.errors.nama }"
                >
                    {{ form.errors.nama }}
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="email">E-mail</label>
                <input
                    type="email"
                    class="form-control"
                    placeholder="E-mail Address"
                    v-model="form.email"
                    :class="{ 'is-invalid': form.errors.email }"
                    autocomplete="off"
                />
                <div
                    class="invalid-feedback mb-2"
                    :class="{ 'd-block': form.errors.email }"
                >
                    {{ form.errors.email }}
                </div>
            </div>

            <div class="form-group mb-4">
                <label>Fakultas</label>
                <select
                    class="custom-select"
                    v-model="form.kode_fakultas"
                    @change="onChange($event)"
                    :class="{ 'is-invalid': form.errors.kode_fakultas }"
                >
                    <option class="text-mute" selected disabled value="">
                        Fakultas
                    </option>
                    <option
                        v-for="item in form.fakultasDaftar"
                        :key="item.id"
                        :value="item.kode_fakultas"
                    >
                        {{ item.nama_fakultas }}
                    </option>
                </select>
                <div
                    class="invalid-feedback mb-2"
                    :class="{ 'd-block': form.errors.kode_fakultas }"
                >
                    {{ form.errors.kode_fakultas }}
                </div>
            </div>
            <div class="form-group mb-4">
                <label>Prodi</label>
                <select
                    class="custom-select"
                    v-model="form.kode_prodi"
                    :class="{ 'is-invalid': form.errors.kode_fakultas }"
                >
                    <option class="text-mute" selected disabled value="">
                        Prodi
                    </option>
                    <option
                        v-for="item in form.prodiDaftar"
                        :key="item.id"
                        :value="item.kode_jurusan"
                    >
                        {{ item.nama_jurusan }}
                    </option>
                </select>
                <div
                    class="invalid-feedback mb-2"
                    :class="{ 'd-block': form.errors.kode_prodi }"
                >
                    {{ form.errors.kode_prodi }}
                </div>
            </div>
            <div class="form-group mb-4">
                <label>Upload SK Tugas</label>
                <div class="custom-file">
                    <input
                        type="file"
                        class="custom-file-input"
                        ref="file_sk"
                        :class="{ 'is-invalid': form.errors.file_sk }"
                        v-on:change="videoChoosen"
                    />
                    <label class="custom-file-label" for="file_sk">{{
                        filename
                    }}</label>
                </div>
                <div
                    class="invalid-feedback mb-2"
                    :class="{ 'd-block': form.errors.file_sk }"
                >
                    {{ form.errors.file_sk }}
                </div>
            </div>
        </form>

        <button
            type="button"
            @click="createOffice"
            class="btn btn-default btn-flat"
        >
            <div v-if="onProgress == true">
                <i class="fa fa-spinner fa-spin mr-1"></i>Loading
            </div>
            <div v-else>Kirim <i class="fab fa-telegram-plane ml-3"></i></div>
        </button>
    </div>
</template>

<script>
export default {
    props: ["fakultas", "prodi", "errors"],

    data() {
        return {
            form: this.$inertia.form({
                nama: "",
                email: "",
                kode_fakultas: "",
                kode_prodi: "",
                fakultasDaftar: this.fakultas,
                prodiDaftar: [],
                file_sk: null,
            }),
            filename: "Pilih file",
            onProgress: "",
        };
    },
    methods: {
        onChange: function (event) {
            // kosongkan
            this.form.prodiDaftar = [];
            // isi
            this.form.prodiDaftar = this.prodi.filter(
                (a) => a.kode_fakultas == event.target.value
            );

            // this.prodi.forEach((element) => {
            //     //    console.log(element.nama_jurusan);
            //     if (element.kode_fakultas == event.target.value) {
            //         this.prodiDaftar.push(element);
            //     }
            // });
        },
        videoChoosen(event) {
            this.filename = event.target.files[0].name;
        },

        createOffice() {
            var self = this;
            this.onProgress = true;
            if (this.$refs.file_sk) {
                this.form.file_sk = this.$refs.file_sk.files[0];
            }

            this.form.post(this.route("office.store"), {
                preserveScroll: true,
                onSuccess: () => {
                    self.onProgress = false;
                    this.form.reset();
                    this.filename = "Pilih file";
                    Swal.fire(
                        "Berhasil!",
                        "Silahkan cek token anda di E-Mail..!",
                        "success"
                    );
                },
                onError: (errors) => {
                    self.onProgress = false;
                },
            });
        },
    },
};
</script>

<style scoped>
.buttonload {
    background-color: #04aa6d; /* Green background */
    border: none; /* Remove borders */
    color: white; /* White text */
    padding: 12px 16px; /* Some padding */
    font-size: 16px; /* Set a font size */
}
</style>
