


    <form action="{{route('admin.payer-types.store')}}" method="post">
        @csrf

        <label for="name">Payer Type</label> <input type="text" name="name" id="name">
        <button type="submit">Add</button>
    </form>