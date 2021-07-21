<template>
     <div class="col-md-6 p-5" id="cek-akun">
                        <h3 class="b-600">
                            Cek Akun Office 365
                        </h3>
                        <p class="text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum
                            rem
                            quisquam adipisci accusamus, unde voluptates ullam nostrum laboriosam nihil sapiente ad?
                            Architecto quaerat cupiditate aspernatur autem reiciendis maxime, quia veniam.</p>
                        <form>
                            <div class="form-group mb-4">
                                <label for="exampleInputEmail1">Maukan Token Anda</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Token....">
                            </div>
                        </form>
                        <button type="button" class="btn btn-default btn-flat mb-3">Cek Akun Saya </button>

                        <!-- kondisi awal -->
                        <div class="alert alert-primary alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h6><i class="icon fas fa-spinner"></i>Permintaan Akun Sedang Divalidasi</h6>
                            <small> Mohon dicek secara berkala</small>
                        </div>

                        <!-- kondisi token tidak valid -->
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h6><i class="icon fas fa-exclamation-triangle"></i>Token Tidak Ditemukan</h6>
                            <small>Mohon periksa kembali token yang dikirimkan ke Email anda</small>
                        </div>

                        <!-- kkondisi akun ditolak -->
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h6><i class="icon fas fa-ban"></i>Permintaan Akun Ditolak</h6>
                            <small> Disini pesan alasan penolakan akun ......</small>
                        </div>

                        <!-- kondisi akun diterima -->
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h6><i class="icon fas fa-check"></i>Permintaan Akun Diterima</h6>
                            <small>
                                Username
                            </small>
                            <p>user@gmail.com</p>
                            <small>
                                Password
                            </small>
                            <p>#unmtetapjaya</p>
                        </div>
                    </div>
</template>