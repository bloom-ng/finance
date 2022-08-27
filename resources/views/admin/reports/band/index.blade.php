<form action="{{route('admin.reports.band.annual')}}" method="get">
    <select name="year" id="year">
        @for ($i = 0; $i < 50; $i++) <option value="{{$year+$i}}">{{$year+$i}}</option>
            @endfor
    </select>

    <input type="submit" value="Submit">
</form>