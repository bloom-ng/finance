<x-admin-header></x-admin-header>
<x-admin-sidebar></x-admin-sidebar>
<x-main-section>

    <div class="card">
        <div class="card-header">
            <h1>Add Payer Type</h1>
        </div>
        <div class="card-body">
            <form action="{{route('admin.payer-types.store')}}" method="post">
                @csrf

                <label for="name">Payer Type</label> <input type="text" name="name" id="name">
                <button class="btn btn-success" type="submit">Add</button>
            </form>
        </div>
    </div>

</x-main-section>
<x-admin-footer></x-admin-footer>