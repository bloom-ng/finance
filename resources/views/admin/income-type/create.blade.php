


    <form action="{{route('admin.income-types.store')}}" method="post">
        @csrf

        <label for="name">Income Type</label> <input type="text" name="name" id="name">
        <button type="submit">Add</button>
    </form>