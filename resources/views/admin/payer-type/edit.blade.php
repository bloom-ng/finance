<x-admin-header></x-admin-header>
<x-admin-sidebar></x-admin-sidebar>
<x-main-section>

    <div class="card">
        <div class="card-header">
            <h1>Edit Payer Type</h1>
        </div>
        <div class="card-body">
            <form action="{{route('admin.payer-types.update', ['payerType' => $payerType])}}" method="post">
                @method('PUT')
                @csrf

                <label for="name">Payer Type</label> <input type="text" name="name" id="name"
                    value="{{$payerType->name}}">
                <button class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
    </div>
</x-main-section>
<x-admin-footer></x-admin-footer>