<x-admin-header></x-admin-header>
<x-admin-sidebar></x-admin-sidebar>
<x-main-section>
    <div class="card bg-success text-white mb-4">
        <div class="card-body">Add New</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="{{route('admin.income-types.create')}}">Click here</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
    <!-- Place to Place New Content -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Income Type Table
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
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
                @foreach ($incomeTypes as $incomeType )
                <tbody>
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$incomeType->name}}</td>
                        <td class="d-flex justify-content-around">
                            <a href="{{route('admin.income-types.edit', ['incomeType' => $incomeType])}}"><button
                                    type="button" class="text-white btn btn-warning">Edit</button></a>

                            <form action="{{route('admin.income-types.delete', ['incomeType'=> $incomeType])}}"
                                method="post"> @csrf @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <!-- Pagination -->
            {{ $incomeTypes->links() }}
        </div>
    </div>
    <!-- Place to Place New Content -->

</x-main-section>
<x-admin-footer></x-admin-footer>