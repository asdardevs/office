<template>
    <div style="height: 100vh">
        <div class="bg1">
            <nav class="navbar navbar-expand-lg navbar-light bg-light-cs">
                <div class="container-fluid px-5">
                    <a class="navbar-brand" href="#"
                        ><img :src="'/lte/dist/img/unm.png'" width="100" alt=""
                    /></a>
                    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->

                    <div
                        class="collapse navbar-collapse"
                        id="navbarSupportedContent"
                    >
                        <ul class="navbar-nav mr-auto align-items-center">
                            <li
                                class="nav-item active"
                                style="
                                    border-left: 2px solid #000;
                                    margin-left: 10px;
                                "
                            >
                                <a class="nav-link">
                                    <img
                                        class="pl-2"
                                        src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE1Mu3b?ver=5c31"
                                        width="120"
                                        alt=""
                                    />
                                </a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <!-- <inertia-link :href="route('login')" class="text-sm text-gray-700 underline">
                    Log in
                </inertia-link> -->
                            <inertia-link
                                :href="route('login')"
                                type="button"
                                class="btn btn-default btn-flat"
                                >Login
                                <i class="fas fa-user-plus ml-3 text-black"></i
                            ></inertia-link>
                        </form>
                    </div>
                </div>
            </nav>
            <section>
                <div class="container-fluid py-5 px-5">
                    <div class="row pt-5">
                        <div class="col-md-6 pt-cs-5">
                            <h1 class="h1-cs w-500">
                                Miliki segera akun office 365 dan kolaborasikan
                                pekerjaan secara gratis dengan Office di web
                            </h1>
                            <div class="row mt-5 pt-4">
                                <div class="col-md-4">
                                    <a
                                        href="#daftar"
                                        type="button"
                                        class="
                                            btn btn-block
                                            bg-amber
                                            btn-flat
                                            mb-3
                                        "
                                        >Daftar</a
                                    >
                                </div>
                                <div class="col-md-4">
                                    <a
                                        href="#cek-akun"
                                        type="button"
                                        class="
                                            btn
                                            btn-block
                                            btn-outline-amber
                                            btn-flat
                                            mb-3
                                        "
                                        >Cek Akun</a
                                    >
                                </div>
                            </div>
                            <a
                                href="#"
                                data-toggle="modal"
                                data-target="#panduan"
                                class="panduan"
                                >Panduan penggunaan akun office 365 UNM
                                <i class="fas fa-angle-double-right ml-3"></i
                            ></a>
                        </div>
                        <div class="col-md-6 pt-5">
                            <img
                                src="/lte/dist/img/mac office.png"
                                width="100%"
                                alt=""
                            />
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section style="background-color: #000">
            <div class="container-fluid px-5 py-5 text-center">
                <h3 class="text-white b-600">
                    Akun Office 365 Universitas Negeri Makassar
                </h3>
                <p class="text-muted">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nihil quis sed dicta excepturi quam illo doloribus, quaerat
                    mollitia ipsam vero atque sequi provident ut eum suscipit
                    velit dolorem consectetur dolorum.
                </p>
                <img
                    class="pl-2"
                    src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE1Mu3b?ver=5c31"
                    width="120px"
                    alt=""
                />
            </div>
        </section>
        <section>
            <div class="container-fluid">
                <div class="row">
                    <Daftar :fakultas="fakultasHome" :prodi="prodiHome" />

                    <Check />
                </div>
            </div>
        </section>
        <section class="shadow-top py-5">
            <div class="text-center">
                <p class="text-muted">Dikembangkan oleh</p>
                <div class="d-flex justify-content-center mb-4">
                    <div>
                        <img src="/lte/dist/img/unm.png" width="120" alt="" />
                    </div>
                    <div>
                        <img
                            class="ml-3"
                            src="/lte/dist/img/ict.PNG"
                            width="40"
                            alt=""
                        />
                    </div>
                </div>
                <small
                    >Copyright ©{{ tahun }} Universitas Negeri Makassar</small
                >
            </div>
        </section>
    </div>

    <!-- modal embed panduan -->
    <div class="modal fade" id="panduan">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Panduan penggunaan office 365 UNM
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
                <div class="modal-body p-5" style="background-color: #000">
                    <h2 class="text-center text-white">
                        Halaman Belum Tersedia :')
                    </h2>
                </div>
                <!-- <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</template>
<script>
import Daftar from "@/Pages/Office/Daftar";
import Check from "@/Pages/Office/Check";

export default {
    props: ["fakultas", "prodi"],

    components: {
        Daftar,
        Check,
    },
    data() {
        return {
            fakultasHome: this.fakultas,
            prodiHome: this.prodi,
            tahun: new Date().getFullYear(),

            // prodis:[]
        };
    },
    // methods: {
    //    getProdi(cek) {
    //        console.log(cek);
    //     let url = '/prodi';
    //     axios.post(url)
    //         .then(response => {
    //             console.table(response);
    //             this.prodis = response
    //         });
    // },
    // },
    // mounted() {
    //     // this.getProdi();
    // }
};
</script>
