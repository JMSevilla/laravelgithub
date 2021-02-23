<div class="container-projects">
  @foreach($projects as $project)
      <div class="project-box-account" style="background-image: url({{Voyager::image($project->photos[0])}});">
        <div class="over-box-background"></div>
        <div class="content-project-box">
          <div class="project-box-title">{{$project->title}}</div>
          <div class="project-box-date-owner-container">
            <div class="project-simple-text">Due date<br> {{$project->end_date}}</div>
            <div class="project-simple-text">Owner<br> {{$project->director}}/{{$project->writer}}</div>
          </div>
        </div>
        <a href="/project/{{$project->slug}}" class="container-over-project-box over-project-listing">
          <div class="action-element-project-box-over edit-project btn-edit-project">
            <div class="btn-project-box-over edit-project-icon">
              <img src="../images/ochi.png"/>
            </div>
            <div class="text-btn-over-project-box">More</div>
          </div>
        </a>
      </div>
  @endforeach
  
</div>