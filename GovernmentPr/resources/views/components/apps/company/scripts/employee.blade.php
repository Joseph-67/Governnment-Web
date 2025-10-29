<!-- Employee Management Script (with Profile Photo) -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let employeesLoaded = false;

        // Initialize DataTable
        const employeesTable = $('#tbl-employees').DataTable({
            destroy: true,
            searching: true,
            responsive: true,
            columns: [
                { title: "Employee" },
                { title: "Email" },
                { title: "Department" },
                { title: "Action", orderable: false, searchable: false }
            ]
        });

        // Listen for Employees tab activation
        const employeesTab = document.querySelector('button[data-bs-toggle="tab"]#employees-tab');
        if (employeesTab) {
            employeesTab.addEventListener('shown.bs.tab', function () {
                if (!employeesLoaded) {
                    loadEmployees();
                    employeesLoaded = true;
                }
            });
        }

        // Add Refresh Button beside Add Employee
        const addEmployeeBtn = document.querySelector('#employees .btn.btn-primary');
        if (addEmployeeBtn && !document.querySelector('#refreshEmployeesBtn')) {
            const refreshBtn = document.createElement('button');
            refreshBtn.id = 'refreshEmployeesBtn';
            refreshBtn.className = 'btn btn-outline-secondary btn-sm ms-2';
            refreshBtn.innerHTML = '<i class="bi bi-arrow-clockwise"></i> Refresh';
            refreshBtn.addEventListener('click', loadEmployees);
            addEmployeeBtn.parentNode.appendChild(refreshBtn);
        }

        // ✅ Load employees from backend
        async function loadEmployees() {
            const companyId = "{{ $company->company_id ?? '' }}";
            const url = `{{ route('admin.company-employees', ['company' => 'COMPANY_ID']) }}`.replace('COMPANY_ID', companyId);

            displayMessage('info', 'Loading employees...');

            try {
                const response = await fetch(url);
                const result = await response.json();

                document.querySelectorAll('#employees .alert').forEach(a => a.remove());

                if (result.status === 'success' && Array.isArray(result.employees)) {
                    const employees = result.employees;
                    console.log(employees);
                    
                    employeesTable.clear();

                    employees.forEach(emp => {
                        const name = `${emp.FirstName ?? ''} ${emp.LastName ?? ''}`.trim() || 'N/A';
                        const email = emp.Email ?? 'N/A';
                        const department = emp.department?.DepartmentName ?? 'N/A';
                        const id = emp.EmployeeID;
                        const profilePic = emp.ProfilePicture 
                            ? `{{ asset('storage/') }}/${emp.ProfilePicture}`
                            : `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=0D8ABC&color=fff&size=64`;

                        employeesTable.row.add([
                            `<div class="d-flex align-items-center">
                                <img src="${profilePic}" alt="${name}" class="rounded-circle me-2" width="40" height="40" style="object-fit: cover;">
                                <span>${name}</span>
                            </div>`,
                            email,
                            department,
                            `<div class="text-end">
                                <button class="btn btn-sm btn-primary edit-employee" data-id="${id}">
                                    <i class="la la-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-danger delete-employee" data-id="${id}">
                                    <i class="la la-trash"></i>
                                </button>
                            </div>`
                        ]);
                    });

                    employeesTable.draw();
                    displayMessage('success', `Loaded ${employees.length} employees successfully.`);
                } else {
                    displayMessage('warning', result.message || 'No employees found.');
                }
            } catch (error) {
                console.error('Error loading employees:', error);
                displayMessage('danger', 'Error loading employee data.');
            }
        }

        // ✅ Display Bootstrap alert messages
        function displayMessage(type, message) {
            document.querySelectorAll('#employees .alert').forEach(a => a.remove());
            const alertBox = document.createElement('div');
            alertBox.className = `alert alert-${type} alert-dismissible fade show mt-2`;
            alertBox.role = 'alert';
            alertBox.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            document.querySelector('#employees').prepend(alertBox);
            setTimeout(() => alertBox.remove(), 4000);
        }
    });
</script>
<!-- End Employee Management Script -->