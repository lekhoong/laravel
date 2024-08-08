<!DOCTYPE html>
<html>
<head>
    <title>Feedback Data</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Feedback</th>
                <th>Rate</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->age }}</td>
                    <td>{{ $member->feedback }}</td>
                    <td>{{ $member->rate }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $members->links() }}
</body>
</html>
