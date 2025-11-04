<!DOCTYPE html>
<html>
<head>
    <title>Subscribers Export</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Subscribers List</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Opt In</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $subscriber)
            <tr>
                <td>{{ $subscriber->name }}</td>
                <td>{{ $subscriber->phone }}</td>
                <td>{{ $subscriber->opt_in ? 'Yes' : 'No' }}</td>
                <td>{{ $subscriber->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>