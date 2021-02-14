<nav id="sidebar" class="sidebar-wrapper">
  <div class="sidebar-content">
      @if (!auth()->guest())    
        <div class="sidebar-brand pr-3">
            <a href="{{ url('/home') }}">
              CV Automation System
            </a>
            <div id="close-sidebar">
                <i class="fa fa-arrow-left"></i>
            </div>
        </div>
      @endif
            
    <div class="sidebar-header">
      <div class="user-pic">
        <form id="form" action="/upload-image" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          @if (empty(auth()->user()->logo_url))
            <i class="fa fa-user text-dark user-large"></i>
          @else
            <img src="{{ asset('storage/profile_images/' . auth()->user()->logo_url) }}">  
          @endif
          <input onchange="this.form.submit('/upload-image')" type="file" hidden id="image" name="image">
        </form>
      </div>
      <div class="user-info">
        <span class="user-name pb-2">
          {{
            auth()->user()->first_name . " " .
            auth()->user()->middle_name . " " .
            auth()->user()->last_name
          }}
        </span>
        @if (!empty(auth()->user()->logo_url))
          <label for="image" class="btn btn-sm btn-primary image-btn">
            <i class="fa fa-upload"></i> Change Image
          </label>
          <br/>
          <label onclick="confirmDeletion('form', 'Are you sure you what to remove this image?')" class="btn btn-sm btn-danger image-btn">
            <i class="fa fa-trash"></i> Remove Image
          </label>        
        @else
          <label for="image" class="btn btn-sm btn-primary image-btn">
            <i class="fa fa-upload"></i> Upload Image
          </label>
        @endif
      </div>
    </div>

    <div class="sidebar-menu">
      <ul>
        <li class="pt-1">
          <a href="/home" @if ($url === 'home') class="active" @endif>
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="header-menu">
          <span>CV Required Informations</span>
        </li>
        <li>
          <a href="/personal-informations"@if ($url === 'personal-informations') class="active" @endif>
            <i class="fa fa-users"></i>
            <span>Personal Information</span>
          </a>
        </li>
        <li>
          <a href="/educational-backgrounds" @if ($url === 'educational-backgrounds') class="active" @endif>
            <i class="fa fa-graduation-cap"></i>
            <span>Educational Background</span>
          </a>
        </li>
        <li>
          <a href="/languages" @if ($url === 'languages') class="active" @endif>
            <i class="fa fa-globe"></i>
            <span>Languages</span>
          </a>
        </li>
        <li>
          <a href="/hobbies" @if ($url === 'hobbies') class="active" @endif>
            <i class="fa fa-smile-o"></i>
            <span>Hobbies</span>
          </a>
        </li>
        <li>
          <a href="/project-researches" @if ($url === 'project-researces') class="active" @endif>
            <i class="fa fa-rocket"></i>
            <span>Project/Research</span>
          </a>
        </li>
        <li>
          <a href="work-experince" @if ($url === 'work-experiences') class="active" @endif>
            <i class="fa fa-suitcase"></i>
            <span>Work Experience</span>
          </a>
        </li>
        <li>
          <a href="referees" @if ($url === 'referees') class="active" @endif>
            <i class="fa fa-gavel"></i>
            <span>Referees</span>
          </a>
        </li>
        <li class="header-menu">
          <span>Select/Create Template</span>
        </li>
        <li class="sidebar-dropdown">
          <a href="#">
            <i class="fa fa-certificate"></i>
            <span>CV Templates</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li>
                <a href="/templates" @if ($url === 'templates') class="active" @endif>
                  <i class="fa fa-folder"></i>
                  <span>Choose from Selection</span>
                </a>
              </li>
              <li>
                <a href="/create-template" @if ($url === 'create-template') class="active" @endif>
                  <i class="fa fa-plus"></i>
                  <span>Create New Template</span>
                </a>
              </li>
              
            </ul>
          </div>
        </li>
        <li class="header-menu">
          <span>Download/Print</span>
        </li>
        <li class="sidebar-dropdown">
          <a href="#">
            <i class="fa fa-print"></i>
            <span>Downloads/Print</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li>
                <a href="/download-word" @if ($url === 'download-word') class="active" @endif>
                  <i class="fa fa-file-word-o"></i>
                  <span>Download as Word</span>
                </a>
              </li>
              <li>
                <a href="download-pdf" @if ($url === 'download-pdf') class="active" @endif>
                  <i class="fa fa-file-pdf-o"></i>
                  <span>Download as PDF</span>
                </a>
              </li>
              <li>
                <a href="print" @if ($url === 'print') class="active" @endif>
                  <i class="fa fa-print"></i>
                  <span>Print CV</span>
                </a>
              </li>
              
            </ul>
          </div>
        </li>
  </div>
</nav>