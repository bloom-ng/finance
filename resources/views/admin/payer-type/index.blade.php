<x-admin-header></x-admin-header>
<x-admin-sidebar></x-admin-sidebar>
<x-main-section>

    <div class="card mb-4">
        <div class="card-header mx-2">
            <h1>Payer Types</h1>
        </div>
        <div class="card-body">
            <div class="col-xl-6 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Add Admin</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('admin.payer-types.create')}}">Click
                            here</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payerTypes as $payerType )
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$payerType->name}}</td>
                        <td class="d-flex justify-content-center gap-2">
                            <a class="btn btn-warning"
                                href="{{route('admin.payer-types.edit', ['payerType' => $payerType])}}">Edit</a>

                            <form action="{{route('admin.payer-types.delete', ['payerType'=> $payerType])}}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- pagination -->
            {{ $payerTypes->links() }}
        </div>
    </div>

</x-main-section>
<x-admin-footer></x-admin-footer>