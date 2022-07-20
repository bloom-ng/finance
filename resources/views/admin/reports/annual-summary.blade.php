
<x-header/>

<h3 class="text-center my-2">CHERUBIM & SERAPHIM MOVEMENT CHURCH, GETHSEMANE DISTRICT HEADQUARTERS</h3>
    <h4 class="text-center my-3">INCOME AND EXPENDITURE AS AT {{date('D d, M, Y')}}</h4>
    <table class="table">
        <thead>
            <tr>
                <th>INCOME</th>
                @foreach ($months as $key => $month)
                    <th>{{ $month }}</th>
                @endforeach
                <th>
                    TOTAL
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incomes as $key => $income)
                <tr>
                    <td class="text-uppercase">{{$key}}</td>
                    @foreach ($months as $monthKey => $month)
                        <td>{{ $income[$monthKey+1] == 0 ? "-" : $income[$monthKey+1] }}</td>
                    @endforeach
                    <td>{{$incomesTotal[$key]}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>



<x-footer/>
