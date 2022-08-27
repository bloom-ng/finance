<x-admin-header></x-admin-header>
<x-admin-sidebar></x-admin-sidebar>
<x-main-section>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="text-center my-2">CHERUBIM & SERAPHIM MOVEMENT CHURCH, GETHSEMANE DISTRICT HEADQUARTERS</h3>
            <h4 class="text-center my-3">INCOME AND EXPENDITURE AS AT {{date('D d, M, Y')}}</h4>
        </div>
        <div class="card-body">
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
        </div>

    </div>

</x-main-section>
<x-admin-footer></x-admin-footer>