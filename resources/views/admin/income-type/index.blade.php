<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finace | Income Type</title>
</head>
<body>
    

    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        @foreach ($incomeTypes as $incomeType )
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$incomeType->name}}</td>
            <td>
                <a href="{{route('admin.income-types.edit', ['id' => $incomeType->id])}}">Edit</a>
                <a>Delete</a>
            </td>
        </tr>
        @endforeach
        
    </table>

</body>
</html>