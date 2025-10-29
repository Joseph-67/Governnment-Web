<div class="modal" id="addEmployeeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="employee-form" enctype="multipart/form-data" class="card shadow-sm border-0 mb-4">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="employee_number" class="form-label fw-bold">Employee Number</label>
                            <input type="text" class="form-control" id="employee_number" name="employee_number" required placeholder="e.g. EMP12345">
                        </div>
                        <div class="col-md-3">
                            <label for="employee_first_name" class="form-label fw-bold">First Name</label>
                            <input type="text" class="form-control" id="employee_first_name" name="employee_first_name" required placeholder="First Name">
                        </div>
                        <div class="col-md-3">
                            <label for="employee_last_name" class="form-label fw-bold">Last Name</label>
                            <input type="text" class="form-control" id="employee_last_name" name="employee_last_name" required placeholder="Last Name">
                        </div>
                        <div class="col-md-3">
                            <label for="employee_email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" id="employee_email" name="employee_email" required placeholder="example@company.com">
                        </div>
                        <div class="col-md-3">
                            <label for="employee_phone" class="form-label fw-bold">Phone Number</label>
                            <input type="tel" class="form-control" id="employee_phone" name="employee_phone" placeholder="+234 800 000 0000">
                        </div>
                        <div class="col-md-3">
                            <label for="employee_dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="employee_dob" name="employee_dob">
                        </div>
                        <div class="col-md-3">
                            <label for="employee_gender" class="form-label">Gender</label>
                            <select class="form-select" id="employee_gender" name="employee_gender">
                                <option value="" selected disabled>Choose...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="employee_job_title" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="employee_job_title" name="employee_job_title">
                        </div>
                        <div class="col-md-3">
                            <label for="employee_department" class="form-label">Department</label>
                            <select class="form-select" id="employee_department" name="employee_department">
                                <option value="" selected disabled>Choose...</option>

                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="taggable-container " id="manager-tag-input-2">
                                <label for="manager" class="form-label fw-bold">Manager</label>
                                <div class="manager-tag-input-2 manager-tag-input border-primary bg-light">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="employee_hire_date" class="form-label">Hire Date</label>
                            <input type="date" class="form-control" id="employee_hire_date" name="employee_hire_date">
                        </div>
                        <div class="col-md-3">
                            <label for="employee_status" class="form-label">Status</label>
                            <select class="form-select" id="employee_status" name="employee_status">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="on_leave">On Leave</option>
                                <option value="terminated">Terminated</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="employee_address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="employee_address" name="employee_address">
                        </div>
                        <div class="col-md-2">
                            <label for="employee_city" class="form-label">City</label>
                            <input type="text" class="form-control" id="employee_city" name="employee_city">
                        </div>
                        <div class="col-md-2">
                            <label for="employee_state" class="form-label">State</label>
                            <input type="text" class="form-control" id="employee_state" name="employee_state">
                        </div>
                        <div class="col-md-2">
                            <label for="employee_zip" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="employee_zip" name="employee_zip">
                        </div>
                        <div class="col-md-2">
                            <label for="employee_country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="employee_country" name="employee_country">
                        </div>
                        <div class="col-md-4">
                            <label for="employee_emergency_contact" class="form-label">Emergency Contact</label>
                            <input type="text" class="form-control" id="employee_emergency_contact" name="employee_emergency_contact">
                        </div>
                        <div class="col-md-4">
                            <label for="employee_emergency_phone" class="form-label">Emergency Phone</label>
                            <input type="text" class="form-control" id="employee_emergency_phone" name="employee_emergency_phone">
                        </div>
                        <div class="col-md-4">
                            <label for="employee_profile_picture" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="employee_profile_picture" name="employee_profile_picture" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Employee</button>
                </div>
            </form>
        </div>
    </div>
</div>