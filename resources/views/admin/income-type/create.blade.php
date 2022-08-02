<x-admin-header></x-admin-header>
<x-admin-sidebar></x-admin-sidebar>
<x-main-section>
    <div class="card">
        <div class="card-header">
            <h1>Create Income Type</h1>
        </div>
        <div class="card-body">
            <!-- Place to delete -->
            <form action="{{route('admin.income-types.store')}}" method="post">
                @csrf

                <label for="name">Income Type</label> <input class="form-control" type="text" name="name" id="name">
                <br>
                <button class="btn btn-success" type="submit">Add</button>
            </form>
            <!-- Place to delete -->
        </div>
    </div>
</x-main-section>
<x-admin-footer></x-admin-footer>