<x-header></x-header>
<x-admin-sidebar></x-admin-sidebar>
<x-main-section>
    <div class="card mb-4">
        <div class="card-header">
            <h1>Create Payer</h1>
        </div>
        <div class="card-body">
            <form action="{{route('admin.payers.store')}}" method="post">
                @csrf

                <label for="payer_type_id">Payer Class</label>
                <select required name="payer_type_id" id="payer_type_id">
                    <option value="">--Select--</option>
                    @foreach ($payerTypes as $payerType )
                    <option value="{{$payerType->id}}"> {{$payerType->name}}</option>
                    @endforeach
                </select>
                <br>
                <br>
                <label for="name">Name</label> <input type="text" name="name" id="name">
                <br>
                <br>

                <button class="btn btn-success" type="submit">Add</button>
            </form>
        </div>
    </div>

</x-main-section>
<x-footer></x-footer>