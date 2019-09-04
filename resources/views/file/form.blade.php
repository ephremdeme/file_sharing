<div class="form-group">
    <label for="yearselect1">Year </label>
    <select name="year" class="form-control" id="yearselect1">
        <option value="" disabled selected>Select Year</option>
        <option value=1>1 Year</option>
        <option value=2>2 Year</option>
        <option value=3>3 Year</option>
        <option value=4>4 Year</option>
        <option value=5>5 Year</option>
    </select>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="courseselect1">Course </label>
        <select name="course_code" class="form-control" id="courseselect1">
            <option value="" disabled selected>Select Course</option>
            @foreach ($user->courses as $course)
            <option value={{$course->id}}>{{$course->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="deptselect1">Department</label>
        <select name="dept" class="form-control" id="deptselect1">
            <option value="" disabled selected>Select dept</option>
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="secselect1">Section</label>
        <input type="number" min="1" max="50" required name="section" class="form-control"
            id="secselect1" aria-describedby="SectioHelp" placeholder="Enter Section">
    </div>
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