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
                <label for="exampleInputEmail1">Nama Lengkap</label>
                <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    placeholder="Nama Lengkap"
                />
            </div>
            <div class="form-group mb-4">
                <label for="exampleInputEmail1">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    placeholder="Email"
                />
            </div>

            <div class="form-group mb-4">
                <label>Fakultas</label>
                <select class="custom-select" @change="onChange($event)">
                    <option class="text-mute" selected disabled value="">
                        Fakultas
                    </option>
                    <option
                        v-for="item in fakultasDaftar"
                        :key="item.id"
                        :value="item.kode_fakultas"
                    >
                        {{ item.nama_fakultas }}
                    </option>
                </select>
            </div>
            <div class="form-group mb-4">
                <label>Prodi</label>
                <select class="custom-select">
                    <option class="text-mute" selected disabled value="">
                        Prodi
                    </option>
                    <option
                        v-for="item in prodiDaftar"
                        :key="item.id"
                        :value="item.kode_jurusan"
                    >
                        {{ item.nama_jurusan }}
                    </option>
                </select>
            </div>
            <div class="form-group mb-4">
                <label>Upload SK Tugas</label>
                <div class="custom-file">
                    <input
                        type="file"
                        class="custom-file-input"
                        id="customFile"
                    />
                    <label class="custom-file-label" for="customFile"
                        >Choose file</label
                    >
                </div>
            </div>
        </form>
        <button type="button" class="btn btn-default btn-flat">
            Kirim <i class="fab fa-telegram-plane ml-3"></i>
        </button>
    </div>
</template>

<script>
export default {
    props: ["fakultas", "prodi"],

    data() {
        return {
            fakultasDaftar: this.fakultas,
            prodiDaftar: [],
        };
    },
    methods: {
        onChange: function (event) {
            // kosongkan
            this.prodiDaftar = [];
            // isi
            this.prodiDaftar = this.prodi.filter(
                (a) => a.kode_fakultas == event.target.value
            );

            // this.prodi.forEach((element) => {
            //     //    console.log(element.nama_jurusan);
            //     if (element.kode_fakultas == event.target.value) {
            //         this.prodiDaftar.push(element);
            //     }
            // });
        },
    },
};
</script>
