




    <form action="{{route('admin.income-types.update', ['incomeType' => $incomeType])}}" method="post">
        @method('PUT')
        @csrf

        <label for="name">Income Type</label> <input type="text" name="name" id="name" value="{{$incomeType->name}}">
        <button type="submit">Update</button>
    </form>