<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<a href="{{route('admin.dashboard')}}">Dashboard</a>
<h1>Income Types</h1>

    <div><a href="{{route('admin.income-types.create')}}">Add New</a></div>
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
                <a href="{{route('admin.income-types.edit', ['incomeType' => $incomeType])}}">Edit</a>

                <form action="{{route('admin.income-types.delete', ['incomeType'=> $incomeType])}}" method="post"> @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>

    <!-- Pagination -->
    {{ $incomeTypes->links() }}

</body>
</html>