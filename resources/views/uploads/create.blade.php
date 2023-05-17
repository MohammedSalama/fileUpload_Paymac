<!-- Upload File -->
<div class="modal fade" id="createfile" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Logo </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
{{--                @include('message')--}}
                <form action="{{route('uploads.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="row">

                        <div class="col">
                            <label> File </label>
                            <input type="file" name="logo" class="form-control">

                        </div>

                    </div>
                    <br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Confirm</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

