<x-app-layout>
    <div class="container-fluid px-4">
        <h3 class="mt-4">Data Cuti Karyawan Lebih dari 2 Kali</h3>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nomor Induk</th>
                            <th>Nama</th>
                            <th>Tanggal Mulai Cuti</th>
                            <th>Tanggal Akhir Cuti</th>
                            <th>Total Pengambilan Cuti</th>
                            <th>Lama Cuti</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($total as $item)
                            <tr>
                                <td>{{ $item->karyawan->no_induk }}</td>
                                <td>{{ $item->karyawan->nama }}</td>
                                <td>{{ $item->karyawan->cuti->tgl_cuti }}</td>
                                <td>{{ $item->karyawan->cuti->akhir_cuti }}</td>
                                <td>2 Kali</td>
                                <td>{{ $item->karyawan->cuti->lama_cuti }}</td>
                                <td>{{ $item->karyawan->cuti->keterangan }}</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>