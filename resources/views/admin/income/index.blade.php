<x-admin-header></x-admin-header>
<x-admin-sidebar></x-admin-sidebar>
<x-main-section>
    <div class="col-xl-6 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Add New</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{route('admin.incomes.create')}}">Click here</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <!-- Place to Place New Content -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Incomes
        </div>
        <div class="card-body">
            <form action="" method="GET">
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="">Income Type</label>
                        <select class="form-control" name="income_type_id" id="">
                            <option value=""></option>
                            @foreach ($incomeTypes as $incomeType )
                            <option value="{{$incomeType->id}}">{{$incomeType->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <button class="btn btn-primary my-3">Filter</button>
            </form>
            <table id="" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Actions</th>
                        {{-- <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th> --}}
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Actions</th>
                        {{-- <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th> --}}
                    </tr>
                </tfoot>
                @foreach ($incomes as $income )
                <tbody>
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$income->payer->name}}</td>
                        <td>{{$income->amount}}</td>
                        <td>{{$income->payment_date}}</td>
                        <td class="d-flex justify-content-around">
                            <a class="btn btn-primary"
                                href="{{route('admin.incomes.show', ['income' => $income])}}">View</a>
                            <a class="btn btn-warning"
                                href="{{route('admin.incomes.edit', ['income' => $income])}}">Edit</a>
                            <form action="{{route('admin.incomes.delete', ['income'=> $income])}}" method="post">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <!-- Pagination -->
            {{ $incomes->links() }}
        </div>
    </div>
    <!-- Place to Place New Content -->
</x-main-section>
<x-admin-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="/js/scripts.js"></script>
</x-admin-footer>