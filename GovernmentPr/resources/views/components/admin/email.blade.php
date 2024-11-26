<x-layouts.admin-app>
    @section('styles')
    <style>
         .collapse-content {
      transition: all 0.3s ease-in-out;
    }
    .card-container {
      height: 600px; /* Fixed height for the container */
      max-width: 1000px;
    }
      .signature-card {
      max-width: 500px;
      
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }
    .signature-preview {
   
      height: 50px;
    
      display: none;
      border: 1px solid #ddd;
      padding: 10px;
    }
    .signature-section {
      cursor: pointer;
      color: #0d6efd;
      text-decoration: underline;
    }

    </style>

    @endsection
    <div class="container-fluid d-flex justify-content-center align-items-center">
    <div class="card-container w-100">
      <div class="card shadow-sm">
        <div class="card-body">
          <h3 class="card-title">Email Integration</h3>
          <p class="text-muted">
            Send and receive emails without leaving ClickUp. Communicate with people
            outside of your Workspace from any email address you already have.
            <a href="#">Learn more</a>
          </p>
          <!-- Email ClickApp Switch -->
          <div class="form-check form-switch mb-3">
            <input 
              class="form-check-input" 
              type="checkbox" 
              id="emailIntegrationSwitch" 
              data-bs-toggle="collapse" 
              data-bs-target="#collapsibleContent"
              aria-expanded="false" 
              aria-controls="collapsibleContent">
            <label class="form-check-label fw-bold" for="emailIntegrationSwitch">
              Email ClickApp
            </label>
          </div>
          <!-- Collapsible Content -->
          <div class="collapse" id="collapsibleContent">
            <!-- Email Accounts Section -->
            <div class="mb-4 col-md-3">
              <label for="emailDropdown" class="form-label fw-bold">Send Emails As</label>
              <input 
                type="email" 
                class="form-control" 
                value="example@gmail.com" 
               
                aria-label="User's Email Address">
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="email-accounts-tab" data-bs-toggle="tab"
                  data-bs-target="#email-accounts" type="button" role="tab"
                  aria-controls="email-accounts" aria-selected="true">
                  Email Accounts
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="signatures-tab" data-bs-toggle="tab"
                  data-bs-target="#signatures" type="button" role="tab"
                  aria-controls="signatures" aria-selected="false">
                  Signatures
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="templates-tab" data-bs-toggle="tab"
                  data-bs-target="#templates" type="button" role="tab"
                  aria-controls="templates" aria-selected="false">
                  Templates
                </button>
              </li>
            </ul>
            <div class="tab-content border border-top-0 p-4">
              <div class="tab-pane fade show active" id="email-accounts" role="tabpanel"
                aria-labelledby="email-accounts-tab">
                <p><strong>Joseph Atuma</strong> <span class="text-muted">(example@gmail.com)</span></p>
                <a href="#" class="text-decoration-none">+ Add new (1/1 accounts linked)</a>
              </div>
              <div class="tab-pane fade" id="signatures" role="tabpanel"
                aria-labelledby="signatures-tab">
                <p>No signatures configured yet.</p>
                <h5>Signatures</h5>
    <div>
      <span class="signature-section" id="addSignature">+ Add signature</span>
    </div>
    
    <div class="row">
    <div class="col-md-4">
    <form id="signatureForm" style="display: none;" class="mt-3 row">
      <label for="signatureUpload" class="form-label">Upload Signature</label>
      <input type="file" class="form-control" id="signatureUpload" accept="image/*">
    </form>
    </div>
    <div class="col-md-4 mt-4">
    <img id="signaturePreview" class="signature-preview" alt="Signature Preview">
    </div>
    </div>
  
              </div>
              
              <div class="tab-pane fade" id="templates" role="tabpanel"
                aria-labelledby="templates-tab">
              
               <p class="card-title">No email templates selected yet.</p>
      
   

<!-- Trigger Modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#emailModal">
  Open Email Template
</button>



              </div>
            </div>
            <div class="d-flex justify-content-end mt-2">
              <button class="btn btn-primary">Save</button>
            </div>
          </div>
         
        </div>
      </div>
    </div>
  </div>
  @section('scripts')
  <script>
  const addSignatureLink = document.getElementById("addSignature");
    const signatureForm = document.getElementById("signatureForm");
    const signatureUpload = document.getElementById("signatureUpload");
    const signaturePreview = document.getElementById("signaturePreview");

    // Show the form when "Add signature" is clicked
    addSignatureLink.addEventListener("click", () => {
      signatureForm.style.display = "block";
    });

    // Show the preview when an image is uploaded
    signatureUpload.addEventListener("change", (event) => {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          signaturePreview.src = e.target.result;
          signaturePreview.style.display = "block";
        };
        reader.readAsDataURL(file);
      }
    });
  </script>
  @endsection
</x-layouts.admin-app>