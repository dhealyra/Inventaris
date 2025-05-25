<table>
    <thead>
        <tr>
            <th>Kode</th>
            <th>Jurusan</th>
            <th>Nama Ruangan</th>
            <th>Deskripsi</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($locations as $loc)
        <tr>
            <td>{{ $loc->code }}</td>
            <td>{{ $loc->jurusan }}</td>
            <td>{{ $loc->name }}</td>
            <td>{{ $loc->description }}</td>
            <td>{{ $loc->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
