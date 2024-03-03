<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Pengajuan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Laporan Data Bulanan</h2>
    <p><strong>{{ $title }}</strong></p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pendaftaran</th>
                <th>Layanan</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>User</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftaran as $key => $data)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->kode_pendaftaran }}</td>
                <td>{{ $data->nama_layanan }}</td>
                <td>{{ $data->keterangan??'-' }}</td>
                <td>{{ $data->nama_status }}</td>
                <td>{{ $data->nama_user }}</td>
                <td>{{ $data->nama_admin }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
