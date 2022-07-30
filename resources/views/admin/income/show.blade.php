{{-- {{dd($income)}} --}}
<x-admin-header></x-admin-header>
<x-admin-sidebar></x-admin-sidebar>
<x-main-section>

    <div class="card mb-4">
        <div class="card-header">

        </div>
        <div class="card-body d-flex flex-column gap-1">
            <label for="id">Serial</label>
            <input type="text" id="id" value="{{$income->id}}" readonly></br>

            <label for="payment_date">Payment Date</label>
            <input type="text" id="payment_date" value="{{$income->payment_date}}" readonly></br>

            <label for="payer_type">Payer Type</label>
            <input type="text" id="payer_type" value="{{$income->payer->payerType->name}}" readonly></br>

            <label for="payer_name">Payer</label>
            <input type="text" id="payer_name" value="{{$income->payer->name}}" readonly></br>

            <label for="amount">Amount</label>
            <input type="text" id="amount" value="{{$income->amount}}" readonly></br>

            <label for="income_type">Income Type</label>
            <input type="text" id="income_type" value="{{$income->incomeType->name}}" readonly></br>

            <label for="payment_method">Payment Method</label>
            <input type="text" id="payment_method" value="{{$income->paymentMethodMapping()[$income->payment_method]}}"
                readonly></br>

            <label for="remark">Remark</label>
            <input type="text" id="remark" value="{{$income->remark}}" readonly></br>

            <a class="btn btn-warning" href="{{route('admin.incomes.edit', ['income' => $income])}}">Edit</a>
        </div>
    </div>

</x-main-section>
<x-admin-footer></x-admin-footer>