<!-- Pleas add this to the header -->
<script src="//unpkg.com/alpinejs" defer></script>

<form action="{{route('admin.incomes.store')}}" method="post" onsubmit="validate()"> @csrf

    <div x-data="{ showPayerComponent : false}" x-cloak>
        <div>
            <label for="payment_date">Date</label>
            <input type="date" name="payment_date" id="payment_date" value="{{date('Y-m-d')}}">
            <br>
        </div>
    
        <div>
            <label for="income_type_id">Income Type</label>
            <select name="income_type_id" id="income_type_id">
                @foreach ( $incomeTypes as $incomeType )
                    <option value="{{$incomeType->id}}">
                        {{$incomeType->name}}
                    </option>
                @endforeach
            </select>
        </div>
    
        <div>
            <label for="payer_type">Payer Class</label>
            <select name="payer_type" id="payer_type" 
                    @change="$el.value != '' ? showPayerComponent = true : showPayerComponent = false">
                    <option value=""></option>
                @foreach ( $payerTypes as $payerType )
                    <option value="{{$payerType->id}}">
                        {{$payerType->name}}
                    </option>
                @endforeach
            </select>
        </div>
    
        <div x-show="showPayerComponent" >
            <label for="payer">Payer</label>
            <!-- <select name="payer_id" id="payer_id"></select> -->
            <div>
                <input type="search" name="payer" id="payer" onchange="findPayer()">
                <div id="choices"></div>
            </div>
            <input type="hidden" name="payer_id" id="payer_id" >
        </div>
    
        <div>
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount">
        </div>
    
        <div>
            <label for="payment_method">Payment Method</label>
            <select required name="payment_method" id="payment_method">
                <option value=""></option>
                @foreach ($paymentMethodMapping as $key => $value )
                    <option value="{{$key}}">
                        {{$value}}
                    </option>
                @endforeach
            </select>
        </div>
    
        <div>
            <label for="remark">Remark</label>
            <input type="text" name="remark" id="remark">
        </div>
    
        <button type="submit" >Submit</button>
    </div>
</form>


<script>
      
    // const choices = new Choices('#payer_id');
      
    // document.querySelector('#payer_type').addEventListener('change', async ()=>{
    //     try {
    //         let payersAPIResponse = await fetch(`/api/payers/payer-type/${event.target.value}`);
    //         payersAPIResponse = await payersAPIResponse.json();
    //         choices.setChoices(payersAPIResponse.payers, 'id', 'name', false);

    //     } catch (err) {
    //         // console.error(err);
    //     }
    // });

    async function findPayer(){
        let payer_type = document.querySelector('#payer_type').value;
        let payer = event.target.value;

        let payersAPIResponse = await fetch(`/api/payers/payer-type/${payer_type}?q=${payer}`);
            payersAPIResponse = await payersAPIResponse.json();

        setChoices(payersAPIResponse.payers);
        
    }

    function setChoices(items = []){
        choices = items.map((payer)=>{
                            return `<div onclick="setPayer(${payer.id})"> ${payer.name}</div>`;
                        });
        document.querySelector('#choices').innerHTML = choices;
    }

    function setPayer(id=''){
        document.querySelector('#payer_id').value = id;
    }
        


    function submitIncome(){
        let paymentDate = document.querySelector('#payment_date').value;
        let incomeTypeID = document.querySelector('#income_type_id').value;
        let payerType = document.querySelector('#payer_type').value;
        let amount = document.querySelector('#amount').value;
        let paymentMethod = document.querySelector('#payment_method').value;
        let remark = document.querySelector('#remark').value;

        let data = {

        }
    }

    function validate(){
        event.preventDefault();
        // console.log(event.target);
        if(document.querySelector('#payer_id').value === ''){
            alert('Select a payer');

        }
        event.target.submit();
    }
        
</script>