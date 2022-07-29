<x-admin-header></x-admin-header>
<x-admin-sidebar></x-admin-sidebar>
<x-main-section>
    <div class="card mb-4">
        <div class="card-header">
            <h1>Annual Summary</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Date</th>
                        <th>Payer</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($income as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->payment_date }}</td>
                        <td>{{ $item->payer_id }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</x-main-section>
<x-admin-footer></x-admin-footer>