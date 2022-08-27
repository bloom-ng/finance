<form action="{{route('admin.reports.weekly-summary')}}" method="get">
    <select name="year" id="year">
        @for ($i = 0; $i < 50; $i++) <option value="{{$year+$i}}">
            {{$year+$i}}
            </option>
            @endfor
    </select>
    <select name="month" id="month">
        <option value="">{{$month}}</option>
    </select>

    <input type="submit" value="Submit">
</form>