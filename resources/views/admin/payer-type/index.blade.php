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
<h1>Payer Types</h1>

    <div><a href="{{route('admin.payer-types.create')}}">Add New</a></div>
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        @foreach ($payerTypes as $payerType )
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$payerType->name}}</td>
            <td>
                <a href="{{route('admin.payer-types.edit', ['payerType' => $payerType])}}">Edit</a>

                <form action="{{route('admin.payer-types.delete', ['payerType'=> $payerType])}}" method="post"> @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>

</body>
</html>