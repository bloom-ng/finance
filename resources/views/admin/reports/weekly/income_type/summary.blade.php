<x-admin-header></x-admin-header>
<x-admin-sidebar></x-admin-sidebar>
<x-main-section>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="text-center my-2">CHERUBIM & SERAPHIM MOVEMENT CHURCH, GETHSEMANE DISTRICT HEADQUARTERS</h3>
            <h4 class="text-center my-3">WEEKLY INCOME AND EXPENDITURE OF {{date(request('month'))}} {{
                request('year')}}
            </h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>INCOME</th>
                        @foreach ($weeks as $key => $week)
                        <th>WEEK {{ $key }}</th>
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
                        @foreach ($weeks as $weekKey => $week)
                        <td>{{ $income[$weekKey] == 0 ? "-" : $income[$weekKey] }}</td>
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