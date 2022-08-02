<x-admin-header></x-admin-header>
<x-admin-sidebar></x-admin-sidebar>
<x-main-section>
    <div class="card mb-4">
        <div class="card-header">
            <h1>Edit</h1>
        </div>
        <div class="card-body">
            <form action="{{route('admin.income-types.update', ['incomeType' => $incomeType])}}" method="post">
                @method('PUT')
                @csrf

                <label for="name">Income Type</label> <input type="text" name="name" id="name"
                    value="{{$incomeType->name}}">
                <button class="text-white btn btn-success" type="submit">Update</button>
            </form>
        </div>
    </div>
</x-main-section>
<x-admin-footer></x-admin-footer>