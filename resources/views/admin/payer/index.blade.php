
    
<a href="{{route('admin.dashboard')}}">Dashboard</a>
<h1>Payer </h1>

    <div><a href="{{route('admin.payers.create')}}">Add New</a></div>
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Type</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach ($payers as $payer )
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$payer->name}}</td>
            <td>{{$payer->payerType->name}}</td>
            <td>{{$statusMapping[$payer->status]}}</td>
            <td>
                <a href="{{route('admin.payers.edit', ['payer' => $payer])}}">Edit</a>

                <form action="{{route('admin.payers.delete', ['payer'=> $payer])}}" method="post"> @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>

