<x-app-layout>
    <div class="card-header">
        <h3>Tambah Data Cuti Karyawan</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('cuti.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <select class="form-control" name="karyawan_id" id="karyawan_id">
                            <option value="">-- Pilih Karyawan --</option>
                            @foreach ($karyawan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        <label for="karyawan_id">Nama Lengkap</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" value="" name="no_induk" id="no_induk" type="text" placeholder="Masukkan Nomor Induk" />
                        <label for="no_induk">Nomor Induk</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" name="tgl_cuti" id="tgl_cuti" type="date" placeholder="Masukkan Tanggal Mulai Cuti" />
                        <label for="tgl_cuti">Tanggal Mulai Cuti</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" name="akhir_cuti" id="akhir_cuti" type="date" placeholder="Masukkan Tanggal Selesai Cuti" />
                        <label for="akhir_cuti">Tanggal Selesai Cuti</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="lama_cuti" id="lama_cuti" type="text" placeholder="Lama Cuti" />
                <label for="lama_cuti">Lama Cuti</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="keterangan" id="keterangan" type="text" placeholder="Masukkan Keterangan" />
                <label for="keterangan">Keterangan</label>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid">
                    <button class="btn btn-primary btn-block" type="submit">Tambah Cuti Karyawan</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>