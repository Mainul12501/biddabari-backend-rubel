<form action="{{ route('pdf-stores.store') }}" method="post" enctype="multipart/form-data" id="coursesForm">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload PDF</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
    </div>
    {{--                    <input type="hidden" name="category_id" >--}}
    <div class="modal-body">
        <div class="card card-body">
            <div class="row mt-2">
                <div class="col-md-6 mt-2 select2-div">
                    <label for="">Category</label>
                    <select name="pdf_store_category_id" required class="form-control select2" data-placeholder="Select a Category" >
                        <option value=""></option>
                        @foreach($pdfStoreCategories as $pdfStoreCategory)
                            <option value="{{ $pdfStoreCategory->id }}">{{ $pdfStoreCategory->title }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger" id="pdf_store_category_id">{{ $errors->has('pdf_store_category_id') ? $errors->first('pdf_store_category_id') : "" }}</span>
                </div>
                <div class="col-md-6 mt-2">
                    <label for="">Title</label>
                    <input type="text" class="form-control" required name="title" placeholder="Title" />
                    <span class="text-danger" id="title">{{ $errors->has('title') ? $errors->first('title') : "" }}</span>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 mt-2">
                    <label for="">PDF File</label>
                    <input type="file" name="file" required class="form-control" accept="application/pdf" placeholder="PDF File" />
                    <span class="text-danger" id="file">{{ $errors->has('file') ? $errors->first('file') : "" }}</span>
                </div>
                <div class="col-sm-3 mt-2">
                    <label for="">Status</label>
                    <div class="material-switch">
                        <input id="someSwitchOptionWarning" name="status" type="checkbox" checked="">
                        <label for="someSwitchOptionWarning" class="label-info"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary submit-btn" value="save">Save</button>
    </div>
</form>

