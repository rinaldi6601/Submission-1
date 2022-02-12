<x-app-layout>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Karyawan</h1>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nomor Induk</th>
                            <th>Nama</th>
                            <th>Allamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Tanggal Bergabung</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karyawan as $item)
                            <tr>
                                <td>{{ $item->no_induk }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->tgl_lahir }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>