<!-- Employee Management Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    let employeesLoaded = false;

    // Initialize DataTable
    const employeesTable = $('#tbl-employees').DataTable({
        destroy: true,
        responsive: true,
        columns: [
            { title: "Name" },
            { title: "Email" },
            { title: "Department" },
            { title: "Action", orderable: false, searchable: false }
        ]
    });

    // Listen for Employees tab activation
    const employeesTab = document.querySelector('a[data-bs-toggle="tab"][href="#employees"]');
    if (employeesTab) {
        employeesTab.addEventListener('shown.bs.tab', function () {
            console.log('detected');
            
            if (!employeesLoaded) {
                loadEmployees();
                employeesLoaded = true;
            }
        });
    }

    // Optional Refresh Button
    const refreshBtn = document.createElement('button');
    refreshBtn.className = 'btn btn-outline-secondary btn-sm ms-2';
    refreshBtn.innerHTML = '<i class="bi bi-arrow-clockwise"></i> Refresh';
    refreshBtn.addEventListener('click', loadEmployees);

    // Append refresh button next to Add Employee button
    const employeeHeader = document.querySelector('#employees .d-flex .btn-primary');
    if (employeeHeader && employeeHeader.parentNode) {
        employeeHeader.parentNode.appendChild(refreshBtn);
    }

    // ✅ Load employees from backend
    async function loadEmployees() {
        const companyId = "{{ $company->company_id ?? '' }}";
        const url = `{{ route('admin.company-employees', ['company' => 'COMPANY_ID']) }}`.replace('COMPANY_ID', companyId);

        try {
            const response = await fetch(url);
            const result = await response.json();

            if (result.status === 'success') {
                const employees = result.employees;
                employeesTable.clear();

                employees.forEach(emp => {
                    const name = `${emp.employee_first_name ?? ''} ${emp.employee_last_name ?? ''}`.trim() || 'N/A';
                    const email = emp.employee_email ?? 'N/A';
                    const department = emp.department?.department_name ?? 'N/A';
                    const id = emp.employee_id;

                    employeesTable.row.add([
                        name,
                        email,
                        department,
                        `<div class="text-end">
                            <button class="btn btn-sm btn-primary edit-employee" data-id="${id}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-danger delete-employee" data-id="${id}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>`
                    ]);
                });

                employeesTable.draw();
                displayMessage('success', 'Employee list loaded successfully.');
            } else {
                displayMessage('danger', result.message || 'Failed to load employees.');
            }
        } catch (error) {
            console.error('Error loading employees:', error);
            displayMessage('danger', 'Error loading employee data.');
        }
    }

    // ✅ Helper - Display messages (Bootstrap alert style)
    function displayMessage(type, message) {
        const alertBox = document.createElement('div');
        alertBox.className = `alert alert-${type} alert-dismissible fade show`;
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
