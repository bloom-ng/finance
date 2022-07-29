
<x-header></x-header>

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
        <label for="name">Name</label> <input type="text" name="name" id="name">
        <br>

        <button type="submit">Add</button>
    </form>

    <x-footer></x-footer>