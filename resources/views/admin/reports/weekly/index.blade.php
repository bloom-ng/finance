<x-admin-header></x-admin-header>
<x-admin-sidebar></x-admin-sidebar>
<x-main-section>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    General Weekly Summary
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <form class="form" action="{{route('admin.reports.weekly-summary')}}" method="get">
                        <select class="mb-2 form-control form-control" name="year" id="year">
                            @for ($i = 0; $i < 50; $i++) <option value="{{$year+$i}}">
                                {{$year+$i}}
                                </option>
                                @endfor
                        </select>
                        <select class="form-control form-control" name="month" id="month">
                            @foreach ($months as $key => $month)
                            <option value="{{$key+1}}">{{$month}}</option>
                            @endforeach
                        </select>
                        <input class="mt-2 btn btn-success" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Payer Type Weekly Summary
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <form class="form" action="{{route('admin.reports.weekly_payer_type_summary')}}" method="get">
                        <select class="mb-2 form-control form-control" name="year" id="year">
                            @for ($i = 0; $i < 50; $i++) <option value="{{$year+$i}}">{{$year+$i}}</option>
                                @endfor
                        </select>
                        <select class="mb-2 form-control form-control" name="month" id="month">
                            @foreach ($months as $key => $month)
                            <option value="{{$key+1}}">{{$month}}</option>
                            @endforeach
                        </select>
                        <select class="form-control form-control" name="payerType" id="payerType">
                            @foreach ($payerTypes as $payerType)
                            <option value="{{$payerType->id}}">{{$payerType->name}}</option>
                            @endforeach
                        </select>

                        <input class="mt-2 btn btn-success" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Income Type Weekly Summary
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <form class="form" action="{{route('admin.reports.weekly_income_type_summary')}}" method="get">
                        <select class="mb-2 form-control form-control" name="year" id="year">
                            @for ($i = 0; $i < 50; $i++) <option value="{{$year+$i}}">{{$year+$i}}</option>
                                @endfor
                        </select>
                        <select class="mb-2 form-control form-control" name="month" id="month">
                            @foreach ($months as $key => $month)
                            <option value="{{$key+1}}">{{$month}}</option>
                            @endforeach
                        </select>
                        <select class="form-control form-control" name="incomeType" id="incomeType">
                            @foreach ($incomeTypes as $incomeType)
                            <option value="{{$incomeType->id}}">{{$incomeType->name}}</option>
                            @endforeach
                        </select>

                        <input class="mt-2 btn btn-success" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-main-section>
<x-admin-footer></x-admin-footer>