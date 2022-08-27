<!-- Yearly Modal -->
<div class="modal hidden" id="yearly-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select Year</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.reports.annual-summary')}}" method="get">
                    <select name="year" id="year">
                        @for ($i = 0; $i < 50; $i++) <option>
                            </option>
                            @endfor
                    </select>

                    <input class="btn btn-success" type="submit" value="Submit">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Yearly Modal -->