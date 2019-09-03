<div class="form-group">
                <label for="yearselect">Year </label>
                    <select name="year" class="form-control" id="yearselect">
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
                            <label for="courseselect">Course </label>
                            <select name="course_code" class="form-control" id="courseselect">
                                <option value="" disabled selected>Select Course</option>
                                @foreach ($user->courses as $course)
                                <option value={{$course->id}}>{{$course->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="deptselect">Department</label>
                            <select name="dept" class="form-control" id="deptselect">
                                <option value="" disabled selected>Select dept</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                                <label for="secselect">Section</label>
                                <input type="number" min="1" max="50" required name="section" class="form-control"
                                    id="secselect" aria-describedby="SectioHelp" placeholder="Enter Section">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nameselect">Name</label>
                            <input type="text" name="name" class="form-control" id="nameselect"
                                placeholder="Student Name">
                        </div>
                        <div class="form-group">
                            <label for="buildingselect">Building</label>
                            <input class="form-control" name="id" id="buildingselect" placeholder="building">
                        </div>
                        <div class="form-group">
                            <label for="schoolselect">School</label>
                            <input class="form-control" name="gender" id="schoolselect" placeholder="school">
                        </div>
        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>