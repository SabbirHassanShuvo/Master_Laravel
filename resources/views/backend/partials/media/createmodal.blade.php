 <!-- Insert Media modal start -->
 <div class="modal fade media-modal" id="mediaModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h2>Insert Media</h2>
                 <button type="button" class="btn btn-close" data-bs-dismiss="modal"><span
                         class="lnr lnr-cross"></span></button>
             </div>
             <div class="modal-body">
                 <ul class="nav nav-tabs" role="tablist">
                     <li class="nav-item">
                         <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#upload">Upload New</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" data-bs-toggle="tab" data-bs-target="#select">Select File</a>
                     </li>
                 </ul>
                 <div class="tab-content">
                     <div class="tab-pane fade show active" id="upload">
                         <div class="content-section drop-files-sec">
                             <div>
                                 <i class="ri-upload-cloud-2-line"></i>
                                 <h2>Drop files here, paste <span>or</span> <a href="#" class="font-blue">browse
                                         files</a></h2>
                             </div>
                         </div>
                     </div>
                     <div class="tab-pane fade" id="select">
                         <div class="select-top-panel">
                             <div>
                                 <input type="text" class="form-control" placeholder="Search your files">
                             </div>
                             <select class="form-select">
                                 <option>Sort By newest</option>
                                 <option>Sort By oldest</option>
                                 <option>Sort By smallest</option>
                                 <option>Sort By largest</option>
                             </select>
                         </div>
                         <div class="content-section select-file-section py-0 ratio2_3">
                             <div
                                 class="row g-sm-4 row-cols-xl-5 row-cols-lg-4 py-0 media-library-sec ratio_square row-cols-sm-3 row-cols-2 g-2">
                                 <div>
                                     <div class="library-box">
                                         <input type="checkbox" id="myCheckboxone" />
                                         <label for="myCheckboxone">
                                             <div>
                                                 <img src="assets/images/product/1.png"
                                                     class="img-fluid bg-img bg_size_content" alt="">
                                             </div>
                                             <div class="dropdown">
                                                 <a class="" href="#" role="button" id="dropdownMenuLink"
                                                     data-bs-toggle="dropdown" aria-expanded="false">
                                                     <i class="ri-more-fill"></i>
                                                 </a>

                                                 <ul class="dropdown-menu dropdown-menu-end"
                                                     aria-labelledby="dropdownMenuLink">
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-download-2-line me-2"></i>Download</a>
                                                     </li>
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-delete-bin-line me-2"></i>Delete</a>
                                                     </li>
                                                     </li>
                                                 </ul>
                                             </div>
                                         </label>
                                     </div>
                                 </div>
                                 <div>
                                     <div class="library-box">
                                         <input type="checkbox" id="myCheckboxtwo" />
                                         <label for="myCheckboxtwo">
                                             <div>
                                                 <img src="assets/images/product/2.png"
                                                     class="img-fluid bg-img bg_size_content" alt="">
                                             </div>
                                             <div class="dropdown">
                                                 <a class="" href="#" role="button" id="dropdownMenuLink"
                                                     data-bs-toggle="dropdown" aria-expanded="false">
                                                     <i class="ri-more-fill"></i>
                                                 </a>

                                                 <ul class="dropdown-menu dropdown-menu-end"
                                                     aria-labelledby="dropdownMenuLink">
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-download-2-line me-2"></i>Download</a>
                                                     </li>
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-delete-bin-line me-2"></i>Delete</a>
                                                     </li>
                                                     </li>
                                                 </ul>
                                             </div>
                                         </label>
                                     </div>
                                 </div>
                                 <div>
                                     <div class="library-box">
                                         <input type="checkbox" id="myCheckboxthree" />
                                         <label for="myCheckboxthree">
                                             <div>
                                                 <img src="assets/images/product/3.png"
                                                     class="img-fluid bg-img bg_size_content" alt="">
                                             </div>
                                             <div class="dropdown">
                                                 <a class="" href="#" role="button" id="dropdownMenuLink"
                                                     data-bs-toggle="dropdown" aria-expanded="false">
                                                     <i class="ri-more-fill"></i>
                                                 </a>

                                                 <ul class="dropdown-menu dropdown-menu-end"
                                                     aria-labelledby="dropdownMenuLink">
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-download-2-line me-2"></i>Download</a>
                                                     </li>
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-delete-bin-line me-2"></i>Delete</a>
                                                     </li>
                                                     </li>
                                                 </ul>
                                             </div>
                                         </label>
                                     </div>
                                 </div>
                                 <div>
                                     <div class="library-box">
                                         <input type="checkbox" id="myCheckboxfour" />
                                         <label for="myCheckboxfour">
                                             <div>
                                                 <img src="assets/images/product/4.png"
                                                     class="img-fluid bg-img bg_size_content" alt="">
                                             </div>
                                             <div class="dropdown">
                                                 <a class="" href="#" role="button"
                                                     id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                     aria-expanded="false">
                                                     <i class="ri-more-fill"></i>
                                                 </a>

                                                 <ul class="dropdown-menu dropdown-menu-end"
                                                     aria-labelledby="dropdownMenuLink">
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-download-2-line me-2"></i>Download</a>
                                                     </li>
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-delete-bin-line me-2"></i>Delete</a>
                                                     </li>
                                                     </li>
                                                 </ul>
                                             </div>
                                         </label>
                                     </div>
                                 </div>
                                 <div>
                                     <div class="library-box">
                                         <input type="checkbox" id="myCheckboxfive" />
                                         <label for="myCheckboxfive">
                                             <div>
                                                 <img src="assets/images/product/5.png"
                                                     class="img-fluid bg-img bg_size_content" alt="">
                                             </div>
                                             <div class="dropdown">
                                                 <a class="" href="#" role="button"
                                                     id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                     aria-expanded="false">
                                                     <i class="ri-more-fill"></i>
                                                 </a>

                                                 <ul class="dropdown-menu dropdown-menu-end"
                                                     aria-labelledby="dropdownMenuLink">
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-download-2-line me-2"></i>Download</a>
                                                     </li>
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-delete-bin-line me-2"></i>Delete</a>
                                                     </li>
                                                     </li>
                                                 </ul>
                                             </div>
                                         </label>
                                     </div>
                                 </div>
                                 <div>
                                     <div class="library-box">
                                         <input type="checkbox" id="myCheckboxsix" />
                                         <label for="myCheckboxsix">
                                             <div>
                                                 <img src="assets/images/product/6.png"
                                                     class="img-fluid bg-img bg_size_content" alt="">
                                             </div>
                                             <div class="dropdown">
                                                 <a class="" href="#" role="button"
                                                     id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                     aria-expanded="false">
                                                     <i class="ri-more-fill"></i>
                                                 </a>

                                                 <ul class="dropdown-menu dropdown-menu-end"
                                                     aria-labelledby="dropdownMenuLink">
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-download-2-line me-2"></i>Download</a>
                                                     </li>
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-delete-bin-line me-2"></i>Delete</a>
                                                     </li>
                                                     </li>
                                                 </ul>
                                             </div>
                                         </label>
                                     </div>
                                 </div>
                                 <div>
                                     <div class="library-box">
                                         <input type="checkbox" id="myCheckboxseven" />
                                         <label for="myCheckboxseven">
                                             <div>
                                                 <img src="assets/images/product/7.png"
                                                     class="img-fluid bg-img bg_size_content" alt="">
                                             </div>
                                             <div class="dropdown">
                                                 <a class="" href="#" role="button"
                                                     id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                     aria-expanded="false">
                                                     <i class="ri-more-fill"></i>
                                                 </a>

                                                 <ul class="dropdown-menu dropdown-menu-end"
                                                     aria-labelledby="dropdownMenuLink">
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-download-2-line me-2"></i>Download</a>
                                                     </li>
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-delete-bin-line me-2"></i>Delete</a>
                                                     </li>
                                                     </li>
                                                 </ul>
                                             </div>
                                         </label>
                                     </div>
                                 </div>
                                 <div>
                                     <div class="library-box">
                                         <input type="checkbox" id="myCheckboxeight" />
                                         <label for="myCheckboxeight">
                                             <div>
                                                 <img src="assets/images/product/8.png"
                                                     class="img-fluid bg-img bg_size_content" alt="">
                                             </div>
                                             <div class="dropdown">
                                                 <a class="" href="#" role="button"
                                                     id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                     aria-expanded="false">
                                                     <i class="ri-more-fill"></i>
                                                 </a>

                                                 <ul class="dropdown-menu dropdown-menu-end"
                                                     aria-labelledby="dropdownMenuLink">
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-download-2-line me-2"></i>Download</a>
                                                     </li>
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-delete-bin-line me-2"></i>Delete</a>
                                                     </li>
                                                     </li>
                                                 </ul>
                                             </div>
                                         </label>
                                     </div>
                                 </div>
                                 <div>
                                     <div class="library-box">
                                         <input type="checkbox" id="myCheckboxnine" />
                                         <label for="myCheckboxnine">
                                             <div>
                                                 <img src="assets/images/product/9.png"
                                                     class="img-fluid bg-img bg_size_content" alt="">
                                             </div>
                                             <div class="dropdown">
                                                 <a class="" href="#" role="button"
                                                     id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                     aria-expanded="false">
                                                     <i class="ri-more-fill"></i>
                                                 </a>

                                                 <ul class="dropdown-menu dropdown-menu-end"
                                                     aria-labelledby="dropdownMenuLink">
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-download-2-line me-2"></i>Download</a>
                                                     </li>
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-delete-bin-line me-2"></i>Delete</a>
                                                     </li>
                                                     </li>
                                                 </ul>
                                             </div>
                                         </label>
                                     </div>
                                 </div>
                                 <div>
                                     <div class="library-box">
                                         <input type="checkbox" id="myCheckboxten" />
                                         <label for="myCheckboxten">
                                             <div>
                                                 <img src="assets/images/product/10.png"
                                                     class="img-fluid bg-img bg_size_content" alt="">
                                             </div>
                                             <div class="dropdown">
                                                 <a class="" href="#" role="button"
                                                     id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                     aria-expanded="false">
                                                     <i class="ri-more-fill"></i>
                                                 </a>

                                                 <ul class="dropdown-menu dropdown-menu-end"
                                                     aria-labelledby="dropdownMenuLink">
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-download-2-line me-2"></i>Download</a>
                                                     </li>
                                                     <li><a class="dropdown-item d-flex align-items-center"
                                                             href="#"><i
                                                                 class="ri-delete-bin-line me-2"></i>Delete</a>
                                                     </li>
                                                     </li>
                                                 </ul>
                                             </div>
                                         </label>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <div class="left-part">
                     <div class="file-detail">
                         <h6>0 File Selected</h6>
                         <a href="#" class="font-red">Clear</a>
                     </div>
                 </div>
                 <div class="right-part">
                     <a href="#" class="btn btn-solid">Insert Media</a>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Insert Media modal end -->
