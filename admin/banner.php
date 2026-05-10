<?php

include_once "../layouts/header.php";
?>



<style>
        body { background-color: #f8f9fa; color: #333; }
        .form-container { max-width: 700px; margin: 50px auto; background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .form-label { font-weight: 500; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px; color: #666; }
        .form-control:focus { border-color: #000; box-shadow: none; }
        .btn-dark { border-radius: 6px; padding: 10px 25px; }
    </style>

<div class="container">
    <div class="form-container">
        <h2 class="mb-4 fw-bold">Project Details</h2>
        <form id="jobForm" method="POST" action="../controller/banner_store.php" enctype="multipart/form-data">
            
            <div class="row g-3">
                <!-- ID & Job Type -->
                <div class="col-md-4">
                    <label class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" placeholder="001" required>
                </div>

                <form id="jobForm" method="POST" action="../controller/banner_store.php">
                <div class="col-md-8">
                    <label class="form-label">Job Type</label>
                    <input type="text" class="form-control" id="job_type" name="job_type" placeholder="e.g. Full-time, Contract">
                </div>

                <!-- Moto & Title -->
                <div class="col-12">
                    <label class="form-label">Moto</label>
                    <input name="moto" class="form-control" id="moto" placeholder="Your professional slogan">
                </div>
                <div class="col-12">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Project or Position Title" required>
                </div>

                <!-- Description -->
                <div class="col-12">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_description" class="form-control" id="short_description" rows="3"></textarea>
                </div>

                <!-- CTA & CTA Link -->
                <div class="col-md-6">
                    <label class="cta">CTA Text</label>
                    <input type="url" name="cta_text" class="form-control" id="cta" placeholder="e.g. View Project">
                </div>
                <div class="col-md-6">
                    <label class="ctaLink">CTA Link</label>
                    <input type="url" name="cta_link" class="form-control" id="ctaLink" placeholder="https://...">
                </div>

                <!-- Stats: Experience, Projects, Clients -->
                <div class="col-md-4">
                    <label class="form-label">Experience</label>
                    <input type="text" name="exp" class="form-control" id="experience" placeholder="e.g. 5 Years">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Projects</label>
                    <input type="number" name="projects" class="form-control" id="projects" placeholder="20">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Clients</label>
                    <input type="number" name="clients" class="form-control" id="clients" placeholder="15">
                </div>

                <!-- Files: CV & Image -->
                <div class="col-md-6">
                    <label class="form-label">Upload CV</label>
                    <input class="form-control" name="cv" type="file"  id="cvFile" accept=".pdf,.jpg">
                    <span class="text-danger"><?=$_SESSION['form_errors']['cv_error'] ?? null ?></span>
                </div>

                
                <div class="col-md-6">
                    <label class="form-label">Feature Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <span class="text-danger"><?=$_SESSION['form_errors']['image_error'] ?? null ?></span>
                </div>

                <!-- Submit -->
                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-dark w-100">Save Information</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php

include_once "../layouts/footer.php";
?>




