<template>
    <div class="col-md-6 p-5" id="cek-akun">
        <h3 class="b-600">Cek Akun Office 365</h3>
        <p class="text-muted mb-5">
            Gunakan token yang masuk ke email anda untuk mengecek status
            permohonan akun Office 365 anda
        </p>
        <form>
            <div class="form-group mb-4">
                <label for="exampleInputEmail1">Maukan Token Anda</label>
                <input
                    type="text"
                    class="form-control"
                    id="exampleInputEmail1"
                    placeholder="Token...."
                    v-model="token"
                />
            </div>
        </form>

        <button
            v-if="token"
            type="button"
            @click="cekAkun"
            class="btn btn-default btn-flat mb-3"
        >
            <div v-if="onnProgress == true">
                <i class="fa fa-spinner fa-spin"></i>Loading
            </div>
            <div v-else>Cek Akun Saya</div>
        </button>

        <button
            disabled
            v-else
            type="button"
            @click="cekAkun"
            class="btn btn-default btn-flat mb-3"
        >
            Cek Akun Saya
        </button>

        <!-- kondisi awal -->
        <div
            class="alert alert-primary alert-dismissible"
            v-if="status == null"
        >
            <button
                type="button"
                class="close"
                data-dismiss="alert"
                aria-hidden="true"
            >
                ×
            </button>
            <h6>
                <i class="icon fas fa-spinner"></i>Permintaan Akun Sedang
                Divalidasi
            </h6>
            <small> Mohon dicek secara berkala</small>
        </div>

        <!-- kondisi token tidak valid -->
        <div class="alert alert-warning alert-dismissible" v-if="status == 3">
            <button
                type="button"
                class="close"
                data-dismiss="alert"
                aria-hidden="true"
            >
                ×
            </button>
            <h6>
                <i class="icon fas fa-exclamation-triangle"></i>Token Tidak
                Ditemukan
            </h6>
            <small
                >Mohon periksa kembali token yang dikirimkan ke Email
                anda</small
            >
        </div>

        <!-- kkondisi akun ditolak -->
        <div class="alert alert-danger alert-dismissible" v-if="status == '2'">
            <button
                type="button"
                class="close"
                data-dismiss="alert"
                aria-hidden="true"
            >
                ×
            </button>
            <h6><i class="icon fas fa-ban"></i>Permintaan Akun Ditolak</h6>
            <small> {{ pesan }}</small>
        </div>

        <!-- kondisi akun diterima -->
        <div class="alert alert-success alert-dismissible" v-if="status == '1'">
            <button
                type="button"
                class="close"
                data-dismiss="alert"
                aria-hidden="true"
            >
                ×
            </button>
            <h6><i class="icon fas fa-check"></i>Permintaan Akun Diterima</h6>
            <small> Username </small>
            <p>{{ username }}</p>
            <small> Password </small>
            <p>{{ password }}</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            status: "4",
            username: "",
            password: "",
            pesan: "",
            token: "",
            onnProgress: "",
        };
    },
    methods: {
        cekAkun() {
            // this.username = "asdar";
            // this.status = 1;
            var self = this;
            this.onnProgress = true;
            $.get("office/" + this.token, function (data, status) {
                self.onnProgress = false;
                if (data == 3) {
                    self.status = 3;
                } else {
                    self.status = data.status;
                    self.username = data.username;
                    self.password = data.password;
                    self.pesan = data.pesan;
                }
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
