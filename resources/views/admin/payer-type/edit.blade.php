




    <form action="{{route('admin.payer-types.update', ['payerType' => $payerType])}}" method="post">
        @method('PUT')
        @csrf

        <label for="name">Payer Type</label> <input type="text" name="name" id="name" value="{{$payerType->name}}">
        <button type="submit">Update</button>
    </form>