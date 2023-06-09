<!-- Edit File -->
<div class="modal fade" id="Editfile{{$upload->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit Logo </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('uploads.update',$upload->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    {{--Input hidden id--}}
                    <input type="hidden" name="id" value="{{$upload->id}}"/>

                    <div class="row">

                        <div class="row">
                            <div class="col">
                                <label> Logo </label>
                                <input type="file" name="logo" class="form-control">
                                {{ $upload -> logo }}
                            </div>
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

