<x-header></x-header>
<x-admin-sidebar></x-admin-sidebar>
<x-main-section>
    <div class="card mb-4">
        <div class="card-header">
            <h1>Edit Payer</h1>
        </div>
        <div class="card-body">
            <form class="gap-4" action="{{route('admin.payers.update', ['payer' => $payer])}}" method="post">
                @csrf
                @method('PUT')

                <label for="payer_type_id">Payer Class</label>
                <select required name="payer_type_id" id="payer_type_id">
                    <option value="">--Select--</option>
                    @foreach ($payerTypes as $payerType )
                    <option {{$payer->payer_type_id == $payerType->id ? 'selected' : ''}}
                        value="{{$payerType->id}}">
                        {{$payerType->name}}
                    </option>
                    @endforeach
                </select>
                <br>
                <label for="name">Name</label> <input type="text" name="name" id="name" value="{{$payer->name}}">
                <br>
                <label for="statue">Status</label>
                <select required name="status" id="status">
                    <option value="">--Select--</option>
                    @foreach ($statusMapping as $key => $status )
                    <option {{$key==$payer->status ? 'selected' : ''}}
                        value="{{$key}}">
                        {{$status}}
                    </option>
                    @endforeach
                </select>
                <br>

                <button class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
    </div>

</x-main-section>
<x-footer></x-footer>