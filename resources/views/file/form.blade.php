

        <select name="course_code" class="browser-default custom-select" id="courseselect1">
            <option value="" disabled selected>Select Course</option>
            @foreach ($teaches as $teach)
            <option value={{$teach->course_code}}>{{$teach->course_code}}</option>
            @endforeach
        </select>


    

    <div class="form-group">
        <label for="secselect1">Section</label>
        <input type="number" min="1" max="50" required name="section" class="form-control"
            id="secselect1" aria-describedby="SectioHelp" placeholder="Enter Section">
    </div>


<div class="form-group">
    <label for="nameselect1">File Name</label>
    <input type="text" name="file_name" class="form-control" id="nameselect1"
        placeholder="File Name">
</div>
<div class="form-group">
    <label for="descselect1">Discription</label>
    <textarea class="form-control" name="description" id="descselect1" rows="3"></textarea>
</div>
<div class="form-group">
    <label for="fileselect">Select File</label>
    <input type="file" name="file" class="form-control-file" id="fileselect">
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>