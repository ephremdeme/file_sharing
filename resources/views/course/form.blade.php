<div class="form-group">
                <label for="yearselect1">Year </label>
                    <select name="year" class="browser-default custom-select" id="yearselect1">
                        <option value="" disabled selected>Select Year</option>
                        <option value=1>1 Year</option>
                        <option value=2>2 Year</option>
                        <option value=3>3 Year</option>
                        <option value=4>4 Year</option>
                        <option value=5>5 Year</option>
                    </select>
                    </div>
                        <div class="form-group ">
                            <label for="deptselect1">Department </label>
                            <select name="dept" class="browser-default custom-select" id="deptselect1">
                                <option value="" disabled selected>Select Department</option>
                                @foreach ($departments as $dept)
                                <option value={{$dept->id}}>{{$dept->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="course_codeselect1">Course_code</label>
                            form-control                    <input type="text" name="course_code" class="form-control" id="course_codeselect1"
                                placeholder="Course code">
                        </div>
                        <div class="form-group">
                            <label for="idselect1">Name</label>
                            <input class="form-control" name="name" id="idselect1" placeholder="course name">
                        </div>
                        
        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

</div>