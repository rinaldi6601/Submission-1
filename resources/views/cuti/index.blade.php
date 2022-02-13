<x-app-layout>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Cuti Karyawan</h1>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nomor Induk</th>
                            <th>Nama</th>
                            <th>Tanggal Mulai Cuti</th>
                            <th>Tanggal Akhir Cuti</th>
                            <th>Lama Cuti</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuti as $item)
                            <tr>
                                <td>{{ $item->karyawan->no_induk }}</td>
                                <td>{{ $item->karyawan->nama }}</td>
                                <td>{{ $item->tgl_cuti }}</td>
                                <td>{{ $item->akhir_cuti }}</td>
                                <td>{{ $item->lama_cuti }}</td>
                                <td>{{ $item->keterangan }}</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>