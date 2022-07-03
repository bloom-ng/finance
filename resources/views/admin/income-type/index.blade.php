<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finace | Income Type</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    
<a href="{{route('admin.dashboard')}}">Dashboard</a>
<h1>Income Types</h1>

    <div><a href="{{route('admin.income-types.create')}}">Add New</a></div>
    <table class="table">
        <thead class="table-dark">
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </thead>
        @foreach ($incomeTypes as $incomeType )
        <tbody>
            <td>{{$loop->index + 1}}</td>
            <td>{{$incomeType->name}}</td>
            <td>
                <a href="{{route('admin.income-types.edit', ['incomeType' => $incomeType])}}">Edit</a>

                <form action="{{route('admin.income-types.delete', ['incomeType'=> $incomeType])}}" method="post"> @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tbody>
        @endforeach
        
    </table>

    <!-- Pagination -->
    {{ $incomeTypes->links() }}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
  