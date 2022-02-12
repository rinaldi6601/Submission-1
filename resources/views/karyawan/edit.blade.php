<x-app-layout>
    <div class="card-header">
        <h3>Ubah Data Karyawan</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('karyawan.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" name="no_induk" id="no_induk" type="text" placeholder="Masukkan Nomor Induk" />
                        <label for="no_induk">{{ $karyawan->no_induk }}</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" name="nama" id="nama" type="text" placeholder="Masukkan Nama Lengkap" />
                        <label for="nama">Nama Lengkap</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="alamat" id="alamat" type="text" placeholder="Masukkan Alamat" />
                <label for="alamat">Alamat</label>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" name="tgl_lahir" id="tgl_lahir" type="date" placeholder="Masukkan Tanggal Lahir" />
                        <label for="tgl_lahir">Tanggal Lahir</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" name="created_at" id="created_at" type="date" placeholder="Masukkan Tanggal Bergabung" />
                        <label for="created_at">Tanggal Bergabung</label>
                    </div>
                </div>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid">
                    <button class="btn btn-primary btn-block" type="submit">Tambah Karyawan</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>